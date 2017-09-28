<?php
$symbolSearch = "";

$symbolSearch = @$_REQUEST["symbol"];

if(! empty($symbolSearch))
{ // process the form
// DB Connection Parameters
$host = "cs.spu.edu";
$user = "quotesdb"; // or individual MySQL user name with quotesdb permissions
$pwd = "quotesdb";

// Establish dbserver connection
$db = @new mysqli($host, $user, $pwd, 'quotesdb');
if($db->connect_errno)
    die("Could not connect to database. Error[{$db->connect_errno}]");
// Create a query object
$query = "SELECT * FROM symbols " .
"WHERE symSymbol LIKE'%{$symbolSearch}%' or symName LIKE'%{$symbolSearch}%'" ;

$result = @$db->query($query);

print "<table class='special' id='printed'>\n";
print "<tr><th>Company</th><th>Symbol</th><th>History</th><th>Quote</th></tr>\n";

if(!$result)
{
print "Invalid query result<br />\n";
}
else //add an if here to check if this is for history or for quote
{
// Process row
while($row = @$result->fetch_assoc())
{ 
$symName = $row['symName'];
$symbol = $row['symSymbol'];

print "<tr>";
print "<th>" . $symName . "</th><th>" . $symbol . "</th>";
print "<th><form action='stock-history.php' method ='GET'><button type='submit' name='symbol' value='$symbol'>history</button></form> </th>";
"<form method='GET'>";
print "<th><form action='quote-stock.php' method ='GET'><button type='submit' name='symbol' value='$symbol'>quote</button></form> </th>";
print "</tr>";
}
print "</table>\n";
$result->free();
}

// Always Close connection and free resultsets
@$result->free(); // Release memory for resultset
@$db->close(); // Close the database connection
}
?>