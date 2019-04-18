<?php

    session_start();
    
    $db = mysqli_connect('localhost', 'root', '', 'crud');

    $name = "";
    $eid = "";
    $exp = "";
    $area = "";
    $doj = "";
    $id = 0;
    $update = false;
    
    if(isset($_POST['save'])){
        $eid = $_POST['eid'];
        $name = $_POST['name'];
        $exp = $_POST['exp'];
        $area = $_POST['area'];
        $doj = $_POST['doj'];
        
        mysqli_query($db, "INSERT INTO employee(ID, Name, experience, Area, doj) VALUES('$eid', '$name', '$exp', '$area', '$doj')");
        $_SESSION['message'] = "SAVED into DB!";
        header('location: index.php');
        
    }
        
        
        if (isset($_POST['update'])) {
	$eid = $_POST['eid'];
	$name = $_POST['name'];
	$exp = $_POST['exp'];
        $area = $_POST['area'];
        $doj = $_POST['doj'];

	mysqli_query($db, "UPDATE employee SET Name='$name', ID='$eid', experience='$exp', Area='$area', doj='$doj' WHERE ID=$eid");
	$_SESSION['message'] = "Address updated!"; 
	header('location: index.php');
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM employee WHERE ID=$id");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: index.php');
}
    

?>