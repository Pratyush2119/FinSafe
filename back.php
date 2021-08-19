<?php
session_start();
session_unset();
if(isset($_GET['index']))
{
    header("Location: index.php");
}
if(isset($_GET['transactions']))
{
    header("Location: transactions.php");
}
?>