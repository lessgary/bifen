<?php
if (!defined('IN_FINECMS')) exit();
return array (
  'types' => 
  array (
    'id' => 'int',
    'catid' => 'smallint',
    'content' => 'mediumtext',
    'opentime' => 'char',
    'opencode' => 'char',
    'expect' => 'bigint',
  ),
  'fields' => 
  array (
    0 => 'id',
    1 => 'catid',
    2 => 'content',
    3 => 'opentime',
    4 => 'opencode',
    5 => 'expect',
  ),
  'primary_key' => 'id',
);