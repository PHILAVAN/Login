<?php
session_start();
  
require_once("config.php");

if(isset($_SESSION["uid"]) || isset($_COOKIE['user_login'])) { 
  include_once(ROOT_PATH.'\function.php');
  $usercredentials=new DB_con();

  $uname = $uun = $uup = "";
  if (isset($_SESSION["uname"])) {
    $uname  = $_SESSION['uname'];
  }
  if (isset($_COOKIE['user_login'])) {
    $uname  = $_COOKIE['user_login'];
  } 

  $query="SELECT *FROM tblusers  WHERE Username='$uname'";

      $result= $usercredentials->runBaseQuery($query);

      foreach ($result as $k => $v) 
      {
        $uun = $result[$k]['Username'];
        $uup = $result[$k]['Password'];
      }
?> 


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/static/css/login_form_style.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <title>Signin Admin</title>
    <style>

 
  </style>

  </head>
  <body>
<div class="container-fluid bg-light ">
<div class="container">
  <div class="row" style="min-height: 100vh;">
    <div class="col-sm-12 p-4 bg-white">

      <a href="logout.php" class="btn btn-warning">
        Logout
      </a>

      <h1>Hello, <strong><?php echo $uun;?>!</strong></h1>
      <h2>Welcome to Index</h2>

      <p>Welcome to the Index page. In this there is nothing except text. Sorry for the Inconvenience...</p>

      <p>Welcome to the Index page. In this there is nothing except text. Sorry for the Inconvenience...</p>
      <p>Welcome to the Index page. In this there is nothing except text. Sorry for the Inconvenience...</p>


    </div>
  </div>
</div>
</div>

<script type="text/javascript" src="<?php echo base_url();?>/static/js/login_form_custom.js"></script>

<script type="text/javascript">
</script>   

  </body>
</html>

<?php } else{
   header('location:login/logout.php');
  } 
?>

