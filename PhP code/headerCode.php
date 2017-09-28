<?php
ob_start();

//starting code to take care of the cache
header("Expires: Mon, 26 Jul 1997 05::00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified 
header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false); header("Pragma: no-cache");   // HTTP/1.0
// hello3.php
//This header is supposed to reset the search while keeping the data in the search bar. In my mind, this speeds up the
// loading of the page, and clicking the button is what processes the request proper. 
print "<!DOCTYPE html>\n";
print "<html lang=\"en\">\n";
print "    <head>\n";
print "        <meta charset=\"utf-8\">\n";
print "        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n";
print "        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n";
print "        <title> Erkin's Website on Stock</title>\n";
print "        <link href=\"/bootstrap/bootstrap-3.3.7-dist/css/bootstrap.min.css\" rel=\"stylesheet\">\n";
print "        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n";
print "        <link rel=\"stylesheet\" href=\"CSS-frontpage.css\">  \n";
print "    </head> \n";
print "    <body>\n";
print "<nav class=\"navbar navbar-fixed-top\">\n";
print "<div id=\"fixed\">\n";
print "        <ul>\n";
print "            <li> <a href=\"default.php\"> Home </a> </li>\n";
print "            <li> <a href=\"quote-stock.php\">Quote Stock </a> </li>\n";
print "            <li> <a href=\"stock-history.php\"> Stock History </a> </li>\n";
print "            <li> <a href=\"symbol-lookup.php\"> Symbol Lookup </a> </li>\n";
print "            <li> <a href=\"about.php\"> About</a> </li>\n";
print "        </ul>\n";
print "</div>\n";
print "\n";
//Code below searchs sets up the search bar, which is uniform between the Home, Quote Stock and Stock History page

?>