<?php

$user = $db->insert('users',[
    'name' => $_POST['pelanggan']['nama'],
    'username' => $_POST['pelanggan']['no_hp'],
    'password' => md5(123456),
]);

$db->insert('user_roles',[
    'user_id' => $user->id,
    'role_id' => 3
]);

$_POST['pelanggan']['user_id'] = $user->id;