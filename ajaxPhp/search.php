<?php 
require "../core/init.php";

if(isset($_REQUEST['str'])){
    $sql = "SELECT * FROM users";
    $query = $db->query($sql);
    $result = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $result[] = $row;
    }
    echo json_encode($result);
}

?>