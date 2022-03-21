<?php
session_start();
/*
$value = time()+10;
if (isset($_COOKIE["post"])){
	$_SESSION["SubmitError"] = "You already posted something within the last 10 seconds, wait 10 seconds more";
}
*/
if ($_COOKIE["post"] == 'true'){
    die("Posted within 10 seconds");
    header("Location: ". "https://forum.quicksoapy.nl/");
}
setcookie("post", 'true', time()+10);
?>
<!doctype html>
<html>
<body>
<?php
/*
if (isset($_SESSION["SubmitError"])){
		echo "a";
		echo "<script> window.location.replace('https://forum.quicksoapy.nl/') </script>";
		header("Location: ". "https://forum.quicksoapy.nl/");
		die();
	}
*/
echo $_SESSION["username"];
$fp = fopen('submissions.txt', 'a');//opens file in append mode
fwrite($fp, '<b>' . $_SESSION["username"] . '</b> posted: ' . htmlentities($_POST['message']) . '<sub>posted on ' . date("Y-m-d H:i:s") . '</sub><br>');
fclose($fp);
	
//setcookie("post", $value, time()+10);
header("Location: ". "https://forum.quicksoapy.nl/");
?>
</body>
</html>