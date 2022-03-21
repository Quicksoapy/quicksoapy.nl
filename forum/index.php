<html>
<head>
	<link rel="shortcut icon" href="photos/icons//favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" sizes="57x57" href="photos/icons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="photos/icons/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="photos/icons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="photos/icons/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="photos/icons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="photos/icons/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="photos/icons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="photos/icons/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="photos/icons/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="photos/icons/favicon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="photos/icons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="photos/icons/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="photos/icons/android-chrome-192x192.png" sizes="192x192">
	<meta name="msapplication-square70x70logo" content="/smalltile.png" />
	<meta name="msapplication-square150x150logo" content="/mediumtile.png" />
	<meta name="msapplication-wide310x150logo" content="/widetile.png" />
	<meta name="msapplication-square310x310logo" content="/largetile.png" />
<link rel="icon" href="photos/icon.png" type="image/icon type">
<link href="index.css" rel="stylesheet" type="text/css">
<title>
SoapyForum</title>
</head>
<body>
<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>
<div class="titlediv"><h1>SoapyForum</h1></div>
<div class="left">
	<h2>Log in here!</h2>
	<form action="login.php" method="post">
Name: <input type="text" required="true" name="name"><br>
Password: <input type="password" required="true" name="password"><br>
<input type="submit">
</form>
    <?php 
    session_start();
	
    if (isset($_SESSION["username"])){
       echo "Welcome " . $_SESSION["username"]; 
    }
    
    if (isset($_SESSION["LoginError"])){
        if($_SESSION["LoginError"] == 3){
            echo 'username or password incorrect';
        }
    }else{
        echo 'You are not logged in';
    }
	
	if ($_COOKIE["post"] == 'true'){
		echo "<br>You already posted something within the last 10 seconds, wait 10 seconds more for the next post :)";
	}
    ?>

    <?php if ($_SESSION["powerlevel"] == "0" OR $_SESSION["powerlevel"] == "1" OR $_SESSION["powerlevel"])  : ?>
    <form action="forumsubmission.php" method="post">
        Message: <input type="text" required="true" name="message"><br>
        <input type="submit">
    </form>
        <?php endif; ?>
    </div>
<div class="center">
    <?php 
    $forumsubs = fopen("submissions.txt", "r") or die("Nothing has been posted yet :(");
    echo fread($forumsubs, filesize("submissions.txt"));
    fclose($forumsubs);
    ?>
    </div>
<div class="right">
	<h2>Make an account here!</h2>
	<form action="makingaccount.php" method="post">
Name: <input type="text" required="true" name="name"><br>
Password: <input type="password" required="true" name="password"><br>
<input type="submit">
</form>
	</div>
<div class="contrdiv"><h1>STILL VERY UNDER CONSTRUCTION</h1></div>

</body>

</html>