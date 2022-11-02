<?php
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

if (!isset($_GET['id'])) {
    //echo 'error';
    include 'includes/errormessage.php';
    header("Location: dashboard.php");
} else {
    //Get ID values
    $id = $_GET['id'];

    //Call Delete function
    $result = $crud->deleteAttendee($id);
    //Redirect to list
    if ($result) {
        header("Location: dashboard.php");
    } else {
        include 'includes/errormessage.php';
    }
}

?>
