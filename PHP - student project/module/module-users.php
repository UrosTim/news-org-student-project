<?php

//ruter modula users
switch ($_action) {
    //kreiranje naloga
    case 'create' :
        //sprecava pristup za create ako je vec ulogovan
        if(($_SESSION['loggedin'] ?? '') == 1) {
            redirect(FILE_INDEX);
        }
        // kontrola unosa podataka u formu za sign up
        if ($_POST) {
            $username = htmlspecialchars($_POST['username'] ?? '');
            $password = $_POST['password'] ?? '';
            $confirm_password = $_POST['confirm_password'] ?? '';
            if($username == '')
                $_error[] = 'Enter username';
            else if (preg_match('#[^a-z0-9_]+#', $username))
                $_error[] = 'Username must contain only letters, numbers and "_"';
            if ($password == '')
                $_error[] = 'Enter password';
            else if (strlen($password) < 3)
                $_error[] = 'Password must be at least 3 characters long';
            if ($confirm_password == '')
                $_error[] = 'Enter password confirmation';
            else if ($password != $confirm_password)
                $_error[] = 'Password confirmation does not match the password';
            //ako nema greske u unosu, izvrsavanje upita i hendlovanje izuzetka ako
            // korisnicko ime vec postoji u bazi
            if (empty($_error)) {
                $users_date = date('Y-m-d H:i:s');
                $sql = "INSERT INTO `users`
                        (`users_username`, `users_password`, `users_date`) VALUES 
                        ('{$username}', '{$password}', '{$users_date}')";
                try {
                    $result = mysqli_query($_db, $sql);
                } catch (mysqli_sql_exception $exception) {
                    if ($exception -> getCode() == 1062){
                        $_error[] = 'Username already in use';
                        $result = false;
                    } else {
                        throw $exception;
                    }
                }
                if ($result === true){
                    $_message[] = 'Profile created successfully';
                }
            }
        }
        break;
    //ako je unet pogresan action, redirekcija na 404
    default :
        redirect(FILE_ERROR404);
        break;
}
$_page_output = [
    'page_title' => 'Sign up',
    'view' => 'module-users.php'
];
?>
