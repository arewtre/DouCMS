<?php
/**
* Smarty Internal Plugin Templatelexer
*
* This is the lexer to break the template source into tokens
* @package Smarty
* @subpackage Compiler
* @author Uwe Tews
*/
/**
* Smarty Internal Plugin Templatelexer
*/
class Smarty_Internal_Templatelexer
{
    public $data;
    public $counter;
    public $token;
    public $value;
    public $node;
    public $line;
    public $taglineno;
    public $state = 1;
    public $strip = false;
    private $heredoc_id_stack = Array();
    public $smarty_token_names = array (		// Text for parser error messages
    				'IDENTITY'	=> '===',
    				'NONEIDENTITY'	=> '!==',
    				'EQUALS'	=> '==',
    				'NOTEQUALS'	=> '!=',
    				'GREATEREQUAL' => '(>=,ge)',
    				'LESSEQUAL' => '(<=,le)',
    				'GREATERTHAN' => '(>,gt)',
    				'LESSTHAN' => '(<,lt)',
    				'MOD' => '(%,mod)',
    				'NOT'			=> '(!,not)',
    				'LAND'		=> '(&&,and)',
    				'LOR'			=> '(||,or)',
    				'LXOR'			=> 'xor',
    				'OPENP'		=> '(',
    				'CLOSEP'	=> ')',
    				'OPENB'		=> '[',
    				'CLOSEB'	=> ']',
    				'PTR'			=> '->',
    				'APTR'		=> '=>',
    				'EQUAL'		=> '=',
    				'NUMBER'	=> 'number',
    				'UNIMATH'	=> '+" , "-',
    				'MATH'		=> '*" , "/" , "%',
    				'INCDEC'	=> '++" , "--',
    				'SPACE'		=> ' ',
    				'DOLLAR'	=> '$',
    				'SEMICOLON' => ';',
    				'COLON'		=> ':',
    				'DOUBLECOLON'		=> '::',
    				'AT'		=> '@',
    				'HATCH'		=> '#',
    				'QUOTE'		=> '"',
    				'BACKTICK'		=> '`',
    				'VERT'		=> '|',
    				'DOT'			=> '.',
    				'COMMA'		=> '","',
    				'ANDSYM'		=> '"&"',
    				'QMARK'		=> '"?"',
    				'ID'			=> 'identifier',
    				'OTHER'		=> 'text',
    				'LINEBREAK'		=> 'newline',
     				'FAKEPHPSTARTTAG'	=> 'Fake PHP start tag',
     				'PHPSTARTTAG'	=> 'PHP start tag',
     				'PHPENDTAG'	=> 'PHP end tag',
 						'LITERALSTART'  => 'Literal start',
 						'LITERALEND'    => 'Literal end',
    				'LDELSLASH' => 'closing tag',
    				'COMMENT' => 'comment',
    				'AS' => 'as',
    				'TO' => 'to',
    				);


    function __construct($data,$compiler)
    {
//        $this->data = preg_replace("/(\r\n|\r|\n)/", "\n", $data);
        $this->data = $data;
        $this->counter = 0;
        $this->line = 1;
        $this->smarty = $compiler->smarty;
        $this->compiler = $compiler;
        $this->ldel = preg_quote($this->smarty->left_delimiter,'/');
        $this->ldel_length = strlen($this->smarty->left_delimiter);
        $this->rdel = preg_quote($this->smarty->right_delimiter,'/');
        $this->smarty_token_names['LDEL'] =	$this->smarty->left_delimiter;
        $this->smarty_token_names['RDEL'] =	$this->smarty->right_delimiter;
        $this->mbstring_overload = ini_get('mbstring.func_overload') & 2;
     }


    private $_yy_state = 1;
    private $_yy_stack = array();

    function yylex()
    {
        return $this->{'yylex' . $this->_yy_state}();
    }

    function yypushstate($state)
    {
        array_push($this->_yy_stack, $this->_yy_state);
        $this->_yy_state = $state;
    }

    function yypopstate()
    {
        $this->_yy_state = array_pop($this->_yy_stack);
    }

    function yybegin($state)
    {
        $this->_yy_state = $state;
    }



    function yylex1()
    {
        $tokenMap = array (
              1 => 0,
              2 => 0,
              3 => 1,
              5 => 0,
              6 => 0,
              7 => 0,
              8 => 0,
              9 => 0,
              10 => 0,
              11 => 0,
              12 => 1,
              14 => 0,
              15 => 0,
              16 => 0,
              17 => 0,
              18 => 0,
              19 => 0,
              20 => 0,
              21 => 0,
              22 => 0,
              23 => 0,
              24 => 2,
              27 => 0,
              28 => 0,
            );
        if ($this->counter >= strlen($this->data)) {
            return false; // end of input
        }
        $yy_global_pattern = "/\G(".$this->ldel."[$]smarty\\.block\\.child".$this->rdel.")|\G(\\{\\})|\G(".$this->ldel."\\*([\S\s]*?)\\*".$this->rdel.")|\G([\t ]*[\r\n]+[\t ]*)|\G(".$this->ldel."strip".$this->rdel.")|\G(".$this->ldel."\\s{1,}strip\\s{1,}".$this->rdel.")|\G(".$this->ldel."\/strip".$this->rdel.")|\G(".$this->ldel."\\s{1,}\/strip\\s{1,}".$this->rdel.")|\G(".$this->ldel."\\s*literal\\s*".$this->rdel.")|\G(".$this->ldel."\\s{1,}\/)|\G(".$this->ldel."\\s*(if|elseif|else if|while)\\s+)|\G(".$this->ldel."\\s*for\\s+)|\G(".$this->ldel."\\s*foreach(?![^\s]))|\G(".$this->ldel."\\s*setfilter\\s+)|\G(".$this->ldel."\\s{1,})|\G(".$this->ldel."\/)|\G(".$this->ldel.")|\G(<\\?(?:php\\w+|=|[a-zA-Z]+)?)|\G(\\?>)|\G(<%)|\G(%>)|\G(([\S\s]*?)(?=([\t ]*[\r\n]+[\t ]*|".$this->ldel."|<\\?|\\?>|<%|%>)))|\G([\S\s]+)|\G(.)/iS";

        do {
            if ($this->mbstring_overload ? preg_match($yy_global_pattern, substr($this->data, $this->counter), $yymatches) : preg_match($yy_global_pattern,$this->data, $yymatches, null, $this->counter)) {
                $yysubmatches = $yymatches;
                $yymatches = array_filter($yymatches, 'strlen'); // remove empty sub-patterns
                if (!count($yymatches)) {
                    throw new Exception('Error: lexing failed because a rule matched' .
                        ' an empty string.  Input "' . substr($this->data,
                        $this->counter, 5) . '... state TEXT');
                }
                next($yymatches); // skip global match
                $this->token = key($yymatches); // token number
                if ($tokenMap[$this->token]) {
                    // extract sub-patterns for passing to lex function
                    $yysubmatches = array_slice($yysubmatches, $this->token + 1,
                        $tokenMap[$this->token]);
                } else {
                    $yysubmatches = array();
                }
                $this->value = current($yymatches); // token value
                $r = $this->{'yy_r1_' . $this->token}($yysubmatches);
                if ($r === null) {
                    $this->counter += strlen($this->value);
                    $this->line += substr_count($this->value, "\n");
                    // accept this token
                    return true;
                } elseif ($r === true) {
                    // we have changed state
                    // process this token in the new state
                    return $this->yylex();
                } elseif ($r === false) {
                    $this->counter += strlen($this->value);
                    $this->line += substr_count($this->value, "\n");
                    if ($this->counter >= strlen($this->data)) {
                        return false; // end of input
                    }
                    // skip this token
                    continue;
                }            } else {
                throw new Exception('Unexpected input at line' . $this->line .
                    ': ' . $this->data[$this->counter]);
            }
            break;
        } while (true);

    } // end function


    const TEXT = 1;
    function yy_r1_1($yy_subpatterns)
    {

  $this->token = Smarty_Internal_Templateparser::TP_SMARTYBLOCKCHILD;
    }
    function yy_r1_2($yy_subpatterns)
    {

  $this->token = Smarty_Internal_Templateparser::TP_OTHER;
    }
    function yy_r1_3($yy_subpatterns)
    {

  $this->token = Smarty_Internal_Templateparser::TP_COMMENT;
    }
    function yy_r1_5($yy_subpatterns)
    {

  if ($this->strip) {
     return false;
  } else {
     $this->token = Smarty_Internal_Templateparser::TP_LINEBREAK;
  }
    }
    function yy_r1_6($yy_subpatterns)
    {

  $this->strip = true;
  return false;
    }
    function yy_r1_7($yy_subpatterns)
    {

  if ($this->smarty->auto_literal) {
     $this->token = Smarty_Internal_Templateparser::TP_OTHER;
  } else {
    $this->strip = true;
    return false;
  }
    }
    function yy_r1_8($yy_subpatterns)
    {

  $this->strip = false;
  return false;
    }
    function yy_r1_9($yy_subpatterns)
    {

  if ($this->smarty->auto_literal) {
     $this->token = Smarty_Internal_Templateparser::TP_OTHER;
  } else {
    $this->strip = false;
    return false;
  }
    }
    function yy_r1_10($yy_subpatterns)
    {

   $this->token = Smarty_Internal_Templateparser::TP_LITERALSTART;
   $this->yypushstate(self::LITERAL);
    }
    function yy_r1_11($yy_subpatterns)
    {

  if ($this->smarty->auto_literal) {
     $this->token = Smarty_Internal_Templateparser::TP_OTHER;
  } else {
     $this->token = Smarty_Internal_Templateparser::TP_LDELSLASH;
     $this->yypushstate(self::SMARTY);
     $this->taglineno = $this->line;
  }
    }
    function yy_r1_12($yy_subpatterns)
    {

  if ($this->smarty->auto_literal && trim(substr($this->value,$this->ldel_length,1)) == '') {
     $this->token = Smarty_Internal_Templateparser::TP_OTHER;
  } else {
     $this->token = Smarty_Internal_Templateparser::TP_LDELIF;
     $this->yypushstate(self::SMARTY);
     $this->taglineno = $this->line;
  }
    }
    function yy_r1_14($yy_subpatterns)
    {

  if ($this->smarty->auto_literal && trim(substr($this->value,$this->ldel_length,1)) == '') {
     $this->token = Smarty_Internal_Templateparser::TP_OTHER;
  } else {
     $this->token = Smarty_Internal_Templateparser::TP_LDELFOR;
     $this->yypushstate(self::SMARTY);
     $this->taglineno = $this->line;
  }
    }
    function yy_r1_15($yy_subpatterns)
    {

  if ($this->smarty->auto_literal && trim(substr($this->value,$this->ldel_length,1)) == '') {
     $this->token = Smarty_Internal_Templateparser::TP_OTHER;
  } else {
     $this->token = Smarty_Internal_Templateparser::TP_LDELFOREACH;
     $this->yypushstate(self::SMARTY);
     $this->taglineno = $this->line;
  }
    }
    function yy_r1_16($yy_subpatterns)
    {

  if ($this->smarty->auto_literal && trim(substr($this->value,$this->ldel_length,1)) == '') {
     $this->token = Smarty_Internal_Templateparser::TP_OTHER;
  } else {
     $this->token = Smarty_Internal_Templateparser::TP_LDELSETFILTER;
     $this->yypushstate(self::SMARTY);
     $this->taglineno = $this->line;
  }
    }
    function yy_r1_17($yy_subpatterns)
    {

  if ($this->smarty->auto_literal) {
     $this->token = Smarty_Internal_Templateparser::TP_OTHER;
  } else {
     $this->token = Smarty_Internal_Templateparser::TP_LDEL;
     $this->yypushstate(self::SMARTY);
     $this->taglineno = $this->line;
  }
    }
    function yy_r1_18($yy_subpatterns)
    {

  $this->token = Smarty_Internal_Templateparser::TP_LDELSLASH;
     $this->yypushstate(self::SMARTY);
     $this->taglineno = $this->line;
    }
    function yy_r1_19($yy_subpatterns)
    {

  $this->token = Smarty_Internal_Templateparser::TP_LDEL;
     $this->yypushstate(self::SMARTY);
     $this->taglineno = $this->line;
    }
    function yy_r1_20($yy_subpatterns)
    {

  if (in_array($this->value, Array('<?', '<?=', '<?php'))) {
    $this->token = Smarty_Internal_Templateparser::TP_PHPSTARTTAG;
  } elseif ($this->value == '<?xml') {
      $this->token = Smarty_Internal_Templateparser::TP_XMLTAG;
  } else {
    $this->token = Smarty_Internal_Templateparser::TP_FAKEPHPSTARTTAG;
    $this->value = substr($this->value, 0, 2);
  }
     }
    function yy_r1_21($yy_subpatterns)
    {

  $this->token = Smarty_Internal_Templateparser::TP_PHPENDTAG;
    }
    function yy_r1_22($yy_subpatterns)
    {

  $this->token = Smarty_Internal_Templateparser::TP_ASPSTARTTAG;
    }
    function yy_r1_23($yy_subpatterns)
    {

  $this->token = Smarty_Internal_Templateparser::TP_ASPENDTAG;
    }
    function yy_r1_24($yy_subpatterns)
    {

  $this->token = Smarty_Internal_Templateparser::TP_OTHER;
    }
    function yy_r1_27($yy_subpatterns)
    {

  $this->token = Smarty_Internal_Templateparser::TP_OTHER;
    }
    function yy_r1_28($yy_subpatterns)
    {

  $this->token = Smarty_Internal_Templateparser::TP_OTHER;
    }


    function yylex2()
    {
        $tokenMap = array (
              1 => 0,
              2 => 0,
              3 => 1,
              5 => 0,
              6 => 0,
              7 => 0,
              8 => 0,
              9 => 0,
              10 => 0,
              11 => 0,
              12 => 0,
              13 => 0,
              14 => 0,
              15 => 0,
              16 => 0,
              17 => 0,
              18 => 0,
              19 => 0,
              20 => 1,
              22 => 1,
              24 => 1,
              26 => 0,
              27 => 0,
              28 => 0,
              29 => 0,
              30 => 0,
              31 => 0,
              32 => 0,
              33 => 0,
              34 => 0,
              35 => 0,
              36 => 0,
              37 => 0,
              38 => 0,
              39 => 0,
              40 => 0,
              41 => 0,
              42 => 0,
              43 => 3,
              47 => 0,
              48 => 0,
              49 => 0,
              50 => 0,
              51 => 0,
              52 => 0,
              53 => 0,
              54 => 0,
              55 => 1,
              57 => 1,
              59 => 0,
              60 => 0,
              61 => 0,
              62 => 0,
              63 => 0,
              64 => 0,
              65 => 0,
              66 => 0,
              67 => 0,
              68 => 0,
              69 => 0,
              70 => 0,
              71 => 0,
              72 => 0,
              73 => 0,
              74 => 0,
              75 => 0,
              76 => 0,
            );
        if ($this->counter >= strlen($this->data)) {
            return false; // end of input
        }
        $yy_global_pattern = "/\G('[^'\\\\]*(?:\\\\.[^'\\\\]*)*')|\G(".$this->ldel."\\s{1,}\/)|\G(".$this->ldel."\\s*(if|elseif|else if|while)\\s+)|\G(".$this->ldel."\\s*for\\s+)|\G(".$this->ldel."\\s*foreach(?![^\s]))|\G(".$this->ldel."\\s{1,})|\G(\\s{1,}".$this->rdel.")|\G(".$this->ldel."\/)|\G(".$this->ldel.")|\G(".$this->rdel.")|\G(\\s+is\\s+in\\s+)|\G(\\s+as\\s+)|\G(\\s+to\\s+)|\G(\\s+step\\s+)|\G(\\s+instanceof\\s+)|\G(\\s*===\\s*)|\G(\\s*!==\\s*)|\G(\\s*==\\s*|\\s+eq\\s+)|\G(\\s*!=\\s*|\\s*<>\\s*|\\s+(ne|neq)\\s+)|\G(\\s*>=\\s*|\\s+(ge|gte)\\s+)|\G(\\s*<=\\s*|\\s+(le|lte)\\s+)|\G(\\s*>\\s*|\\s+gt\\s+)|\G(\\s*<\\s*|\\s+lt\\s+)|\G(\\s+mod\\s+)|\G(!\\s*|not\\s+)|\G(\\s*&&\\s*|\\s*and\\s+)|\G(\\s*\\|\\|\\s*|\\s*or\\s+)|\G(\\s*xor\\s+)|\G(\\s+is\\s+odd\\s+by\\s+)|\G(\\s+is\\s+not\\s+odd\\s+by\\s+)|\G(\\s+is\\s+odd)|\G(\\s+is\\s+not\\s+odd)|\G(\\s+is\\s+even\\s+by\\s+)|\G(\\s+is\\s+not\\s+even\\s+by\\s+)|\G(\\s+is\\s+even)|\G(\\s+is\\s+not\\s+even)|\G(\\s+is\\s+div\\s+by\\s+)|\G(\\s+is\\s+not\\s+div\\s+by\\s+)|\G(\\((int(eger)?|bool(ean)?|float|double|real|string|binary|array|object)\\)\\s*)|\G(\\s*\\(\\s*)|\G(\\s*\\))|\G(\\[\\s*)|\G(\\s*\\])|\G(\\s*->\\s*)|\G(\\s*=>\\s*)|\G(\\s*=\\s*)|\G(\\+\\+|--)|\G(\\s*(\\+|-)\\s*)|\G(\\s*(\\*|\/|%)\\s*)|\G(\\$)|\G(\\s*;)|\G(::)|\G(\\s*:\\s*)|\G(@)|\G(#)|\G(\")|\G(`)|\G(\\|)|\G(\\.)|\G(\\s*,\\s*)|\G(\\s*&\\s*)|\G(\\s*\\?\\s*)|\G(0[xX][0-9a-fA-F]+)|\G([0-9]*[a-zA-Z_]\\w*)|\G(\\d+)|\G(\\s+)|\G(.)/iS";

        do {
            if ($this->mbstring_overload ? preg_match($yy_global_pattern, substr($this->data, $this->counter), $yymatches) : preg_match($yy_global_pattern,$this->data, $yymatches, null, $this->counter)) {
                $yysubmatches = $yymatches;
                $yymatches = array_filter($yymatches, 'strlen'); // remove empty sub-patterns
                if (!count($yymatches)) {
                    throw new Exception('Error: lexing failed because a rule matched' .
                        ' an empty string.  Input "' . substr($this->data,
                        $this->counter, 5) . '... state SMARTY');
                }
                next($yymatches); // skip global match
                $this->token = key($yymatches); // token number
                if ($tokenMap[$this->token]) {
                    // extract sub-patterns for passing to lex function
                    $yysubmatches = array_slice($yysubmatches, $this->token + 1,
                        $tokenMap[$this->token]);
                } else {
                    $yysubmatches = array();
                }
                $this->value = current($yymatches); // token value
                $r = $this->{'yy_r2_' . $this->token}($yysubmatches);
                if ($r === null) {
                    $this->counter += strlen($this->value);
                    $this->line += substr_count($this->value, "\n");
                    // accept this token
                    return true;
                } elseif ($r === true) {
                    // we have changed state
                    // process this token in the new state
                    return $this->yylex();
                } elseif ($r === false) {
                    $this->counter += strlen($this->value);
                    $this->line += substr_count($this->value, "\n");
                    if ($this->counter >= strlen($this->data)) {
     