<?php
session_start();
ob_start();

//
header("Expires: Mon, 26 Jul 1997 05::00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified 
header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false); header("Pragma: no-cache");   // HTTP/1.0
// hello3.php
?>
<?php require("headerCode.php");
require("connection.php"); ?>

<h1> <center> Symbol lookup </center> </h1>
<center>

<form action="symbol-lookup.php" method="GET">
<br />
<INPUT type="text" size="10" name="symbol" placeholder="Lookup Stock Symbol" id="searching" value = <?php echo $_SESSION['symbol'];?> >
<br/>
<INPUT type= "submit" name="Search" value="Search">

</form>
</center>
<h4><center> Results of company search</center></h4>
<center>
<?php require("printsym.php");
?>
</center>
<footer class="footer"> &copy Erkin George - Seattle Pacific University <?php echo date("Y");?>&copy</footer> 

</html>
<?php  // This is the LAST section in a PHP webpage file 
ob_end_flush(); 
?>