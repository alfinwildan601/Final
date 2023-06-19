<?php
include 'fungsi.php';
$order = new Amount();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Buy</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<style>
  body{
    font-family: Arial, sans-serif;
    background-color: #3a3a3a;
  }
</style>
<body>
  <nav class="navbar-inverse" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
          <span class="sr-only"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"> Fyn Coffee</a>
      </div>
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="#" data-toggle="modal" data-target="#buy"><i class="fa fa-shopping-cart"></i> Buy</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"></a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container" style="margin-top: 50px;">
    <div class="panel panel-success">
      <div class="panel-body" style="background-color:crimson;">
        <div class="container">
          <h1><i class="fa fa-shopping-cart"></i> Fyn Shop</h1>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="container">
          <div class="col-md-10">
            <h4>Click here for purchase
              <button type="button" class="btn " name="button" data-toggle="modal" data-target="#buy" style="background-color:crimson;">
                <i class="fa fa-shopping-cart"></i> Buy
              </button>
            </h4>
          </div>
        </div>
      </div>
    </div>
    <img src="img/gambar1.jpg" alt="1" style="width:300px;border-radius:5px;padding-left:-5px;margin-left:200px;">
   <img src="img/gambar2.jpg" alt="2"style="width:300px;border-radius:5px;padding-left:5px;">
    
        
        <div class="container">
          <?php
          if (isset($_POST['check'])) {
            $pizzaria = $_POST['pizza'];
            $spaghettiria = $_POST['spaghetti'];

            if ($pizzaria == null) {
              $order->getAmmount(0, $spaghettiria);
            } elseif ($spaghettiria == null) {
              $order->getAmmount($pizzaria, 0);
            } else {
              $order->getAmmount($pizzaria, $spaghettiria);
            }

            $order->setPrice();
            $order->copyReceipt();
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <br>
  <br>
  <div class="modal fade" id="buy" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header " style="border-radius: 5px 5px 0px 0px;background-color: #3a3a3a;color: #fff;">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="">Purchase Form</h4>
        </div>
        <div class="modal-body">
          <form class="form-group" action="" method="post">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-cutlery"></i></span>
              <input type="number" class="form-control" name="spaghetti" id="spaghetti" placeholder="Insert amount to buy" readOnly>
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-cutlery"></i></span>
              <input type="number" class="form-control" name="pizza" id="pizza" placeholder="Insert amount to buy" readOnly>
            </div>
        </div>
        <div class="modal-footer" style="border-radius: 5px 5px 0px 0px;background-color: #3a3a3a;color: #fff;">
          <button type="button" id="btnpizza" onclick="OnlyPizza()" class="btn " style="float: left;background-color:crimson;">Cappucino</button>
          <button type="button" id="btnspaghetti" onclick="OnlySpaghetti()" class="btn " style="float: left;background-color:crimson;">Mochalatte</button>
          <button type="button" onclick="Both()" class="btn " style="float: left;background-color:crimson;">Cappucino & Mochalatte</button>
          <button type="button" onclick="exit()" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-primary" name="check"><i class="fa fa-check"></i> Check Total</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    function OnlyPizza() {
      document.getElementById("pizza").readOnly = false;
      document.getElementById("spaghetti").readOnly = true;
      document.getElementById("btnspaghetti").disabled = false;
      document.getElementById("btnpizza").disabled = true;
    }

    function OnlySpaghetti() {
      document.getElementById("pizza").readOnly = true;
      document.getElementById("spaghetti").readOnly = false;
      document.getElementById("btnspaghetti").disabled = true;
      document.getElementById("btnpizza").disabled = false;
    }

    function Both() {
      document.getElementById("pizza").readOnly = false;
      document.getElementById("spaghetti").readOnly = false;
      document.getElementById("btnspaghetti").disabled = false;
      document.getElementById("btnpizza").disabled = false;
    }

    function exit() {
      document.getElementById("pizza").readOnly = true;
      document.getElementById("spaghetti").readOnly = true;
    }
  </script>


</body>

</html>