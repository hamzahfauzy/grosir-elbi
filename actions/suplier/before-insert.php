<?php

$_POST['users']['name'] = $_POST['suplier']['nama'];
$_POST['users']['password'] = md5($_POST['users']['password']);
$user = $db->insert('users',$_POST['users']);

$db->insert('user_roles',['user_id' => $user->id,'role_id'=>2]);

$_POST['suplier']['user_id'] = $user->id;
