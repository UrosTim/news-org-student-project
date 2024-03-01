<?php
    // uzimanje podataka iz baze
    $data = [];
    $sql = "SELECT * FROM `users`";
    $result = mysqli_query($_db, $sql);
    while( $row = mysqli_fetch_assoc($result))
        $data[] = $row;
    switch ($_action){
        case 'delete':
            //brisanje naloga
            $_id = $_SESSION['user_id'];
            $sql = "DELETE FROM `users` WHERE `users_id` = $_id LIMIT 1";
            mysqli_query($_db, $sql);
            $_SESSION['loggedin'] = 0;
            session_destroy();
            redirect(FILE_INDEX);
    }
$_page_output = [
    'page_title' => 'Profile',
    'view' => 'module-profile.php'
];
?>