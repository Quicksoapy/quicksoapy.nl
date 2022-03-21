<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="index.css"/>
        <title>Not a scam</title>
    </head>
    <body>
        <div class="main">
            <p>aiusdhayushadh</p>
            <form method="post" action="">
                What is your age? <input name="age" type="text"><br>
                <input type="submit" name="buttonName" value="Continue"/>
            </form>
        </div>
        <?php

        if(array_key_exists('buttonName', $_POST)) {
            echo 'bleh';
        }
        ?>
    </body>
</html>

