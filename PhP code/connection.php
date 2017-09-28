<?php

if(isset($_GET['symbol']))
{
    $_SESSION['symbol'] = $_GET['symbol'];
}
if(isset($_SESSION['symbol']))
{
    //blank to do nothing if a symbol is already inplace    
}
else
{
    $_SESSION['symbol'] = '';
}
?>