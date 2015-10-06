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

            <div class="col-md-9">

                
                <div class="row">
                </div>

            </div>

        </div>

    </div>
    <div class="checkout">
        <h1>Order confirmation</h1>
        <p>You are about to buy:</p>
        <?php
            if (!empty($_SESSION['cart'])) {
                $amount=current($_SESSION['amount']);
                $total=0;
                foreach($_SESSION['cart'] as $id) {
                $sql = mysql_query("SELECT * from Product WHERE id ='$id'");
                $row = mysql_fetch_assoc($sql);
                $total+= ($row['Price']*$amount);
            ?>
                <p><img class="item" title="Image of Cover" src= <?php echo $row['Image']; ?> /><?php echo $amount; ?>  <?php echo $row['Name']; ?> for $<?php echo $row['Price']; ?></p>
                <form method="post">
                        <button class="button" value="Purchase" name=<?php echo $row['id']; ?> type="submit" >Remove</button>
                 </form>

        <?php 
                $amount=next($_SESSION['amount']); }
                reset($_SESSION['amount']);
                echo "Your total cost is $".$total; 
        ?>
        <br>
        <button class="button" value="Purchase" name="purchase" type="submit" >Purchase</button>
        <form action="index.php">
            <button class="button" name="purchase" >Continue shopping</button>
        </form>
        
    </div>
    </form>
    <?php
            if (isset($_POST[$row['id']])) {
                 $key = array_search($row['id'], $_SESSION['cart']);
                 unset($_SESSION['cart'][$key]);
                 unset($_SESSION['amount'][$key]);
                 echo "<script>
                        window.location.href='cart.php';
                    </script>";
             } 
            if (isset($_POST['purchase'])) {
                $sql=mysql_query("SELECT MAX(Number) FROM Orders");
                $order= mysql_fetch_assoc($sql);
                $orderno= $order['MAX(Number)']+1;
                $amount=current($_SESSION['amount']);
                foreach($_SESSION['cart'] as $id) {
                $result=mysql_query("INSERT INTO Orders (User, Product, Amount, Number) VALUES ('{$_SESSION['user']}', $id, $amount, '$orderno')");
                
                $qwe=mysql_query("SELECT Stock FROM Product WHERE id='$id'");
                $order= mysql_fetch_assoc($qwe);
                $stock= $order['Stock']-$amount;
                $qwe=mysql_query("UPDATE Product SET Stock='$stock' WHERE id=$id");
                unset($_SESSION['cart']);
                unset($_SESSION['amount']);
                $_SESSION['cart']= array();
                $_SESSION['amount']= array();
                echo "<script>
                        alert('Purchase successful.');
                        window.location.href='index.php';
                    </script>";
                }
                $amount=next($_SESSION['amount']);

            }
        }else{
            echo "No items in Cart!";
            }
     ?>
    <!-- /.container -->
    <hr>

    <div class="container">


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
