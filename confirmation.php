<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
		<title>
			Checkout
		</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
	</head>
<body>
	<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="images/shoppingcart.png" width = "50" height = "40"> <a class="navbar-brand" href="index.php">eShop</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
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
                    <?php if(isset($_SESSION['user'])){ ?>
                    <li>
                        <a href= "orders.php" >Orders</a>
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
                        <a href= "signout.php" >sign out</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
	<h1>Your order was successfully purchased.</h1>
</body>
</html>