<?php
session_start();
ob_start();

//starting code to take care of the cache
header("Expires: Mon, 26 Jul 1997 05::00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified 
header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false); header("Pragma: no-cache");   // HTTP/1.0
// hello3.php
?>
<?php 
require("headerCode.php");
require("connection.php"); 
?>

<h1><center>Stock Market Data and Information</center> </h1>
 <center>
<div>
<form method="GET">
<INPUT type="text" size="10" name="symbol" placeholder="Lookup Stock Symbol" value = <?php echo $_SESSION['symbol'];?> >
<br />

<INPUT type= "submit" name="history" value="History" formaction="stock-history.php">
<INPUT type ="submit" name="quote" value="Quote" formaction="quote-stock.php">

</form>
</div>


</center><br>
<div class="container">
      <p> If you've ever had questions about the stock market, like how are my stocks doing or what does the market look like today, then you've come to the right place. </p>
      <p> You can use this search bar to look for the data on a particular stock, or you can use the other pages for anything else you might need about stocks. </p>
      <p> If you want to see the options available for processing on this website, please use the header. If you want to just start searching, type into the bar and press the button. </p>
</div>
</body>
<div class="container">
<footer class="footer"> &copy Erkin George - Seattle Pacific University <?php echo date("Y");?>&copy</footer> 
</div>
</html>
<?php  // This is the LAST section in a PHP webpage file 
ob_end_flush(); 
?>
