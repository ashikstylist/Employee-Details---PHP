<?php
 require("core/init.php");
 require("includes/handleForm.php");

 $emp = new Employee();
 $empList = $emp->getEmpList();

 if(isset($_POST['delete_id'])){  
    $delete_id = $_POST['delete_id'];
    $message = $emp->deleteUser($delete_id);
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

    <title>Edit Employee</title>
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
                <li style="padding: 0px 15px 0px 15px; ">
                    <a style="text-decoration: none;color: black;font-size: 20px;" href="index.php" >
                        Create Employee
                    </a>
                </li>
                <li style="background: #f1f3f4;width: max-content; padding: 0px 15px 0px 15px; border-radius: 20px;">
                    <a style="text-decoration: none;color: black;font-size: 20px;" href="employee-list.php" >
                        Employee List
                    </a>
                </li>
            </ul>
            
        </div>
    </div>
    

    <div style='max-width: 30rem;padding-left: 10px;padding-right: 10px; ' class="card-list">
         <?php echo !empty($message) ?  '<div style="width: 100%; height: 30px; padding-top:7px; background: green; text-align: center;">'.$message.'</div>' : '' ?>
        <h2 class="form-heading">Employee list</h2>
        <hr />
        <div class="input-field-div">
                <input onchange='ajax_change(this.value)' class="input-field" id="search" name="search" placeholder='Search'>
        </div>
        <br />
        <?php 
            while($accessorEmpList = mysqli_fetch_assoc($empList)): 
        ?>
               <div class="details-card">
                    <div class="inner-class-card">
                        <h4><?= $accessorEmpList['firstName'].' '.$accessorEmpList['lastName'] ?></h4>
                        <span class="detail-list"><?= $accessorEmpList['email'] ?></span>
                        <br />
                        <span class="detail-list"><?= $accessorEmpList['address'].' - '.$accessorEmpList['phone']  ?></span>
                        <br />
                        <span class="detail-list"><b>DOB - </b>  <?= $accessorEmpList['dob'] ?></span>
                        <br />
                        <span class="detail-list"><b>Education Qualification - </b>  <?= $accessorEmpList['e_qual'] ?></span>
                        <br />
                        <span class="detail-list">
                            <a class='download-link' href="./img/uploads/pdf/<?= $accessorEmpList['pdf'] ?>" download> Download Resume </a>
                        </span>
                        <b>-</b>
                        <span class="detail-list">
                            <a class='download-link' href="./img/uploads/photo/<?= $accessorEmpList['photo'] ?>" download> Download Photo </a>
                        </span>

                        <br /><br />
                        <div style='display: flex; align-items: flex-end; justify-content: space-between;'>
                            <form action="employee-list.php" method="POST">
                                <input type="hidden" name='delete_id' value='<?= $accessorEmpList['userId']  ?>'>
                                <button type='submit'>Delete</button>
                            </form>
                            <a href="edit-employee.php?userId=<?=$accessorEmpList['userId']?>"><button>Edit</button></a>
                        </div>
                    </div>
                </div>                     
        <?php 
            endwhile;  
        ?>
        
    </div>
    <script>
        function ajax_change(str){
            console.log(str)
            $.ajax({
                    type: 'POST',
                    url: 'ajaxPhp/search.php',
                    data: {str},
                    success: function (data) {         
                        var resultSet = JSON.parse(data);
                        const found = resultSet[0]['firstName'].includes(str);
                        console.log(found)
                    }
                });
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/sidebar.js"></script>

</body>
</html>