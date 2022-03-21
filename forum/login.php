<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php 
    session_start();
    $_SESSION["NAME"];
    $_SESSION["LoginError"] = 0;
	$servername = "localhost";
    $username = "u89083p84239_testU";
    $password = "cringepw";
    $dbname = "u89083p84239_test";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$userusername = htmlentities(mysqli_real_escape_string($conn, $_POST['name']));
	$userpassword = mysqli_real_escape_string($conn, $_POST['password']);
	echo $userusername;
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
    echo 'test';
	$encryptedpassword = hash('sha256', $userpassword . "youcansuckmycummies");
    $sqlaccountsearch = "SELECT `username`, `powerlevel` FROM `accounts` WHERE password='$encryptedpassword' AND username='$userusername'";
    echo 'test2';
    $query = mysqli_query($conn, $sqlaccountsearch);
    $rows = mysqli_num_rows($query);
    echo 'test4';
    echo $rows;
    if ($rows == 0) {
        $_SESSION["LoginError"] = 3;
    }
    echo 'test5';
	
	$fetchthing = mysqli_fetch_row($query);
	$_SESSION["username"] = $fetchthing[0];
    $_SESSION["powerlevel"] = $fetchthing[1];
    
    echo  $_SESSION["powerlevel"] .  $_SESSION["username"];

    //GIVING FEEDBACK ON WHAT WENT WRONG
    
    
    //CLOSING CONNECTION 
    mysqli_close($conn);
    header('Location:' . $_SERVER['HTTP_REFERER']);
	?>
    <script>

    //window.location.replace("https://forum.quicksoapy.nl/");

    </script>
</body>
</html>