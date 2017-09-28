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

<h1> <center> Stock History <center> </h1>

<center><h2 align="center"></h2>

<form method="GET">
<INPUT type="text" size="10" name="symbol" placeholder="Lookup Stock Symbol" value = <?php echo $_SESSION['symbol'];?> >
<br></br>

<INPUT type= "submit" name="history" value="History" formaction="stock-history.php">
<INPUT type ="submit" name="quote" value="Quote" formaction="quote-stock.php">
</form>

<div>
<?php require("printing.php");?>
</div>

<div class="row">
    <div class="span1 offset4">
<footer class="footer"> &copy Erkin George - Seattle Pacific University <?php echo date("Y");?>&copy</footer> 
    </div>
</div>

</html>

<?php  // This is the LAST section in a PHP webpage file 
ob_end_flush(); 
?>