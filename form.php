<?php
include("connection.php");
?>

<?php

if(isset($_POST['searchdata']))
{
    $search = $_POST['search'];

    $query = "SELECT * from form where roll = '$search' ";
    $data = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($data);


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software Development</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    
</head>
<body>
    <div class="center">
        <form action="#" method="POST">
        <h1>Employee Data Entry Automation Software</h1>

        <div class="form">
            <input type="text" name="search" class="textfield" placeholder="Search ID" 
            value="<?php if(isset($_POST['searchdata'])){echo $result['roll'];} ?>">
            <input type="text"  name="name" class="textfield" placeholder="Employee Name"
            value="<?php if(isset($_POST['searchdata'])){echo $result['emp_name'];} ?>">


            <select class="textfield" name="gender">
                <option value="not selected">Select Gender</option>
                <option value="Male"
                <?php
                if($result['emp_gender'] == "Male")
                    {
                        echo "Selected";
                    }
                ?>
                >Male</option>
                <option value="Female"
                <?php
                if($result['emp_gender'] == "Female")
                    {
                        echo "Selected";
                    }
                ?>
                >Female</option>

                <option value="Other"
                <?php
                if($result['emp_gender'] == "Other")
                    {
                        echo "Selected";
                    }
                ?>
                >Other</option>
            </select>

            <input type="text" name="email" class="textfield" placeholder="Email Address" 
            value="<?php if(isset($_POST['searchdata'])){echo $result['emp_mail'];} ?>">

            <select class="textfield" name="department">
                <option>Select Department</option>
                <option value="It"
                <?php
                if($result['emp_department'] == "It")
                    {
                        echo "Selected";
                    }
                ?>
                >It</option>
                <option value="HR"
                <?php
                if($result['emp_department'] == "HR")
                    {
                        echo "Selected";
                    }
                ?>
                >HR</option>
                <option value="Account"
                <?php
                if($result['emp_department'] == "Account")
                    {
                        echo "Selected";
                    }
                ?>
                >Account</option>
                <option value="Marketing"
                <?php
                if($result['emp_department'] == "Marketing")
                    {
                        echo "Selected";
                    }
                ?>
                >Marketing</option>
                <option value="Business Development"
                <?php
                if($result['emp_department'] == "Business Development")
                    {
                        echo "Selected";
                    }
                ?>
                >Business Development</option>
            </select>

            <textarea placeholder="Address" name="address"> <?php if(isset($_POST['searchdata'])){echo $result['emp_address'];} ?></textarea>
            <input type="submit" value="Search" name="searchdata" class="btn">
            <input type="submit" name="save" value="Save"  class="btn">
            <input type="submit" value="Update" name="update" class="btn">
            <input type="submit" value="Delete" name="delete" class="btn" onclick="checkdelete()">
            <input type="reset" value="Clear" name="" class="btn">

        </div>
    </form>
    </div>
</body>
</html>

<?php

if(isset($_POST['save']))
{
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $address = $_POST['address'];

    $query = "INSERT INTO form (emp_name,emp_gender,emp_mail,emp_department,emp_address) VALUES ('$name','$gender','$email','$department','$address')";

    $data = mysqli_query($conn,$query);

    if($data)
    {
        echo "<script> alert ('Data saved into Database') </script>";
    }
    else{
        echo "Failed to save Data";
    }
}
?>

<script>
    function checkdelete()
    {
        return confirm('Are your sure you want to delete this record?');
    }
</script>


<?php
    if(isset($_POST['delete']))
    {
        $roll = $_POST['search'];

        $query = "DELETE FROM form WHERE roll='$roll' ";
        $data = mysqli_query($conn, $query);

        if($data)
        {
            echo "Record deleted";
        }
        else{
            echo "Failed to deleted";
        }
    }
?>


<?php

if(isset($_POST['update']))
{
    $roll = $_POST['search'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $address = $_POST['address'];

    $query = "UPDATE form SET emp_name = '$name',emp_gender='$gender',emp_mail='$email',emp_department='$department',emp_address='$address' WHERE roll='$roll' ";
    
    $data = mysqli_query($conn,$query);

    if($data)
    {
        echo "<script> alert ('Record Updated') </script>";
    }
    else{
        echo "Failed to Update";
    }
}

?>
