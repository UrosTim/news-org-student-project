<?php
//proveravanje unetih podataka za login
function module_login_test_data() {
    global $_db,$_error;
    //input vrednosti
    $username = $_POST['username'];
    $password = $_POST['password'];
    //provera da li ima vrednosti
    if ($username == '') {
        $_error[] = 'Enter username';
        return false;
    }
    else if ($password == '') {
        $_error[] = 'Enter password';
        return false;
    }
    //kreiranje upita, smestanje vrednosti u result, uzimanje vrednosti row
    $sql = "SELECT * FROM users WHERE `users_username` = '{$_POST['username']}' LIMIT 1";
    $result = mysqli_query($_db, $sql);
    $row = mysqli_fetch_assoc($result);
    //provera prosledjenih vrednosti kroz upit
    if (!empty($row)) {
        $test_data = ($row['users_username'] == $username && $row['users_password'] == $password) ? true : false;
    }
    if (!$result || mysqli_num_rows($result) == 0 || !$test_data) {
        $_error[] = 'Wrong input values';
        return false;
    }
    return $row;
}
?>
