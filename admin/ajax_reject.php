<?php
    include_once("../include/connect_db.php");

    $id = $_POST['id'];

    $query = "UPDATE doctors SET status='Rejected' WHERE doctor_id='$id'";
    
    mysqli_query($conn, $query);



?>