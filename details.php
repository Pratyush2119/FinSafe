<?php
include("dbConnection.php");
$userid=$_GET['user'];
session_start();
$_SESSION['userid']=$userid;
$sql="SELECT * FROM `customers` WHERE c_id='$userid'";
$result=$connect->query($sql);
$row=$result->fetch_assoc();

$sql1="SELECT * FROM `customers` WHERE c_id!='$userid'";
$result1=$connect->query($sql1);
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

    <title>Account Details</title>
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

    <div id="receiverModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md" role="content">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title">Select Recipient</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        &times;
                    </button>
                </div>
                <div class="modal-body recv-list">
                    <?php
                    while($row1=$result1->fetch_assoc())
                    {
                    ?>
                        <div class="row row-details">
                            <div class="col-12">
                                <a type="button" class="btn-block bg-white p-2 font-weight-light" href="transfer.php?recv=<?php echo $row1['c_id'];?>">
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="ml-md-2 name"><?php echo $row1['name'];?></span>
                                        </div>
                                        <div class="col-6">
                                            <span class="info ml-md-2">Branch: <?php echo $row1['branch'];?></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="info ml-md-2"><?php echo $row1['phone'];?></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12">
                                <hr class="m-0" style="background-color: #e6e3e3;">
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <header class="jumbotron">
        <div class="container">
            <div class="row row-header">
                <div class="col-12 col-sm-6 align-self-center">
                    <div class="row">
                        <div class="col-12">
                            <span class="text-warning" style="font-family: 'Lobster', cursive;"><h1>A Friend you can Bank upon.</h1></span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                        <span>We guarantee complete security of your savings. Your safety is our first Priority.</span><br>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <span>Check account statement, Pay utility bills, Transfer funds, Recharge prepaid mobile/DTH, etc., at the click of a button.</span><br>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <span>Visit us and get started at the earliest.</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 text-center">
                    <img src="images/FINSAFE BANKING.png" height="250" width="250" class="rounded-circle img-fluid img-change d-none d-md-inline">
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row row-content justify-content-center">
            <div class="col-6 col-md-4 bg-white border rounded-left p-2 d-flex flex-column justify-content-center div-raised">
                <div class="row text-md-center ">
                    <div class="col-12 col-md-5">
                        <span class="text-secondary font-weight-light restext-size">Name</span>
                    </div>
                    <div class="col-12 col-md-7">
                        <span class="text-uppercase"><?php echo $row['name'];?></span>
                    </div>
                </div>
                <div class="row text-md-center pt-2">
                    <div class="col-12 col-md-5">
                        <span class="d-none d-md-block text-secondary font-weight-light">Phone No.</span>
                    </div>
                    <div class="col-12 col-md-7">
                        <span class="restext-col restext-size">+91-<?php echo $row['phone'];?></span>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 bg-white border rounded-right p-2 div-raised">
                <div class="row text-md-center justify-content-center">
                    <div class="col-5 text-center">
                        <div class="h1"><span class="fa fa-inr"></span></div>
                    </div>
                </div>
                <div class="row text-md-center">
                    <div class="col-12 col-md-5">
                        <span class="text-secondary font-weight-light restext-size align-middle">Balance</span>
                    </div>
                    <div class="col-12 col-md-7">
                        <span class="h4 text-info font-weight-light"><?php echo $row['balance'];?>.00</span>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="row row-details justify-content-center">
            <div class="col-12 col-md-8 bg-white border rounded div-raised">
                <div class="row mt-2 text-center">
                    <div class="col-12 mb-1">
                        <span class="font-weight-bold" style="color: #d4d4d4;">OTHER DETAILS</span>
                    </div>
                    <div class="col-12">
                        <hr class="m-0 bg-info">
                    </div>
                </div>
                <div class="row mt-2 pl-2 pr-2 ">
                    <div class="col-5 text-left text-md-center">
                        <span class="text-secondary font-weight-light">Email</span>
                    </div>
                    <div class="col-7 text-right text-md-center">
                        <span class="text-info" style="word-wrap:break-word"><?php echo $row['email'];?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <hr class="m-0">
                    </div>
                </div>
                <div class="row mt-2 pl-2 pr-2">
                    <div class="col-5 text-left text-md-center">
                        <span class="text-secondary font-weight-light">Account No.</span>
                    </div>
                    <div class="col-7 text-left text-md-center">
                        <span class="text-info" style="word-wrap:break-word">
                            <?php
                            $accno=substr_replace($row['accno'],'XXXXXXXXX',0,9);
                            echo $accno;
                            ?>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <hr class="m-0">
                    </div>
                </div>
                <div class="row mt-2 pl-2 pr-2">
                    <div class="col-5 text-left text-md-center">
                        <span class="text-secondary font-weight-light">Branch</span>
                    </div>
                    <div class="col-7 text-left text-md-center">
                        <span class="text-info" style="word-wrap:break-word"><?php echo $row['branch'];?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <hr class="m-0">
                    </div>
                </div>
                <div class="row mt-2 pl-2 pr-2">
                    <div class="col-5 text-left text-md-center">
                        <span class="text-secondary font-weight-light">IFSC Code</span>
                    </div>
                    <div class="col-7 text-left text-md-center">
                        <span class="text-info" style="word-wrap:break-word"><?php echo $row['ifsc'];?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <hr class="m-0">
                    </div>
                </div>
                <div class="row mt-2 pl-2 pr-2">
                    <div class="col-5 text-left text-md-center">
                        <span class="text-secondary font-weight-light">Address</span>
                    </div>
                    <div class="col-7 text-left text-md-center">
                        <span class="text-info" style="word-wrap:break-word"><?php echo $row['address'];?></span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <hr class="m-0">
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-content justify-content-center">
            <div class="col-12 col-md-4">
                <button type="button" id="transferbtn" class="btn btn-warning btn-block btn-raised shadow">Transfer Money</button>
            </div>
        </div>
    </div>
    
    <footer class="footer">
        <div class="container">
            <div class="row">             
                <div class="col-4 offset-1 col-sm-2">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="back.php?index=yes">Home</a></li>
                        <li><a href="back.php?transactions=yes">Transactions</a></li>
                    </ul>
                </div>
                <div class="col-7 col-sm-5">
                    <h5>Our Headquarter's Address</h5>
                    <address>
		              121, Salt Lake Road<br>
		              Kolkata, West Bengal<br>
		              INDIA<br>
		              <i class="fa fa-phone fa-lg"></i>: +91-8521234567<br>
		              <i class="fa fa-fax fa-lg"></i>: +91-8528765432<br>
		              <i class="fa fa-envelope fa-lg"></i>: <a href="mailto:finsafe@ctc.net">finsafe@ctc.net</a>
		           </address>
                </div>
                <div class="col-12 col-sm-4 align-self-center">
                    <div class="text-center">
                        <a class="btn btn-social-icon btn-google" href="http://google.com/+"><i class="fa fa-google-plus fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/profile.php?id="><i class="fa fa-facebook fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-linkedin" href="http://www.linkedin.com/in/"><i class="fa fa-linkedin fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-twitter" href="http://twitter.com/"><i class="fa fa-twitter fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-google" href="http://youtube.com/"><i class="fa fa-youtube fa-lg"></i></a>
                        <a class="btn btn-social-icon"href="mailto:"><i class="fa fa-envelope-o fa-lg"></i></a>
                    </div>
                </div>
           </div>
           <div class="row justify-content-center">             
                <div class="col-auto">
                    <p>© Copyright 2021 Finsafe Banking</p>
                </div>
           </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="scripts.js"></script>
</body>

</html>