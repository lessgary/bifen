<?php
if (!defined('IN_FINECMS')) exit();
return array (
  'types' => 
  array (
    'id' => 'int',
    'catid' => 'smallint',
    'content' => 'mediumtext',
    'expect' => 'bigint',
    'opencode' => 'char',
    'opentime' => 'char',
  ),
  'fields' => 
  array (
    0 => 'id',
    1 => 'catid',
    2 => 'content',
    3 => 'expect',
    4 => 'opencode',
    5 => 'opentime',
  ),
  'primary_key' => 'id',
);