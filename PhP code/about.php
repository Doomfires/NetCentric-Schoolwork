<?php
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

<h1><center>About</center> </h1>
<div class="container">
      <p> This website displays stocks, as seen on the day to day stock markets. This website is the creation of Erkin George, for Netcentric Computing at Seattle Pacific University </p>
</div>
<div class="container">
    <center>  
      <p> This is a work in progress and it will be updated from week to week. </p>
      <p> If you have any questions or want to contact me, I can be reached at <a href="mailto:georgee1@spu.edu">georgee1@spu.edu</a> </p>
    </center>
</div>
</body>
<footer class="footer"> &copy Erkin George - Seattle Pacific University <?php echo date("Y");?>&copy</footer> 
</html>
<?php  // This is the LAST section in a PHP webpage file 
ob_end_flush(); 
?>