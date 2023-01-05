<?php
    class Employee {
        public $db;
        public function __construct(){
            $this->db = new mysqli('localhost', 'root','','creative bees');
            if(mysqli_connect_errno()){
                echo "Database connection failed with following errors:" . mysqli_connect_error();
                die();
            }

        }
        
        // Create Employee
        public function createEmployee( $f_name, $l_name, $phone, $email, $address, $dob, $e_qual ){
         
            
            $photo = $_FILES['photo']['name']; 
            $uploadPath = "img/uploads/photo/".$photo;
            $uploaded = move_uploaded_file($_FILES["photo"]["tmp_name"], $uploadPath);

            $pdf = $_FILES['resume']['name']; 
            $uploadPathpdf = "img/uploads/pdf/".$pdf;
            $uploadedpdf = move_uploaded_file($_FILES["resume"]["tmp_name"], $uploadPathpdf);

            $insert_sql = "INSERT INTO users (userId, firstName, lastName, address, dob, e_qual, email, phone, photo, pdf) 
            VALUES(NULL,'$f_name','$l_name','$address','$dob','$e_qual','$email', '$phone', '$photo', '$pdf')";
            
            if($insert_query = $this->db->query($insert_sql)){ 
                return "Employee created successfully!";
            }
        }

        public function getEmpList(){
            $sql = "SELECT * FROM users";
            $query = $this->db->query($sql);
            return $query;
        }

        public function deleteUser($delete_id) {
            $sql = "DELETE FROM users WHERE userId = '$delete_id'";
            if($this->db->query($sql)){
                header("LOCATION: employee-list.php");
            }
        }

        public function getEditUser($user_Id, $f_name, $l_name, $phone, $email, $address, $dob, $e_qual ) {
            $sql = "UPDATE users SET  
                    firstName = '$f_name',  
                    lastName = '$l_name',
                    phone = '$phone',
                    address = '$address',
                    dob = '$dob',
                    e_qual = '$e_qual',
                    email =  '$email'
                    WHERE userId = '$user_Id' ";
             $query = $this->db->query($sql);
             header("LOCATION: employee-list.php");
        }

    }
?>