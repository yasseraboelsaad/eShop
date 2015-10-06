<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>eShop</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <img class = "navbar-brand" src="images/shoppingcart.png" style="height:50px">
                <a class="navbar-brand" href="index.php">eShop</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php if(!isset($_SESSION['user'])){ ?>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                    <?php } ?>
                    <?php if(!isset($_SESSION['user'])){ ?>
                    <li>
                        <a href="signup.php">Sign up</a>
                    </li>
                    <?php } ?>
                    
                    <?php 
                        if(isset($_SESSION['user'])){
                            mysql_connect('localhost','root','');
                            mysql_select_db('eshop');
                            $sql = mysql_query("SELECT * from Users WHERE Email ='{$_SESSION['user']}'");
                            $row=mysql_fetch_array($sql)
                     ?>
                    <li>
                        <a href="profile.php"> 
                            <?php echo $row['Fname']." ".$row['Lname']; ?>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if(isset($_SESSION['user'])){ ?>
                    <li>
                        <a href= "cart.php" >Cart</a>
                    </li>
                    <?php } ?>
                    <?php if(isset($_SESSION['user'])){ ?>
                    <li>
                        <a href= "orders.php" >Orders</a>
                    </li>
                    <?php } ?>
                    <?php if(isset($_SESSION['user'])){ ?>
                    <li>
                        <a href= "signout.php" >sign out</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead"><img src="images/shoppingcart.png" width = "50" height = "40"> <br>eShop <br>
                Your virtual shop.</p>
                <div class="list-group">
                    <a href="index_laptop.php" class="list-group-item">Laptops</a>
                    <a href="index_mobile.php" class="list-group-item">Mobiles</a>
                    <a href="index_tablet.php" class="list-group-item">Tablets</a>
                </div>
            </div>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <a href="index_mobile.php"><img class="slide-image" src="http://www.laurenlewis406.com/wp-content/uploads/2015/06/nurture-leads-with-your-mobile-phone-800x300.jpg" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href="index_tablet.php"><img class="slide-image" src="http://www.rojaksite.com/wp-content/uploads/2011/03/Apple-iPad-2-5-800x300.jpg" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href="index_laptop.php"><img class="slide-image" src="http://1.bp.blogspot.com/-U2boBYcxb4c/VZe0jULmoBI/AAAAAAAAAvc/8NDwGFjYl-0/s1600/price%2Blist%2Bof%2BLaptops%2Bin%2Bslot%2Bnigeria-717553.jpg" alt=""></a>
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <?php
                        mysql_connect('localhost','root','');
                        mysql_select_db('eshop');
                        $query = "SELECT * FROM Product";
                        $result = mysql_query($query);

                        while($row = mysql_fetch_assoc($result))
                        {?>
                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="thumbnail">
                                    <img src=<?php echo $row['Image']; ?> alt="">
                                    <div class="caption">
                                        <h4 class="pull-right"><?php echo "$".$row['Price']; ?></h4>
                                        <h4><a href="#"><?php echo $row['Name']; ?></a>
                                        </h4>
                                        <p><?php echo $row['Description']; ?></p>
                                        <?php 
                                            if($row['Stock']>0){?>
                                        <form method="post" action="index.php">
                                        
            
                                        <a>     Number: </a><input type="number" step="1" value="1" min="1"  max=<?php echo $row['Stock'];?> name=<?php echo $row['id']."no";?>>
                                        <input type='submit' name=<?php echo $row['id'];?> value= "Buy me!">
                                        </form>
                                        <?php }else{ ?>
                                        <p>Out of stock.</p>
                                        <?php }?>
                                    </div>
                                    <div class="ratings">
                                        <p class="pull-right">
                                        </p>
                                        <p>
                                        <?php
                                            if (isset($_POST[$row['id']])) {
                                                if (isset($_SESSION['authenticated'])) {
                                                    array_push($_SESSION['amount'],$_POST[$row['id']."no"]);
                                                    array_push($_SESSION['cart'],$row['id']);
                                                    echo "Added to cart!";
                                                }else{
                                                    echo "<script type='text/javascript'>alert('Please sign up or log');</script>";
                                                }
                                            }
                                        ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    


                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
   
</body>
<style type="text/css">
   body { background: #DAA520 !important; }
</style>
</html>
