<?php
session_start();

require_once("config.php");

require_once(ROOT_PATH.'\function.php');
$usercredentials=new DB_con();

if(isset($_SESSION["uid"]) || isset($_COOKIE['user_login'])) { 
  $uname = $uun = $uup = "";
  if (isset($_SESSION["uname"])) {
    $uname  = $_SESSION['uname'];
  }
  if (isset($_COOKIE['user_login'])) {
    $uname  = $_COOKIE['user_login'];
  }

  $query="SELECT*FROM tblusers  WHERE Username='$uname'";

      $result= $usercredentials->runBaseQuery($query);

      foreach ($result as $k => $v) 
      {
        $uun = $result[$k]['Username'];
        $uup = $result[$k]['Password'];
      }
}

if(isset($_POST['signin']))
{

$uname=$_POST['username'];
$pasword=md5($_POST['password']);

$ret=$usercredentials->signin($uname,$pasword);
$num=mysqli_fetch_array($ret);
if($num>0)
{
  $_SESSION['uid']=$num['id'];
  $_SESSION['uname']=$uname;


      if(!empty($_POST["remember"])) {

        setcookie ("user_login",$_POST["username"]);

        setcookie ("userpassword",$_POST["password"]);

      } else {

        if(isset($_COOKIE["user_login"])) {

          setcookie ("user_login","");

        }

        if(isset($_COOKIE["userpassword"])) {
          setcookie ("userpassword","");
          setcookie ("userpassword","");

        }

      }

echo "<script>window.location.href='index.php'</script>";
}
else
{

echo "<script>alert('Invalid details. Please try again');</script>";
echo "<script>window.location.href='login.php'</script>";
}
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

   
    <title>Signin Admin</title>
    <style>

 
  </style>

  </head>
  <body>

<div class="container-fluid  ">
  <div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-sm-3 p-4 bg-light border">

      <form action="" method="post" id="login" autocomplete="off">
        <div class="form-row">

          <h4 class="title my-3">Login</h4>
          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
              </div>
              <input name="username" type="text" value="<?php if(isset($_COOKIE["user_login"])) { echo $_COOKIE["user_login"]; } ?>" class="input form-control" id="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>
          </div>

          <div class="col-12">
            <div class="input-group mb-3 w-100">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
              </div>
              <input name="password" type="password" value="" class="input form-control" id="password" placeholder="password" required="true" aria-label="password" aria-describedby="basic-addon1">
            </div>
          </div>

          <div class="col-6">
            <div class="form-group form-check text-left">
                <input type="checkbox" name="remember" <?php if(isset($_COOKIE["user_login"])) { ?> checked <?php } ?>  class="form-check-input" 
                id="remember_me">
                <label class="form-check-label" for="remember_me">Remember me</label>
            </div>

          </div>
          <div class="col-sm-12 pt-3 text-right">
               <p>Already registered <a href="register.php">Register</a></p>
          </div>

          <div class="col-12">
            <button class="btn btn-primary" type="submit"  name="signin">Login</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
    
  </body>
</html>

