<?php
    session_start();
    session_unset();
    session_destroy();
    header("location:initial_page.php");
 ?>
<html>
    <head>
        <script>
                history.pushState("null","null",document.title);
                window.addEventListener('popstate',function(){
                    history.pushState("null","null",document.title);
                });
        </script>
    </head>
</html>




