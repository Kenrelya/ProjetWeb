<?php 



include("conn.php"); 
if (!$_SESSION['AUTH'] || $_SESSION['type'] != 'ens')
{
    header('Location: redirection.php');
}

echo "<a href='listgrp2.php'>liste groupe</a><br/>";


 mysql_close($conn); 

  include("footer.php");


?>
<!--<div id=myDiv"></div>
<script type="text/javascript">
    var i = 0;
    function inc(){
        i++;
        document.write(i);
        //document.getElementById("myDiv").innerHTML = i;
        setTimeout("inc()", 1000);
    }
    function changePage(){
        window.location='accueil.php';
    }
    setTimeout("changePage()", 5000);
        inc();
</script>-->
