<?php session_start();
?>
<?php
extract($_POST);


$logincredentials = file_get_contents ("credentials.config");
$loginlines = preg_split("/\r\n|\n|\r/" , $logincredentials);

foreach($loginlines as $login) {
    $loginlist[] = explode(", " , $login);
}

foreach($loginlist as $logincheck) {
    if((strcmp($email, $logincheck[0]) == 0) && (strcmp($password, $logincheck[1]) == 0)) {
        $_SESSION["authenticated"] = true;
    }
}

if ($_SESSION["authenticated"] == true) {  
    header('Location: index.php');
    die();
} else {
    header('Location: login.php');
    $_SESSION['error'] = 'INVALID LOGIN CREDENTIALS';
    die();
}


?>
