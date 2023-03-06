<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Simo - Home</title>
        <link rel="stylesheet" type="text/css" href="style.css?version=3">
        <script>
            // When the user scrolls the page, execute myFunction 
                window.onscroll = function() {myFunction()};

                // Get the navbar
                var navbar = document.getElementByClassName("menu");

                // Get the offset position of the navbar
                var sticky = navbar.offsetTop;

                // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
                function myFunction() {
                  if (window.pageYOffset >= sticky) {
                    navbar.classList.add("sticky")
                  } else {
                    navbar.classList.remove("sticky");
                  }
                }
        </script>
    </head>
    
    <body>
        <header>
            <?php include "assets/header.html"; ?>
        </header>
        
        <div class="body">
            
        <form action="insert.php" method="post">
            <input type="text" name="title" placeholder="Title of post" required>
            <input type="text" name="article" placeholder="Article" required>
            <input type="submit" value="Create post">
        </form>
            
        <!--<?php
            
            $link = mysqli_connect("localhost", "test", "", "insert");

            if($link === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            } else {
                $sql = 'SELECT author, title, article, date FROM form';
                mysql_select_db('insert');
                $retval = mysql_query( $sql, $link );
            }
        ?>-->
        
        </div>
        
        <footer>
            <?php include "assets/footer.html"; ?>
        </footer>
    </body>
    
</html>