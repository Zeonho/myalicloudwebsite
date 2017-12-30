<?php
include "session.php";

$acc_id = $_POST["acc_id_update"];
$acc_login = $_POST["acc_login_update"];
$acc_name = $_POST["acc_name_update"];
$acc_password = $_POST["acc_password_update"];
$uquery = 'UPDATE tbl_accounts SET acc_login = \''.$acc_login.'\', acc_name = \''.$acc_name.'\', acc_password = \''.sha1($acc_password).'\' WHERE acc_id = '.(int)$acc_id.' ;';
// echo  $uquery;
mysqli_query($db, $uquery);
$GLOBALS['adminmsg'] = "Account Updated Successfully";
echo '<script type="text/javascript"> window.location.href = "admin.php" </script>';

?>
