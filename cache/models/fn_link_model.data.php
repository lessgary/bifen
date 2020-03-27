<?php
if (!defined('IN_FINECMS')) exit();
return array (
  'types' => 
  array (
    'id' => 'smallint unsigned',
    'typeid' => 'smallint unsigned',
    'name' => 'varchar',
    'url' => 'varchar',
    'logo' => 'varchar',
    'introduce' => 'text',
    'listorder' => 'smallint unsigned',
    'addtime' => 'int unsigned',
  ),
  'fields' => 
  array (
    0 => 'id',
    1 => 'typeid',
    2 => 'name',
    3 => 'url',
    4 => 'logo',
    5 => 'introduce',
    6 => 'listorder',
    7 => 'addtime',
  ),
  'primary_key' => 'id',
);