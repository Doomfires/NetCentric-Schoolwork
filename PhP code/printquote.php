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
$query = "SELECT symSymbol, symName, symExchange, symMarketCap FROM symbols " .
"WHERE symSymbol='" . $symbolSearch . "'" ;

$result = @$db->query($query);

if(!$result)
{
print "Invalid query result<br />\n";
}
else //add an if here to check if this is for history or for quote
{
// Process row
$row = @$result->fetch_assoc(); // fetch_row - $row[0], $row[1], etc.

//store data
$symbol = $row['symSymbol'];
$symbolName = $row['symName'];
$symExchange = $row['symExchange'];

$counter = 0;

//format and check

if($symbol == null)
{
    $symbol = "Symbol not found";
    $counter = $counter + 1;
}
else
{

}
if($symbolName == null)
{
    $symbolName = "n/a";
}
else
{
    
}
if($symExchange == null)
{
    $symExchange = "n/a";
}
else
{
    
}



print "<h2>Symbol: " . $symbol . "</h2>\n";
print "<h3>" . $symbolName . ", quote from " . $symExchange . "</h3>";
$marketCap = $row['symMarketCap'];
$result->free();
}

// Run a Query to get some recent quote data
$query = "SELECT qSymbol, qQuoteDateTime, qLastSalePrice, qAskPrice, qBidPrice,
 q52WeekLow, q52WeekHigh, qTodaysLow, qTodaysHigh, qNetChangePrice, qNetChangePct, qShareVolumeQty,
qPreviousClosePrice, qCurrentPERatio, qEarningsPerShare, qCashDividendAmount,
qCurrentYieldPct, qTotalOutstandingSharesQty FROM quotes"
." where qSymbol='{$symbolSearch}'"
." order by qQuoteDateTime desc";
$result = @$db->query($query);
if(! $result)
{
print "Invalid query result<br />\n";
}


//this is probably where I'll make
print "<table>\n";

$row = @$result->fetch_assoc();
//The code below pulls the relevant data to be used
$date = $row['qQuoteDateTime'];
$lastSalePrice = $row['qLastSalePrice'];
$askPrice = $row['qAskPrice'];
$bidPrice = $row['qBidPrice'];
$low52 = $row['q52WeekLow'];
$high52 = $row['q52WeekHigh'];
$todayLow = $row['qTodaysLow'];
$todayHigh = $row['qTodaysHigh'];
$oldClosePrice = $row['qPreviousClosePrice'];
$currentPER = $row['qCurrentPERatio'];
$earningPER = $row['qEarningsPerShare'];
$dividentAmmount = $row['qCashDividendAmount'];
$currentYield = $row['qCurrentYieldPct'];
$totalShares = number_format($row['qTotalOutstandingSharesQty']);
$change = $row['qNetChangePrice']; 
$percentChange = $row['qNetChangePct'];
$volume = number_format($row['qShareVolumeQty']);

//code to handle null issues
if($date == null)
{
    $date = "n/a";
}
if($lastSalePrice == null)
{
    $lastSalePrice = "n/a";
}
if($askPrice == null)
{
    $askPrice = "n/a";
}
else
{
    $askPrice = number_format( (float)$askPrice, 2, '.','');
}
if($bidPrice == null)
{
    $bidPrice = "n/a";
}
else //otherwise, this is a number and can be formatted
{
    $bidPrice = number_format( (float)$bidPrice, 2, '.','');
}
if($low52 == null)
{
    $low52 = "n/a";
}
else
{
    $low52 = number_format( (float)$low52, 2, '.',''); //not sure why not populating
}
if($high52 == null)
{
    $high52 = "n/a";
}
else
{
    $high52 = number_format( (float)$high52, 2, '.','');
}
if($todayLow == null)
{
    $todayLow = "n/a";
}
if($todayHigh == null)
{
    $todayHigh = "n/a";
}
if($oldClosePrice == null)
{
    $oldClosePrice = "n/a";
}
if($currentPER == null) 
{
    $currentPER = "n/a";
}
else
{
    $currentPER = number_format( (float)$currentPER, 2, '.','');
}
if($earningPER == null)
{
    $earningPER = "n/a";
}
else
{
    $earningPER = number_format( (float)$earningPER, 2, '.','');
}
if($dividentAmmount == null)
{
    $dividentAmmount = "n/a";
}
else
{
    $dividentAmmount = number_format((float)$dividentAmmount, 2, '.','');
}
if($currentYield == null)
{
    $currentYield = "n/a";
}
else
{
    $currentYield = number_format((float)$currentYield, 2, '.','');
}
if($totalShares == null)
{
    $totalShares = "n/a";
}
if($change == null)
{
    $change = "n/a";
}
if($percentChange == null)
{
    $percentChange = "n/a";
}
if($volume == null)
{
    $volume = "n/a";
}
if($marketCap == null)
{
    $marketCap = "n/a";
}
else
{
    $marketCap = number_format($marketCap,1); 
}

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

print "<h2>Date " . $date . "</h2>\n";
print "<tr><th>Last</th><th>{$lastSalePrice}</th><th>Prev Close</th><th>{$oldClosePrice}</tr>\n";
print "<tr><th>Change</th><th>{$change}</th><th>Bid</th><th>{$bidPrice}</tr>\n";
print "<tr><th>%Change</th><th>{$percentChange}%</th><th>Ask</th><th>{$askPrice}</tr>\n";
print "<tr><th>High</th><th>{$todayHigh}</th><th>52 Week High</th><th> " . $high52 . "</tr>\n";
print "<tr><th>Low</th><th>{$todayLow}</th><th>52 Week Low</th><th>{$low52}</tr>\n";
print "<tr><th>Daily Volume</th><th>{$volume}</th></tr>\n";
print "</table>\n";

print "<h2> Fundementals </h2>";
print "<table>\n";
print "<tr><th>PE Ratio</th><th>{$currentPER}</th><th>Market Cap</th><th>" . $marketCap . " Mil</tr>\n";
print "<tr><th>Earnings/share</th><th>" . $earningPER ." </th><th>#Shares Out</th><th> " . $totalShares . "</tr>\n"; //$earningPER //$totalShares
print "<tr><th>Div/Share</th><th>" . $dividentAmmount . "</th><th>Div. Yield</th><th> " . $currentYield .  "%</th></tr>\n"; //$dividentAmmount // $currentYield
print "</table>\n";

// Always Close connection and free resultsets
@$result->free(); // Release memory for resultset
@$db->close(); // Close the database connection
}
?>