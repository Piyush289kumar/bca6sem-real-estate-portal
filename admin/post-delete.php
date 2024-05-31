<?php
include("config.php");
// if ($_SESSION['user_role'] == 0 || $_SESSION['user_role'] == 5 || $_SESSION['user_role'] == 9) {
//     echo "<script>window.location.href='$hostname/admin/'</script>";
// }
$user_id_getaddbar = $_GET['id'];
?>
<script>
    alert('Deleted successfully !!')
</script>
<?php

$sql_delete_user = "UPDATE achievement SET active_record = 'no' WHERE aid = '{$user_id_getaddbar}'";

if (mysqli_query($conn, $sql_delete_user)) {
    echo "<script>window.location.href='$hostname/admin/post-read.php'</script>";
} else {
    echo ("<p style='color:red; margin:10px 0;'>Can't Delete the Record.");
}
mysqli_close($conn);
?>