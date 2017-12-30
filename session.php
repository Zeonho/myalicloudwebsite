<?php
   include('database_HW6F17.php');
   session_start();
   $GLOBALS['adminmsg'] = "";

   $user_check = $_SESSION['login_user'];

   $ses_sql = mysqli_query($db,"SELECT * FROM tbl_accounts WHERE acc_login = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['acc_name'];

   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>
