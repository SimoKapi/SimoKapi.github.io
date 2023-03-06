<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Simon - Books</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="book.css">
        <link rel="stylesheet" type="text/css" href="blog.css">
        <style>
            
            body {background-color: white;}
            
        </style>
    </head>
    <body>
        
        <script>
        function refresh() {
            var textContent = document.getElementById('editor-textarea').value;
            document.getElementById('viewer').srcdoc = textContent;
        }
    </script>
        <script>
        function insertTab(o, e)
{		
	var kC = e.keyCode ? e.keyCode : e.charCode ? e.charCode : e.which;
	if (kC == 9 && !e.shiftKey && !e.ctrlKey && !e.altKey)
	{
		var oS = o.scrollTop;
		if (o.setSelectionRange)
		{
			var sS = o.selectionStart;	
			var sE = o.selectionEnd;
			o.value = o.value.substring(0, sS) + "\t" + o.value.substr(sE);
			o.setSelectionRange(sS + 1, sS + 1);
			o.focus();
		}
		else if (o.createTextRange)
		{
			document.selection.createRange().text = "\t";
			e.returnValue = false;
		}
		o.scrollTop = oS;
		if (e.preventDefault)
		{
			e.preventDefault();
		}
		return false;
	}
	return true;
}
    </script>
        <script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script>
        
        <div class="bg"></div>
        <img src="cheetah-header.jpg" id="header">
        <h1 class="head_text" onclick="window.location.href = 'home.php'">Simon Kapicka</h1>
        <center><nav class="menu">
            <ul>
                <li><button onclick="window.location.href = 'a_home.php'">Home</button></li>
                <li><button onclick="window.location.href = 'a_animals.php'">Animals</button>
                </li>
                <li><button onclick="window.location.href = 'a_arduino.php'">Arduino</button></li>
                <li><button onclick="window.location.href = 'a_books.php'" class="active"><em>Books</em></button></li>
                <li><button onclick="window.location.href = 'a_comment.php'">Contacts</button></li>
                <li><button onclick="window.location.href = 'info.php'">Account</button></li>
            </ul>
            </nav></center>
        
                
        <?php
        
            if($_POST['confirm']){
                
            $update = $_POST['edit'];

            #Get old comments
            $old = fopen("books.txt", "r+t");
            $old_comments = fread($old, 1024);

            #Delete everything, write down new and old comments
            $write = fopen("books.txt", "w+");
            fwrite($write, $update);
            fclose($write);
            fclose($old);
            }
        
        ?>
        
        <center><div class="comment_area"><form method="post" action="">
<textarea id="editor-textarea" name="edit" onkeyup = "refresh()" onkeydown="insertTab(this, event);"><?php
                $read = fopen("books.txt", "r+t");
                echo fread($read, 1024);
                fclose($read);
            ?></textarea><iframe id="viewer"></iframe><br>

        <input type="submit" name="confirm" value="Save Changes" onclick="refresh()"></form></div></center>
        
    </body>