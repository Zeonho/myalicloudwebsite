<?php
   include 'database_HW6F17.php';
  //  $db = mysqli_connect($db_servername,$db_username,$db_password,$db_name,$db_port);
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = sha1(mysqli_real_escape_string($db,$_POST['password']));

      $sql = "SELECT acc_name FROM tbl_accounts WHERE acc_login = '$myusername' and acc_password = '$mypassword';";
      $result = mysqli_query($db,$sql);



      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;

         header("location: calendar.php");
      }else {
         $error = "Your Login Name or Password is invalid";
        //  DEBUG MODE
        //  $error = "Your Login Name or Password is invalid<br>" . $myusername . "<br>" . $mypassword . "<br>" . $sql;
      }
   }
?>

<!DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8">
   <title>Login Page</title>
   <link rel="stylesheet" href="style.css">
   <script type="text/javascript">
   // Form Validation
   function validateForm(){
       var name = document.forms["loginform"]["username"].value;
       var password = document.forms["loginform"]["password"].value;
       var msgDiv = document.getElementById("errormsg");
       var alert_string = ""


       if (name == ""){
           alert_string += "<p>Empty Login Name</p>";
       }
       if (password == ""){
         alert_string += "<p>Empty Login Password</p>";
       }

       if (alert_string == ""){
           return true;
       }else{
           msgDiv.innerHTML = alert_string;
           return false;
       }

   }
   </script>
 </head>

 <body>

   <div id="Title">
     <h1>Login Page</h1>
   </div>

   <div class="Navigator">
     <nav>
       <ul id="NavigatorList">
   <!--          <li><a href="calendar.php">My Calendar </a></li>-->
   <!--          <li><a href="form.php">Form input</a></li>-->
       </ul>
     </nav>
   </div>

   <div id="errormsg"><?php echo "<p>".$error."</p>"; ?></div>



   <div id="Input">
     <form action = "" name="loginform" onsubmit="return validateForm();" method = "post">
        <p>Login Name<input  name="username" type="text" ></p>
        <p>Login Password<input  name="password" type="password" ></p>
        <p><button id="loginsubmitbutton" type="submit" name="submit">Submit</button></p>
     </form>
   </div>
 </body>
</html>
