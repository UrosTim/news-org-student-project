<?php
if ($_POST) {
    $_id = $_SESSION['user_id'];
    $password = $_SESSION['user_password'];
    //kontrola gresaka za editovanje profila
    if ($_POST['password'] == '')
        $_error[] = 'Enter password';
    else if (strlen($_POST['password']) < 3)
        $_error[] = 'Password must be at least 3 characters long';
    else if ($_POST['password'] != $_SESSION['user_password'])
        $_error[] = 'Enter correct password';
    if ($_POST['new_password'] == '')
        $_error[] = 'Enter new password';
    else if (strlen($_POST['new_password']) < 3)
        $_error[] = 'New password must be at least 3 characters long';
    else if ($_POST['new_password'] == $_POST['password'])
        $_error[] = 'New password must be different from current password';
    if ($_POST['confirm_new_password'] == '')
        $_error[] = 'Enter password confirmation';
    else if ($_POST['new_password'] != $_POST['confirm_new_password'])
        $_error[] = 'Password confirmation does not match the new password';
    $new_password = $_POST['new_password'];
    //dodavanje editovanih podataka u bazu
    if (empty($_error)) {
        $sql = "UPDATE `users` 
                SET `users_password` = '{$new_password}' 
                WHERE `users_id` = '{$_id}'
                LIMIT 1";
        $result = mysqli_query($_db, $sql);
        if ($result === false)
            $_error[] = 'Failed to change the password';
        else
            $_message[] = 'Password updated successfully';
    }
}
$_page_output = [
'page_title' => 'Update',
'view' => 'module-update.php'
];
?>