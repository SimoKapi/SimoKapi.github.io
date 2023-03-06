<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Simo - Home</title>
        <link rel="stylesheet" type="text/css" href="style.css?version=2">
        <link rel="stylesheet" type="text/css" href="tryit-style.css?version=13">
        <link rel="stylesheet" href="lib/codemirror.css">
        <script src="lib/codemirror.js"></script>
        <script src="mode/python/python.js"></script>
        <script src="theme/monokai/monokai.css"></script>
                
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
        <script> 
            var div = document.getElementById("output-window"); 
            div.onload = function() { 
                div.style.height = 
                  div.contentWindow.document.body.scrollHeight + 'px'; 
            } 
        </script> 
        
        <script src="tryit-js.js" type="text/javascript"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.8/ace.js"></script>
        
        <style type="text/css">
            #htmlCode, #cssCode, #jsCode, #pythonwin, #javawin, #cwin, #julia {
                width: 375px;
                height: 250px;
                padding: 10px;
            }
            
            .code {
                font-family: "balooregular";
                font-size: 50px;
                margin-left: 50px;
            }
            
            .abovetext, .pagetext {
                background-color: #1f1f1f;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                color: whitesmoke;
            }
            
            .pagetext {
                width: 1190px;
            }
        </style>
    </head>
    
    <body>        
        <header>
            <?php include "assets/header.html"; ?>
        </header>
        
        <div class="body">
            
        <center><select id='lang'>
            <option value="0">Website Development</option>
            <option value="1">Python</option>
            <option value="2">Java</option>
            <option value="3">C#</option>
            <option value="4">Julia</option>
        </select></center>
                        
        <!--Website-->
        <center><div class="web">
            <table>
                <tl>
                    <td>
                        <div class="abovetext"><code class="code">HTML</code></div>
                        <div id="htmlCode"><h1></h1></div>
                    </td>
                </tl>
                <tl>
                    <td>
                        <div class="abovetext"><code class="code">CSS</code></div>
                        <div id="cssCode"></div>
                    </td>
                </tl>
                <tl>
                    <td>
                        <div class="abovetext"><code class="code">JavaScript</code></div>
                        <div id="jsCode"></div>
                    </td>
                </tl>
            </table>
            <div class="web-output">
                <div class="pagetext"><code class="code">Page</code></div>
                <iframe id="web-output-window"></iframe>
            </div>
        </div></center>
            
        <!--Python-->
        <center><div class="python" style="display:none">
            <table>
                <tl>
                    <td>
                        <div class="abovetext"><code class="code">Python <button class="runBtn">Run code</button></code></div>
                        <div id="pythonwin"></div>
                    </td>
                </tl>
            </table>
            <div class="code-output">
                <div class="pagetext"><code class="code">Python output</code></div>
                <iframe id="python-output-window"></iframe>
            </div>
            <textarea id="pythonC"></textarea>
            <script>
              var editor = CodeMirror.fromTextArea(pythonC, {
                lineNumbers: true
              });
            </script>
        </div></center>
            
        <!--Java-->
        <center><div class="java" style="display:none">
            <table>
                <tl>
                    <td>
                        <div class="abovetext"><code class="code">Java <button class="runBtn">Run code</button></code></div>
                        <div id="javawin"><h1></h1></div>
                    </td>
                </tl>
            </table>
            <div class="code-output">
                <div class="pagetext"><code class="code">Java output</code></div>
                <iframe id="java-output-window"></iframe>
            </div>
        </div></center>
            
        <!--C#-->
        <center><div class="c" style="display:none">
            <table>
                <tl>
                    <td>
                        <div class="abovetext"><code class="code">C# <button class="runBtn">Run code</button></code></div>
                        <div id="cwin"><h1></h1></div>
                    </td>
                </tl>
            </table>
            <div class="code-output">
                <div class="pagetext"><code class="code">C# output</code></div>
                <iframe id="c-output-window"></iframe>
            </div>
        </div></center>
            
        <!--Julia-->
        <center><div class="julia" style="display:none">
            <table>
                <tl>
                    <td>
                        <div class="abovetext"><code class="code">Julia <button class="runBtn">Run code</button></code></div>
                        <div id="julia"></div>
                    </td>
                </tl>
            </table>
            <div class="code-output">
                <div class="pagetext"><code class="code">Julia output</code></div>
                <iframe id="julia-output-window"></iframe>
            </div>
        </div></center>
            
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            
        <script>
            $(document).ready(function(){
            $('#lang').on('change', function() {
              if ( this.value == '0')
              {
                $(".web").show();
                $(".python").hide();
                $(".java").hide();
                $(".c").hide();
                $(".julia").hide();
              }
              else if ( this.value == '1')
              {
                $(".web").hide();
                $(".python").show();
                $(".java").hide();
                $(".c").hide();
                $(".julia").hide();
              }
              else if ( this.value == '2')
              {
                $(".web").hide();
                $(".python").hide();
                $(".java").show();
                $(".c").hide();
                $(".julia").hide();
              }
              else if ( this.value == '3')
              {
                $(".web").hide();
                $(".python").hide();
                $(".java").hide();
                $(".c").show();
                $(".julia").hide();
              }
              else if ( this.value == '4')
              {
                $(".web").hide();
                $(".python").hide();
                $(".java").hide();
                $(".c").hide();
                $(".julia").show();
              }
            });
        });
        </script>
            
        <script type="text/javascript">
            var h = ace.edit("htmlCode");
            h.getSession().setMode("ace/mode/html");
            h.setTheme("ace/theme/monokai");
            h.session.on('change', function(delta) {
                showPreview();
            });
            
            var g = ace.edit("julia");
            g.getSession().setMode("ace/mode/julia");
            g.setTheme("ace/theme/monokai");
            g.session.on('change', function(delta) {
                showPreview();
            });
            
            var c = ace.edit("cssCode");
            c.getSession().setMode("ace/mode/css");
            c.setTheme("ace/theme/monokai");    
            c.session.on('change', function(delta) {
                showPreview();
            });
            
            var j = ace.edit("jsCode");
            j.getSession().setMode("ace/mode/javascript");
            j.setTheme("ace/theme/monokai");
            j.session.on('change', function(delta) {
                showPreview();
            });
            
            var p = ace.edit("pythonwin");
            p.getSession().setMode("ace/mode/python");
            p.setTheme("ace/theme/monokai");
            const uCode = p.getValue();
            
            var ja = ace.edit("javawin");
            ja.getSession().setMode("ace/mode/java");
            ja.setTheme("ace/theme/monokai");
            
            var cs = ace.edit("cwin");
            cs.getSession().setMode("ace/mode/csharp");
            cs.setTheme("ace/theme/monokai");
            
            function showPreview(){
                var htmlCode = h.getValue();
                var cssCode = "<style>" + c.getValue() + "</style>";
                var jsCode = "<scri" + "pt>" + j.getValue(); + "</scri" + "pt>";
                var frame = document.getElementById("web-output-window").contentWindow.document;
                frame.open();
                frame.write(htmlCode + cssCode + jsCode);
                frame.close();
            }
            
            const executeCodeBtn = document.querySelector('.testbtn');
            
            executeCodeBtn.addEventListener('click', () => {
                
                try {
                    console.log(new Function(uCode)());
                } catch (err) {
                    console.log(err);
                }
            })
            
        </script>
            
        <?php
            $pyScr = "<script>document.writeln(uCode);</script>";
            $output = shell_exec($pyScr);
            if(isset($_POST['runc'])) {
                echo $output;
            }
        ?>
            
        </div>
            
        <footer>
            <!--<?php include "assets/footer.html"; ?>-->
        </footer>
                
    </body>  
</html>