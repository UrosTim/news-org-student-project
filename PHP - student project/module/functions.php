<?php
//funkcija za redirekciju
function redirect($uri) {
    if ($uri == "") return;
    header("Location: {$uri}");
    exit;
}
//funkcija za konekciju sa bazom
function connect_db() {
    include(FILE_CONFIG);
    $_db = mysqli_connect($_config['db_host'], $_config['db_username'], $_config['db_password'], $_config['db_name']);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . $_db->connect_error;
        exit;
    }
    return $_db;
}
//funkcija za prekid konekcije sa bazom
function close_db($_db) {
    mysqli_close($_db);
}
//provera da li je korisnik admin
function is_admin() {
    return ($_SESSION['user_level'] ?? '') !== USER_ADMIN ? false : true;
}
?>