<?php
include("dbConnection.php");
$transid=$_GET['transid'];
$sql="SELECT * FROM `transaction` WHERE transid='$transid'";
$result=$connect->query($sql);
$row=$result->fetch_assoc();
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

        <title>Transaction Status</title>
    </head>
    <body>
        <nav class="navbar navbar-dark navbar-expand-md fixed-top bg-info">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand mr-auto ml-3" href="index.php"><img src="images/FINSAFE BANKING.png" class="rounded-circle" height="35" width="35"></a>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php"><span class="fa fa-home fa-lg"></span> Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="transactions.php"><span class="fa fa-exchange fa-lg"></span> Transaction History</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-5 ">
            <div class="row row-details justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="row rounded bg-white">
                        <div class="col-12">
                            <?php
                            if($row['status']=="failed")
                            {
                            ?>
                            <div class="row row-details p-2">
                                <div class="col-12 text-center">
                                    <div class="row text-danger">
                                        <div class="col-12">
                                            <span class="fa fa-times-circle"></span>
                                        </div>
                                        <div class="col-12 status-info">
                                            <span>Transaction Failed!</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-details p-1">
                                <div class="col-12 text-danger text-center">
                                    <span><?php echo $row['reason'];?></span>
                                </div>
                            </div>
                            <?php
                            }
                            else
                            {
                            ?>
                            <div class="row row-details p-2">
                                <div class="col-12 text-center">
                                    <div class="row text-success">
                                        <div class="col-12">
                                            <span class="fa fa-check-circle"></span>
                                        </div>
                                        <div class="col-12 status-info">
                                            <span>Transaction Success!</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }?>
                            <div class="row row-details p-2 justify-content-center border-bottom border-info">
                                <div class="col-8 text-center">
                                    <span class="font-weight-bold" style="color: #d4d4d4;">PAYMENT DETAILS</span>
                                </div>
                            </div>
                            <div class="row row-details p-1 mt-2 trans-info">
                                <div class="col-6 text-left text-md-center">
                                    <span>Transaction Id:</span>
                                </div>
                                <div class="col-6 text-right text-md-center">
                                    <span class="text-info"><?php echo $row['transid'];?></span>
                                </div>
                            </div>
                            <div class="row row-details p-1 trans-info">
                                <div class="col-6 text-left text-md-center">
                                    <span>Sender:</span>
                                </div>
                                <div class="col-6 text-right text-md-center">
                                    <span class="text-info"><?php echo $row['sender'];?></span>
                                </div>
                            </div>
                            <div class="row row-details p-1 trans-info">
                                <div class="col-6 text-left text-md-center">
                                    <span>Sender Account No:</span>
                                </div>
                                <div class="col-6 text-right text-md-center">
                                    <span class="text-info">
                                        <?php
                                        $saccno=substr_replace($row['saccno'],'XXXXXXXXX',0,9);
                                        echo $saccno;
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <div class="row row-details p-1 trans-info">
                                <div class="col-6 text-left text-md-center">
                                    <span>Recipient:</span>
                                </div>
                                <div class="col-6 text-right text-md-center">
                                    <span class="text-info"><?php echo $row['receiver'];?></span>
                                </div>
                            </div>
                            <div class="row row-details p-1 trans-info">
                                <div class="col-6 text-left text-md-center">
                                    <span>Recipient Account No:</span>
                                </div>
                                <div class="col-6 text-right text-md-center">
                                    <span class="text-info">
                                        <?php
                                        $raccno=substr_replace($row['raccno'],'XXXXXXXXX',0,9);
                                        echo $raccno;
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <div class="row row-details p-1 trans-info">
                                <div class="col-6 text-left text-md-center">
                                    <span>Amount:</span>
                                </div>
                                <div class="col-6 text-right text-md-center">
                                    <span class="text-info"><?php echo $row['amount'];?>.00</span>
                                </div>
                            </div>
                            <div class="row row-details p-1 mb-2 trans-info">
                                <div class="col-6 text-left text-md-center">
                                    <span>Date:</span>
                                </div>
                                <div class="col-6 text-right text-md-center">
                                    <span class="text-info"><?php echo $row['date'];?></span>
                                </div>
                            </div>
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