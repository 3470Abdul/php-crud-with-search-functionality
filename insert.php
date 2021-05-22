<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
</head>
<body>

<?php

include 'conn.php';

if(isset($_POST['submit']))
{
    $employee_name = $_POST['employee_name'];
    $employee_email = $_POST['employee_email'];
    $employee_contact = $_POST['employee_contact'];
    $employee_age = $_POST['employee_age'];
    $employee_job = $_POST['employee_job'];
    $employee_salery = $_POST['employee_salery'];

    $que = "INSERT INTO `crudtable`(`employeename`, `employeeemail`, `employeecontact`, `employeeage`, `employeejob`, `employeesalery`) 
    VALUES ('$employee_name', '$employee_email', '$employee_contact','$employee_age','$employee_job','$employee_salery')";
    $query = mysqli_query($con, $que);

    if($query)
    {
        echo "<script>
          alert('Data Inserted Successfully !!');
          window.location.href='display.php';
        </script>
        ";
    }
    else
    {
        echo "<script>
          alert('Data Not Inserted !!');
          window.location.href='insert.php';
        </script>
        ";
    }

}
mysqli_close($con);

?>
    <h1>Insert Employee Data</h1>
    <form method = "post" action="insert.php">
    
    <lable>Employee Name : </lable>
    <input type = "text" name = "employee_name" value = "" required><br><br>
    <lable>Employee Email : </lable>
    <input type = "email" name = "employee_email" value = "" required><br><br>
    <lable>Employee Contact : </lable>
    <input type = "number" name = "employee_contact" value = "" required><br><br>
    <lable>Employee Age : </lable>
    <input type = "number" name = "employee_age" value = "" required><br><br>
    <lable>Employee Job Title: </lable>
    <input type = "text" name = "employee_job" value = "" required><br><br>
    <lable>Employee Salery : </lable>
    <input type = "number" name = "employee_salery" value = "" required><br><br>
    <input type = "submit" name = "submit">
    </form>
    <br>
    <br>
    <button> <a href="display.php">View All Data</a></button>
   
</body>
</html>