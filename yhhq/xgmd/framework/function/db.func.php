<?php
/**
 * Winner
 * Winner
 */
defined('IN_IA') or exit('Access Denied');
$GLOBALS['_W']['config']['db']['tablepre'] = empty($GLOBALS['_W']['config']['db']['tablepre']) ? $GLOBALS['_W']['config']['db']['master']['tablepre'] : $GLOBALS['_W']['config']['db']['tablepre'];

function db_table_schema($db, $tablename = '') {
	$result = $db->fetch("SHOW TABLE STATUS LIKE '" . trim($db->tablename($tablename), '`') . "'");
	if(empty($result)) {
		return array();
	}
	$ret['tablename'] = $result['Name'];
	$ret['charset'] = $result['Collation'];
	$ret['engine'] = $result['Engine'];
	$ret['increment'] = $result['Auto_increment'];
	$result = $db->fetchall("SHOW FULL COLUMNS FROM " . $db->tablename($tablename));
	foreach($result as $value) {
		$temp = array();
		$type = explode(" ", $value['Type'], 2);
		$temp['name'] = $value['Field'];
		$pieces = explode('(', $type[0], 2);
		$temp['type'] = $pieces[0];
		$temp['length'] = rtrim($pieces[1], ')');
		$temp['null'] = $value['Null'] != 'NO';
										$temp['signed'] = empty($type[1]);
		$temp['increment'] = $value['Extra'] == 'auto_increment';
		$ret['fields'][$value['Field']] = $temp;
	}
	$result = $db->fetchall("SHOW INDEX FROM " . $db->tablename($tablename));
	foreach($result as $value) {
		$ret['indexes'][$value['Key_name']]['name'] = $value['Key_name'];
		$ret['indexes'][$value['Key_name']]['type'] = ($value['Key_name'] == 'PRIMARY') ? 'primary' : ($value['Non_unique'] == 0 ? 'unique' : 'index');
		$ret['indexes'][$value['Key_name']]['fields'][] = $value['Column_name'];
	}
	return $ret;
}



function db_table_serialize($db, $dbname) {
	$tables = $db->fetchall('SHOW TABLES');
	if (empty($tables)) {
		return '';
	}
	$struct = array();
	foreach ($tables as $value) {
		$structs[] = db_table_schema($db, substr($value['Tables_in_' . $dbname], strpos($value['Tables_in_' . $dbname], '_') + 1));
	}
	return iserializer($structs);
}


function db_table_create_sql($schema) {
	$pieces = explode('_', $schema['charset']);
	$charset = $pieces[0];
	$engine = $schema['engine'];
	$schema['tablename'] = str_replace('ims_', $GLOBALS['_W']['config']['db']['tablepre'], $schema['tablename']);
	$sql = "CREATE TABLE IF NOT EXISTS `{$schema['tablename']}` (\n";
	foreach ($schema['fields'] as $value) {
		$piece = _db_build_field_sql($value);
		$sql .= "`{$value['name']}` {$piece},\n";
	}
	foreach ($schema['indexes'] as $value) {
		$fields = implode('`,`', $value['fields']);
		if($value['type'] == 'index') {
			$sql .= "KEY `{$value['name']}` (`{$fields}`),\n";
		}
		if($value['type'] == 'unique') {
			$sql .= "UNIQUE KEY `{$value['name']}` (`{$fields}`),\n";
		}
		if($value['type'] == 'primary') {
			$sql .= "PRIMARY KEY (`{$fields}`),\n";
		}
	}
	$sql = rtrim($sql);
	$sql = rtrim($sql, ',');
	
	$sql .= "\n) ENGINE=$engine DEFAULT CHARSET=$charset;\n\n";
	return $sql;
}


function db_schema_compare($table1, $table2) {
	$table1['charset'] == $table2['charset'] ? '' : $ret['diffs']['charset'] = true;
	
	$fields1 = array_keys($table1['fields']);
	$fields2 = array_keys($table2['fields']);
	$diffs = array_diff($fields1, $fields2);
	if(!empty($diffs)) {
		$ret['fields']['greater'] = array_values($diffs);
	}
	$diffs = array_diff($fields2, $fields1);
	if(!empty($diffs)) {
		$ret['fields']['less'] = array_values($diffs);
	}
	$diffs = array();
	$intersects = array_intersect($fields1, $fields2);
	if(!empty($intersects)) {
		foreach($intersects as $field) {
			if($table1['fields'][$field] != $table2['fields'][$field]) {
				$diffs[] = $field;
			}
		}
	}
	if(!empty($diffs)) {
		$ret['fields']['diff'] = array_values($diffs);
	}

	$indexes1 = array_keys($table1['indexes']);
	$indexes2 = array_keys($table2['indexes']);
	$diffs = array_diff($indexes1, $indexes2);
	if(!empty($diffs)) {
		$ret['indexes']['greater'] = array_values($diffs);
	}
	$diffs = array_diff($indexes2, $indexes1);
	if(!empty($diffs)) {
		$ret['indexes']['less'] = array_values($diffs);
	}
	$diffs = array();
	$intersects = array_intersect($indexes1, $indexes2);
	if(!empty($intersects)) {
		foreach($intersects as $index) {
			if($table1['indexes'][$index] != $table2['indexes'][$index]) {
				$diffs[] = $index;
			}
		}
	}
	if(!empty($diffs)) {
		$ret['indexes']['diff'] = array_values($diffs);
	}

	return $ret;
}

function db_table_fix_sql($schema1, $schema2, $strict = false) {
	if(empty($schema1)) {
		return array(db_table_create_sql($schema2));
	}
	$diff = $result = db_schema_compare($schema1, $schema2);
	if(!empty($diff['diffs']['tablename'])) {
		return array(db_table_create_sql($schema2));
	}
	$sqls = array();
	if(!empty($diff['diffs']['engine'])) {
		$sqls[] = "ALTER TABLE `{$schema1['tablename']}` ENGINE = {$schema2['engine']}";
	}

	if(!empty($diff['diffs']['charset'])) {
		$pieces = explode('_', $schema2['charset']);
		$charset = $pieces[0];
		$sqls[] = "ALTER TABLE `{$schema1['tablename']}` DEFAULT CHARSET = {$charset}";
	}

	if(!empty($diff['fields'])) {
		if(!empty($diff['fields']['less'])) {
			foreach($diff['fields']['less'] as $fieldname) {
				$field = $schema2['fields'][$fieldname];
				$piece = _db_build_field_sql($field);
				if(!empty($field['rename']) && !empty($schema1['fields'][$field['rename']])) {
					$sql = "ALTER TABLE `{$schema1['tablename']}` CHANGE `{$field['rename']}` `{$field['name']}` {$piece}";
					unset($schema1['fields'][$field['rename']]);
				} else {
					if($field['position']) {
						$pos = ' ' . $field['position'];
					}
					$sql = "ALTER TABLE `{$schema1['tablename']}` ADD `{$field['name']}` {$piece}{$pos}";
				}
								$primary = array();
				$isincrement = array();
				if (strexists($sql, 'AUTO_INCREMENT')) {
					$isincrement = $field;
					$sql =  str_replace('AUTO_INCREMENT', '', $sql);
					foreach ($schema1['fields'] as $field) {
						if ($field['increment'] == 1) {
							$primary = $field;
							break;
						} 
					}
					if (!empty($primary)) {
						$piece = _db_build_field_sql($primary);
						if (!empty($piece)) {
							$piece = str_replace('AUTO_INCREMENT', '', $piece);
						}
						$sqls[] = "ALTER TABLE `{$schema1['tablename']}` CHANGE `{$primary['name']}` `{$primary['name']}` {$piece}";
					}
				}
				$sqls[] = $sql;
			}
		}
		if(!empty($diff['fields']['diff'])) {
			foreach($diff['fields']['diff'] as $fieldname) {
				$field = $schema2['fields'][$fieldname];
				$piece = _db_build_field_sql($field);
				if(!empty($schema1['fields'][$fieldname])) {
					$sqls[] = "ALTER TABLE `{$schema1['tablename']}` CHANGE `{$field['name']}` `{$field['name']}` {$piece}";
				}
			}
		}
		if($strict && !empty($diff['fields']['greater'])) {
			foreach($diff['fields']['greater'] as $fieldname) {
				if(!empty($schema1['fields'][$fieldname])) {
					$sqls[] = "ALTER TABLE `{$schema1['tablename']}` DROP `{$fieldname}`";
				}
			}
		}
	}

	if(!empty($diff['indexes'])) {
		if(!empty($diff['indexes']['less'])) {
			foreach($diff['indexes']['less'] as $indexname) {
				$index = $schema2['indexes'][$indexname];
				$piece = _db_build_index_sql($index);
				$sqls[] = "ALTER TABLE `{$schema1['tablename']}` ADD {$piece}";
			}
		}
		if(!empty($diff['indexes']['diff'])) {
			foreach($diff['indexes']['diff'] as $indexname) {
				$index = $schema2['indexes'][$indexname];
				$piece = _db_build_index_sql($index);
				
				$sqls[] = "ALTER TABLE `{$schema1['tablename']}` DROP ".($indexname == 'PRIMARY' ? " PRIMARY KEY " : "INDEX {$indexname}").", ADD {$piece}";
			}
		}
		if($strict && !empty($diff['indexes']['greater'])) {
			foreach($diff['indexes']['greater'] as $indexname) {
				$sqls[] = "ALTER TABLE `{$schema1['tablename']}` DROP `{$indexname}`";
			}
		}
	}
	if (!empty($isincrement)) {
		$piece = _db_build_field_sql($isincrement);
		$sqls[] = "ALTER TABLE `{$schema1['tablename']}` CHANGE `{$isincrement['name']}` `{$isincrement['name']}` {$piece}";
	}
	return $sqls;
}

function _db_build_index_sql($index) {
	$piece = '';
	$fields = implode('`,`', $index['fields']);
	if($index['type'] == 'index') {
		$piece .= " INDEX `{$index['name']}` (`{$fields}`)";
	}
	if($index['type'] == 'unique') {
		$piece .= "UNIQUE `{$index['name']}` (`{$fields}`)";
	}
	if($index['type'] == 'primary') {
		$piece .= "PRIMARY KEY (`{$fields}`)";
	}
	return $piece;
}

function _db_build_field_sql($field) {
	if(!empty($field['length'])) {
		$length = "({$field['length']})";
	} else {
		$length = '';
	}

	$signed  = empty($field['signed']) ? ' unsigned' : '';
	if(empty($field['null'])) {
		$null = ' NOT NULL';
	} else {
		$null = '';
	}
	if(isset($field['default'])) {
		$default = " DEFAULT '" . $field['default'] . "'";
	} else {
		$default = '';
	}
	if($field['increment']) {
		$increment = ' AUTO_INCREMENT';
	} else {
		$increment = '';
	}
	return "{$field['type']}{$length}{$signed}{$null}{$default}{$increment}";
}
