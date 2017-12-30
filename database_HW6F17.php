<?php
      $db_servername = 'cse-curly.cse.umn.edu';
      $db_port = 3306;
      $db_name = 'F17CS4131U15';  //Note is a  number, you can find it on moodle
      $db_username = 'F17CS4131U15';    //xxx is the number assigned on the moodle
      $db_password = 'mypasswordis8507';  // provided in moodle.
      $db = mysqli_connect($db_servername,$db_username,$db_password,$db_name,$db_port);
?>
