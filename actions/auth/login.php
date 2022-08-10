<?php

$success_msg = get_flash_msg('success');
$error_msg = get_flash_msg('error');

$conn  = conn();
$db    = new Database($conn);

if(request() == 'POST')
{

    $user = $db->single('users',[
        'username' => $_POST['username'],
        'password' => md5($_POST['password']),
    ]);

    if($user)
    {
        if(get_role($user->id)->role_id == $_POST['level'])
        {
            Session::set(['user_id'=>$user->id]);
            header('location:'.base_url());
            die();
        }
    }

    set_flash_msg(['error'=>'Login Gagal! Nama Pengguna atau Kata Sandi tidak cocok']);
    header('location:'.base_url());
    die();
}

$roles = $db->all('roles');

return [
    'success_msg' => $success_msg,
    'error_msg' => $error_msg,
    'roles' => $roles
];