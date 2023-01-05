<?php
 require("core/init.php");
 require("includes/handleForm.php");

 $emp = new Employee();
 if(isset($_POST['first_name'])){

    $f_name =$_POST['first_name'];
    $l_name =$_POST['last_name'];
    $phone =$_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $e_qual = $_POST['e-qual'];

    $message = $emp -> createEmployee( $f_name, $l_name, $phone, $email, $address, $dob, $e_qual );
 
 }

?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="./css/sidebar.css">

    <title>Create User</title>
</head>
<body>
    <!---- Sidebar -->
    <div style='margin: 20px'>
        <img style="cursor: pointer;" onclick="sidebarOpen()" src="img/menu.png" alt="Menu Icon">
    </div>
    <div id="sidebar-bg" class="sidebar-bg"></div>
    <div id="sidebar" class="sidebar">
        <div style='margin: 20px'>
            <img style="cursor: pointer;" onclick="sidebarClose()" src="img/close.png" alt="Close Icon">
        </div>
        <div>
            <ul style='list-style: none; line-height: 50px; '>
                <li style="background: #f1f3f4;width: max-content; padding: 0px 15px 0px 15px; border-radius: 20px;">
                    <a style="text-decoration: none;color: black;font-size: 20px;" href="index.php" >
                        Create Employee
                    </a>
                </li>
                <li style="padding: 0px 15px 0px 15px; ">
                    <a style="text-decoration: none;color: black;font-size: 20px;" href="employee-list.php" >
                        Employee List
                    </a>
                </li>
            </ul>
            
        </div>
    </div>
    

    <div class="card">
         <?php echo !empty($message) ?  '<div style="width: 100%; height: 30px; padding-top:7px; background: green; text-align: center;">'.$message.'</div>' : '' ?>
        <h2 class="form-heading">Create User</h2>
        <hr />
        <form action="index.php" method="POST" enctype="multipart/form-data">
            <div class="input-field-div">
                <label for="first_name">First Name</label><br />
                <input type="text" class="input-field" id="first_name" name="first_name" required>
            </div>
            <div class="input-field-div">
                <label for="last_name">Last Name</label><br />
                <input type="text" class="input-field" id="last_name" name="last_name" required>
            </div>
            <div class="input-field-div">
                <label for="dob">Date of birth</label><br />
                <input class="input-field" name="dob" type="date" name="dob" required pattern="\d{4}-\d{2}-\d{2}" />
            </div>
            <div class="input-field-div">
                <label for="e-qual">Education Qualification</label><br />
                <input type="text" class="input-field" id="e-qual" name="e-qual" required>
            </div>
            <div class="input-field-div">
                <label for="address">Address</label><br />
                <input type="text" class="input-field" id="address" name="address" required>
            </div>
            <div class="input-field-div">
                <label for="email">Email</label><br />
                <input type="email" class="input-field" id="email" name="email" required>
            </div>
            <div class="input-field-div">
                <label for="phone">Contact Number</label><br />
                <input type="text" class="input-field" id="phone" name="phone" pattern="[0-9]{10}" required>
            </div>
            <div class="input-field-div">
                <label for="photo">Photo</label><br />
                <input name="photo" type="file" accept=".png, .jpg, .jpeg" />
            </div>
            <div class="input-field-div">
                <label for="resume">Resume</label><br />
                <input name="resume" type="file" accept="application/pdf" />
            </div>

            <div class="input-field-div">
                <button class="submit-form" type="submit">Create User</button>
            </div>

        </form>
    </div>

    <script src="js/sidebar.js"></script>

</body>
</html>