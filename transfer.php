<?php
include("dbConnection.php");
session_start();
$userid = $_SESSION['userid'];
$recvid=$_GET['recv'];
$sql="SELECT * FROM `customers` WHERE c_id='$userid'";
$result=$connect->query($sql);
$row=$result->fetch_assoc();
$sql1="SELECT * FROM `customers` WHERE c_id='$recvid'";
$result1=$connect->query($sql1);
$row1=$result1->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.css">
        <link rel="stylesheet" type="text/css" href="styles.css">
        
        <title>Proceed to Payment</title>
    </head>
    <body>
        <nav class="navbar navbar-dark navbar-expand-md fixed-top bg-info">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand mr-auto ml-3" href="back.php?index=yes"><img src="images/FINSAFE BANKING.png" class="rounded-circle" height="35" width="35"></a>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><button class="btn bg-transparent nav-link" onclick="warning(1)"><span class="fa fa-home fa-lg"></span> Home</button></li>
                        <li class="nav-item"><button class="btn bg-transparent nav-link" onclick="warning(2)"><span class="fa fa-exchange fa-lg"></span> Transaction History</button></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="row row-content bg-white rounded-top justify-content-center">
                        <div class="col-12 col-md-8 text-center">
                            <span class="h3">Payment Confirmation!</span>
                        </div>
                        <div class="col-12 col-md-8 text-center text-danger font-weight-light smaller">
                            <span class="warning">By clicking on the "Transfer" button you are confirming the transaction to the selected recipient. Mentioned amount will be deducted from your account. To cancel the transaction, click 
                                <a href="back.php?index=yes">here</a>.
                            </span>
                        </div>
                    </div>
                    <div class="row row-details bg-white border-top p-1 trans-info">
                        <div class="col-5 text-md-center">
                            <span>Sender</span>
                        </div>
                        <div class="offset-2 col-5 text-right text-md-center">
                            <span>Recipient</span>
                        </div>
                    </div>
                    <div class="row row-details bg-white p-1 trans-info">
                        <div class="col-5 text-md-center">
                            <span><?php echo $row['name'];?></span>
                        </div>
                        <div class="offset-2 col-5 text-right text-md-center">
                            <span><?php echo $row1['name'];?></span>
                        </div>
                    </div>
                    <div class="row row-details bg-white p-1 trans-info">
                        <div class="col-5 text-md-center">
                            <span>
                                <?php
                                $bal=substr_replace($row['accno'],'XXXXXXXXX',0,9);
                                echo $bal;
                                ?>
                            </span>
                        </div>
                        <div class="offset-2 col-5 text-right text-md-center">
                            <span>
                                <?php
                                $bal1=substr_replace($row1['accno'],'XXXXXXXXX',0,9);
                                echo $bal1;
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="row row-details bg-white p-1 pb-2 trans-info border-bottom">
                        <div class="col-5 text-md-center">
                            <span><?php echo $row['ifsc'];?></span>
                        </div>
                        <div class="offset-2 col-5 text-right text-md-center">
                            <span><?php echo $row1['ifsc'];?></span>
                        </div>
                    </div>
                    <div class="row row-details bg-white pt-2 p-1 justify-content-center">
                        <div class="col-12 col-md-8">
                            <form id="myform" action="banking.php?recv=<?php echo $recvid;?>" method="post">
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <div class="row">
                                            <div class="col-12 col-md-5">
                                                <label for="amount">Enter Amount: </label>
                                            </div>
                                            <div class="col-12 col-md-7">
                                                <input type="text" class="form-control form-control-sm mr-1" id="amount" name="amount" placeholder="Enter Amount" autocomplete="off">
                                            </div>
                                        </div>   
                                    </div>
                                    <div class="form-group col-12">
                                        <div class="row">
                                            <div class="col-12 col-md-5">
                                                <label for="pin">Enter Security Code: </label>
                                            </div>
                                            <div class="col-12 col-md-7">
                                                <input type="password" class="form-control form-control-sm mr-1" id="pin" name="pin" placeholder="Enter Security Code">
                                            </div>
                                        </div>   
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <div class="row justify-content-center">
                                            <div class="col-12 col-md-6">
                                                <input type="submit" name="transfer" class="btn btn-block btn-warning div-raised" value="Transfer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="scripts.js"></script>
    </body>
</html>