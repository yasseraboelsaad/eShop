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
    <link rel="stylesheet" type="text/css" href="css/cart.css">

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
                        <a href= "signout.php" >Sign out</a>
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

            <div class="col-md-9">

                
                <div class="row">
                </div>

            </div>

        </div>

    </div>
    <div class="checkout">
  <h1>Order History</h1>
  <p>Your order History Include:</p>
        <?php
            $lastorder=0;
            $sql = mysql_query("SELECT * from Orders WHERE User ='{$_SESSION['user']}'");
            if (mysql_num_rows($sql)!=0){ 
                while($row = mysql_fetch_assoc($sql)){
                $result = mysql_query("SELECT * from Product WHERE id ='{$row['Product']}'");
                $asd = mysql_fetch_assoc($result);
                if ($lastorder==$row['Number']) {
        ?>
                <img src=<?php echo $asd['Image'];?>>
                <p> Product name: <?php echo $asd['Name']; ?> Price: <?php echo $asd['Name']; ?> Amount: <?php echo $row['Amount']; ?></p>
            <?php }else{ ?>
                <p>Order number: <?php echo $row['Number']; ?></p>
                <img src=<?php echo $asd['Image'];?>>
                <p> Product name: <?php echo $asd['Name']; ?> Price: <?php echo $asd['Name']; ?> Amount: <?php echo $row['Amount']; ?></p>
            <?php } ?>
        <?php 
             $lastorder=$row['Number'];
                }
            }else{
                echo "You havent purchased anything yet!";
            }
        ?>
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
