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
$query = "SELECT symSymbol, symName, symExchange FROM symbols " .
"WHERE symSymbol='" . $symbolSearch . "'" ;

$result = @$db->query($query);

$row = @$result->fetch_assoc(); // fetch_row - $row[0], $row[1], etc.

$symbol = $row['symSymbol'];
$symName = $row['symName'];
$symExchange = $row['symExchange'];

if(!$result)
{
print "Invalid query result<br />\n";
}
else //add an if here to check if this is for history or for quote
{

if($symbol == null)
{
    $symbol = "Symbol not found.";
    $symName = "n/a";
    $symExchange = "n/a";
}
// Process row

print "<h2>Symbol: " . $symbol. "</h2>\n";
print "<h3>" . $symName . ", quote from " . $symExchange . "</h3>";
$result->free();
}


print "<br />\n";
// Run a Query to get some recent quote data
$query = "select qSymbol, qQuoteDateTime, qNetChangePrice, qNetChangePct, qShareVolumeQty, qLastSalePrice from quotes"
." where qSymbol='{$symbolSearch}'"
." order by qQuoteDateTime desc";
$result = @$db->query($query);
if(! $result)
{
print "Invalid query result<br />\n";
}


//this is probably where I'll make
print "<table class='special'>\n";
print "<tr><th>Date</th><th>Last</th><th>Change</th><th>%Change</th><th>Volume</th></tr>\n";

//prints out the 
while($row = @$result->fetch_assoc())
{
print "<tr>";
$date = $row['qQuoteDateTime'];
$last =  $row['qLastSalePrice'];
$change = $row['qNetChangePct'];
$percentChange = $row['qNetChangePrice'];
$volume = number_format($row['qShareVolumeQty']);

//Code to do the decimal work
$percentChange = number_format( (float)$percentChange, 2, '.','');
$change = number_format((float)$change, 2,'.','');

if($change > 0)
{
    $change = "+" . $change;
}
if($percentChange > 0)
{
    $percentChange = "+" . $percentChange;
}

print "<td>{$date}</td>";
print "<td align='right'>\${$last}</td>";
print "<td align='center'>\${$change}</td>";
print "<td align='center'>{$percentChange}</td>";
print "<td align='center'>{$volume}</td>";
print "</tr>\n";
}
print "</table>\n";


// Always Close connection and free resultsets
@$result->free(); // Release memory for resultset
@$db->close(); // Close the database connection
}
?>