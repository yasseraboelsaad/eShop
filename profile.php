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
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Page Content -->
    <div class="container">

       <div class="container">
    <h1>Edit Profile</h1>
    <hr>
    <div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
        <?php 
          mysql_connect('localhost','root','');
          mysql_select_db('eshop');
          $sql = mysql_query("SELECT * from Users WHERE Email ='{$_SESSION['user']}'");
          $row=mysql_fetch_array($sql)
        ?>
          <img src=<?php echo $row['Avatar'];?> class="avatar img-circle" alt="avatar">
          <h6>Upload a different photo...</h6>
          <form method="post">
          <input type="file" name="Avatar" class="form-control">
          </form>
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Personal info</h3>
        
        <form class="form-horizontal" role="form" method="post">
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="fname" value=<?php echo $row['Fname'];?>>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="lname" value=<?php echo $row['Lname'];?>>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="email" value=<?php echo $row['Email'];?>>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" name="Password" value=<?php echo $row['Password'];?>>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" name="CPassword" value=<?php echo $row['Password'];?>>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" name="save" value="Save Changes">
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>
            <?php
                if (isset($_POST['save'])) {
                  if ($password==$cpassword) {
                    $sql = mysql_query("UPDATE Users SET Fname = '{$_POST['fname']}', Lname = '{$_POST['lname']}', Email='{$_POST['email']}', Password='{$_POST['Password']}',Avatar='{$_POST['Avatar']}' WHERE Email='{$_SESSION['user']}'");
                    $_SESSION['user']=$_POST['email'];
                  }else{
                    echo "Passwords dont match";
                  }
                }
            ?>
            <div class="col-md-9">

                
                <div class="row">
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
