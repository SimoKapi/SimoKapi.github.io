<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Simon - Comments</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="blog.css">
        <style>
        </style>
    </head>
    <body>
        <div class="bg"></div>
        <img src="cheetah-header.jpg" id="header">
        <h1 class="head_text" onclick="window.location.href = 'home.php'">Simon Kapicka</h1>
        
        <center><nav class="menu">
            <ul>
                <li><button onclick="window.location.href = 'a_home.php'">Home</button></li>
                <li><button onclick="window.location.href = 'a_animals.php'">Animals</button>
                </li>
                <li><button onclick="window.location.href = 'a_arduino.php'">Arduino</button></li>
                <li><button onclick="window.location.href = 'a_books.php'">Books</button></li>
                <li><button onclick="window.location.href = 'a_comment.php'"  class="active"><em>Contacts</em></button></li>
                <li><button onclick="window.location.href = 'info.php'">Account</button></li>
            </ul>
            </nav></center>
        
                
        <?php
        
            if($_POST['confirm']){
                
            $update = $_POST['edit'];

            #Get old comments
            $old = fopen("comments.txt", "r+t");
            $old_comments = fread($old, 1024);

            #Delete everything, write down new and old comments
            $write = fopen("comments.txt", "w+");
            fwrite($write, $update);
            fclose($write);
            fclose($old);
            }
        
        ?>
        
        <center><div class="comment_area"><form method="post" action=""><textarea class="edit" name="edit"><?php
            
                #Read comments
                $read = fopen("comments.txt", "r+t");
                echo fread($read, 1024);
                fclose($read);
            
            ?></textarea><br>
        <input type="submit" name="confirm" value="Save Changes"></form></div></center>
        
    </body>