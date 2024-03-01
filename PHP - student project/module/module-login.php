<?php
//da li je ulogovan, jeste->logout
if ($_action == 'logout' && ($_SESSION['loggedin'] ?? '') == 1) {
    $_SESSION['loggedin'] = 0;
    session_destroy();
    redirect(FILE_INDEX);
}
//sprecava pristup za login i ako je vec ulogovan
if(($_SESSION['loggedin'] ?? '') == 1) {
    redirect(FILE_INDEX);
}
//provera unetih podataka
if ($_POST) {
    $user = module_login_test_data();
    if (is_array($user) && !empty($user)) {
        $_SESSION['loggedin'] = 1;
        $_SESSION['username'] = $user['users_username'];
        $_SESSION['user_level'] = (int)$user['users_level'];
        $_SESSION['user_id'] = (int)$user['users_id'];
        $_SESSION['user_password'] = $user['users_password'];
        redirect(FILE_INDEX);
    }
}
$_page_output = [
        'page_title' => 'Login',
        'view' => 'module-login.php'
] ;

?>
