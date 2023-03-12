<?php
require_once("config.php");

require_once(ROOT_PATH.'\function.php');
$userdata=new DB_con();
if(isset($_POST['submit']))
{
$fname=$_POST['fullname'];
$uname=$_POST['username'];
$uemail=$_POST['email'];
$pasword=md5($_POST['password']);
$sql=$userdata->registration($fname,$uname,$uemail,$pasword);
  if($sql)
  {
  echo "<script>alert('Registration successfull.');</script>";
  echo "<script>window.location.href='login.php'</script>";
  }
  else
  {
    echo "<script>alert('Something went wrong. Please try again');</script>";
    echo "<script>window.location.href='register.php'</script>";
  }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Login registration with remember me</title>
  
  <style>

  </style>

  <script>

function check_uname()
{
 var uname=document.getElementById( "username" ).value;
  
 if(uname)
 {
    $.ajax({
    type: 'post',
    url: 'checkdata.php',
    data: {
     username:uname,
    },
    success: function (response) {
     $( '#name_status' ).html(response);
     if(response=="Available") 
     {
      $(".form-group span").addClass("text-success");
      return true;  
     }
     else
     {
      return false; 
     }
    }
    });
 }

 else
 {
  $('#name_status').html("");
  return false;
 }
}

function checkemail()
{
 var uemail=document.getElementById( "email" ).value;
  
 if(email)
 {
  $.ajax({
  type: 'post',
  url: 'checkdata.php',
  data: {
   email:uemail,
  },
  success: function (response) {
   $( '#email_status' ).html(response);
   if(response=="Available") 
   {
    $(".form-group span").addClass("text-success");
    return true;  
   }
   else
   {
    return false; 
   }
  }
  });
 }
 else
 {
  $( '#email_status' ).html("");
  return false;
 }
}

function checkall()
{
 var namehtml=document.getElementById("name_status").innerHTML;
 var emailhtml=document.getElementById("email_status").innerHTML;

 if((namehtml && emailhtml)=="Available")
 {
  $(".form-group span").addClass("text-success");
  return true;
 }
 else
 {
  return false;
 }
}

</script>
  </head>
  <body>

    <div class="container p-4">
      <div class="row d-flex justify-content-center">
        <div class="col-sm-6 border p-4 bg-light">
          <form action="" method="post" id="login" onsubmit="return checkall();">
          <h4>Registration</h4>

            <div class="form-group">
              <label for="fullname">Full Name</label>
              <input name="fullname" type="text"  class="form-control" 
              id="fullname" placeholder="" required="true">
            </div>

            <div class="form-group">
               <label for="username">User Name</label>
               <input type="text" id="username" name="username" onkeyup="check_uname()" class="form-control"  required="true">
               <span id="name_status"></span>
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" onkeyup="checkemail()" placeholder="" class="form-control" required="true">
              <span id="email_status"></span>
            </div>

             
            <div class="form-group">
              <label for="password">Password</label>

               <input type="password"  id="password" name="password" placeholder="" class="form-control"  required="true">

            </div>
           
            <div class="col-sm-12 text-right">
               <button class="btn btn-primary" type="submit" id="submit" name="submit">Register</button>
            </div>

            <div class="col-sm-12 text-right">
               <p>Already registered <a href="login.php">Login</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
