
<?php include("./inc/connect.inc.php"); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Talent Club</title>
        <link rel="stylesheet" type="text/css" href="./css/style.css"/>
    </head>
    <body>
        <div class="headerMenu">
            <div id="wrapper">
                <div class="logo">
                    <img src="./img/find_friends_logo.png">
                </div>
                
                <div class="search_box">
                    
                    <form action="search.php" method="GET" id="search">
                        <input type="text" name="q" size="60" placeholder="Search..." >
                    </form>
                    
                </div>
                
                <div id="menu">
                    <a href="#">Home</a>
                    <a href="#">About</a>
                    <a href="#">Sign Up</a>
                    <a href="#">Sign In</a>
                </div>
            </div>
        </div>
        
    </body>
</html>
