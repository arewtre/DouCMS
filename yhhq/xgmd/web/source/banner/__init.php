<?php
define('FRAME', "banner");
$frames = buildframes(array(FRAME), $_GPC['m']);
$frames = $frames[FRAME];