<?php

include 'conn.php';
$id = $_GET['id'];


$sql = "DELETE FROM `crudtable` WHERE id = '$id'";
$query = mysqli_query($con, $sql);


if($query)
{
   echo "
   <script>window.location.href='display.php'</script>
   ";
}


mysqli_close($con);
?>