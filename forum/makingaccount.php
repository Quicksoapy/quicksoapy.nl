<?php
if ($_COOKIE["madeaccount"] == 'true'){
    die("Made an account within 5 minutes already");
 }

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php 
	$servername = "localhost";
	$username = "u89083p84239_testU";
	$password = "cringepw";
	$dbname = "u89083p84239_test";
    $userusername0 = htmlentities($_POST['name']);
    $userpassword0 = $_POST['password'];
    $conn = new mysqli($servername, $username, $password, $dbname);
	$userusername = mysqli_real_escape_string($conn, $userusername0);
	$userpassword = mysqli_real_escape_string($conn, $userpassword0);
		// Create connection
    echo "'" . $userusername . "'" ;

	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
    
	$usernamecheck = "SELECT UID FROM accounts WHERE username='$userusername'";
	$resulto = $conn->query($usernamecheck);
	$rows = mysqli_num_rows($resulto);
    $currentdatetime = date('Y-m-d H:i:s');
    
	if ($rows > 0) {
		die("username already in use");
    }
    else{
        setcookie("madeaccount", 'true', time()+300);
		$encryptedpassword = hash('sha256', $userpassword . "youcansuckmycummies");
        $sql2 = "INSERT INTO `accounts` (`username`, `password`, `creationdatetime`) VALUES ('$userusername', '$encryptedpassword', '$currentdatetime')";


        if ($conn->query($sql2) === TRUE) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql2 . "<br>" . $conn->error;
	}
		
	
    }
	$conn->close();
	
	?>
	<script>

    window.location.replace("https://forum.quicksoapy.nl/");

    </script>
</body>
</html>