<?php
include 'conn.php';

 $id = $_GET['id'];

$sql = "SELECT * FROM crudtable WHERE id = {$id} ";

$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);

?>

<h1>Update Employee Data</h1>
    <form method = "post" action="">
    <input type = "hidden" name="id" value = "<?php echo $row['id']; ?>">
    <lable>Employee Name : </lable>
    <input type = "text" name = "employee_name" value = "<?php echo $row['employeename'] ?>" required><br><br>
    <lable>Employee Email : </lable>
    <input type = "email" name = "employee_email" value = "<?php echo $row['employeeemail'] ?>" required><br><br>
    <lable>Employee Contact : </lable>
    <input type = "number" name = "employee_contact" value = "<?php echo $row['employeecontact'] ?>" required><br><br>
    <lable>Employee Age : </lable>
    <input type = "number" name = "employee_age" value = "<?php echo $row['employeeage'] ?>" required><br><br>
    <lable>Employee Job Title: </lable>
    <input type = "text" name = "employee_job" value = "<?php echo $row['employeejob'] ?>" required><br><br>
    <lable>Employee Salery : </lable>
    <input type = "number" name = "employee_salery" value = "<?php echo $row['employeesalery'] ?>" required><br><br>
    <input type = "submit" name = "submitbtn" value="Update" >
    </form>

    <?php
    if(isset($_POST['submitbtn']))
    {
        $id = $_POST['id'];
        $employee_name = $_POST['employee_name'];
        $employee_email = $_POST['employee_email'];
        $employee_contact = $_POST['employee_contact'];
        $employee_age = $_POST['employee_age'];
        $employee_job = $_POST['employee_job'];
        $employee_salery = $_POST['employee_salery'];

        $sql = "UPDATE crudtable SET id='$id', employeename=' $employee_name',employeeemail='$employee_email',employeecontact='$employee_contact',employeeage='$employee_age',employeejob='$employee_job',employeesalery='$employee_salery' WHERE id = '$id'";
        $query = mysqli_query($con, $sql);

        if($query)
        {
            echo "<script>
            alert('Data Updated Successfully !!');
            window.location.href='display.php';
            </script>
            ";
        }
        else
        {
            echo "<script>
            alert('Data Not Updated !!');
            window.location.href='display.php';
        </script>
        ";
        }

    }

    mysqli_close($con);

    ?>

</body>