<?php
include("dbConnection.php");
session_start();
$userid = $_SESSION['userid'];
$recvid=$_GET['recv'];

$sql="SELECT name,accno,balance,pin FROM `customers` WHERE c_id='$userid'";
$result=$connect->query($sql);
$row=$result->fetch_assoc();
$sender=$row['name'];
$saccno=$row['accno'];

$sql1="SELECT name,accno,balance FROM `customers` WHERE c_id='$recvid'";
$result1=$connect->query($sql1);
$row1=$result1->fetch_assoc();
$receiver=$row1['name'];
$raccno=$row1['accno'];

$transid=rand(1111111111111111,9999999999999999);
date_default_timezone_set("Asia/Kolkata");
$date=date("Y/m/d");

if(isset($_POST['transfer']))
{
    $amount=$_POST['amount'];
    $pin=$_POST['pin'];
    if($amount>$row['balance'])
    {
        $status="failed";
        $reason="Insufficient Balance for transaction!";
    }
    else if($pin!=$row['pin'])
    {
        $status="failed";
        $reason="Incorrect Security Code!";
    }
    else
    {
        $status="success";
        $reason="-";
    }
    
    $sql3="INSERT INTO transaction (transid,sender,saccno,receiver,raccno,amount,date,status,reason) VALUES ('$transid','$sender','$saccno','$receiver','$raccno',$amount,'$date','$status','$reason')";
    if($connect->query($sql3))
    {
        if($status=="success")
        {
            $sbal = $row['balance']-(int)$amount;
            $rbal = $row1['balance']+(int)$amount;
            $sql4="UPDATE customers SET balance=$sbal WHERE c_id='$userid'";
            $connect->query($sql4);
            $sql5="UPDATE customers SET balance=$rbal WHERE c_id='$recvid'";
            $connect->query($sql5);
        }
    }
    session_unset();
    header("Location: status.php?transid=$transid");
}
?>