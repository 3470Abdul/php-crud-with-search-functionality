<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>

<style>
table,th,td {
    border : 2px solid black;
    border-collapse: collapse;
}

td{
    text-align: center;
}


</style>

</head>
<body>
<?php   
include 'conn.php';
$que = "SELECT * FROM `crudtable`";
if(isset($_GET['SearchBtn']))
{
    $SearchBy = $_GET['SearchList'];
    $searchText = $_GET['search'];
    if($SearchBy == "Id")
    {
        $que = "SELECT * FROM crudtable WHERE id = '$searchText' ";
    } 
    elseif($SearchBy == "Name")
    {
        $que = "SELECT * FROM crudtable WHERE employeename = '$searchText' ";
    }
    elseif($SearchBy == "Designation")
    {
        $que = "SELECT * FROM crudtable WHERE employeejob = '$searchText' ";
    }
    else
    {
        echo "<script>alert('Please select any field');</script>";
    }
}

$query = mysqli_query($con, $que);
$rows = mysqli_num_rows($query);
// echo $rows;
// $row = mysqli_fetch_assoc($query);
// print_r ($row);
if($rows > 0)
{
?>

<form  action="display.php" method="get">
<label for="">Search By: </label>
<select name="SearchList">
<option value="Select">Select</option>
<option value="Id">Id</option>
<option value="Name">Name</option>
<option value="Designation">Designation</option>
</select>
<input type="text" name="search" required>
<input type="submit" name="SearchBtn" value="Search">
<button><a href="display.php">Reset</a></button>
</form>
<h1 style = "text-align : center;">Employee Data</h1>
<table style = "width : 100%;">
<tr>
<th>Employee ID</th>
<th>Emloyee Name</th>
<th>Employee Email</th>
<th>Employee Contact</th>
<th>Employee Age</th>
<th>Employee Job Title</th>
<th>Employee Salery</th>
<th colspan="2">Actions</th>
<?php
while($row = mysqli_fetch_assoc($query))
{
?>
</tr>
<tr>
<td><?php echo $row['id'] ?></td>
<td><?php echo $row['employeename'] ?></td>
<td><?php echo $row['employeeemail'] ?></td>
<td><?php echo $row['employeecontact'] ?></td>
<td><?php echo $row['employeeage'] ?></td>
<td><?php echo $row['employeejob'] ?></td>
<td><?php echo $row['employeesalery'] ?></td>
<td colspan="2"><a href = "update.php?id=<?php echo $row['id'] ?>">Update</a>&nbsp&nbsp&nbsp&nbsp&nbsp<a href = "delete.php?id=<?php echo $row['id'] ?>">Delete</a></td>
</tr>
<?php
}
}
else
{
    echo "No Record Found";
}
mysqli_close($con);
?>
</table><br><br>
<button><a href="insert.php">Insert Another Data</a></button>
</body>
</html>