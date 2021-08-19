<?php
include("dbConnection.php");
$sql="SELECT * FROM `transaction` ORDER BY t_id DESC";
$result=$connect->query($sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.css">
        <link rel="stylesheet" type="text/css" href="styles.css">
        
        <title>Transactions List</title>
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
                        <li class="nav-item active"><a class="nav-link" href="transactions.php"><span class="fa fa-exchange fa-lg"></span> Transaction History</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-5">
            <div class="row row-details justify-content-center">
                <div class="col-12 col-md-8 bg-white rounded div-raised">
                    <div class="row justify-content-center p-3 border-bottom">
                        <div class="col-8 text-center">
                            <span class="trans-head text-info">Transaction History</span>
                        </div>
                    </div>
                    <?php
                    while($row=$result->fetch_assoc())
                    {
                    ?>
                    <div class="row p-2 border-bottom text-center info-details">
                        <div class=col-8>
                            <div class="row">
                                <div class="col-5">
                                    <span class="trans-info"><?php echo $row['sender'];?></span>
                                </div>
                                <div class="col-2 m-0 p-0">
                                    <?php
                                    if($row['status']=="success")
                                    {
                                    ?>
                                    <span class="fa fa-long-arrow-right fa-lg text-success"></span>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    <span class="fa fa-long-arrow-right text-danger"></span>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-5">
                                    <span class="trans-info"><?php echo $row['receiver'];?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <span class="trans-info"><?php echo $row['date'];?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-12 d-none d-md-block">
                                    <?php
                                    if($row['status']=="success")
                                    {
                                    ?>
                                    <span class="trans-info text-success">Success</span>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    <span class="trans-info text-danger">Failed</span>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-12">
                                    <?php
                                    if($row['status']=="success")
                                    {
                                    ?>
                                    <span class="amt-success">Rs.<?php echo $row['amount'];?>.00</span>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    <span class="amt-failed">Rs.<?php echo $row['amount'];?>.00</span>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        
        <footer class="footer">
        <div class="container">
            <div class="row">             
                <div class="col-4 offset-1 col-sm-2">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="transactions.php">Transactions</a></li>
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