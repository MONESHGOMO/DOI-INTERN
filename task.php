<?php

$con = mysqli_connect("localhost", "root", "", "doi");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $name = mysqli_real_escape_string($con, $_POST['user_name']);
    $address = mysqli_real_escape_string($con, $_POST['user_address']);
    $mobile = mysqli_real_escape_string($con, $_POST['user_number']);
    $gender = mysqli_real_escape_string($con, $_POST['user_gender']);
    $age = mysqli_real_escape_string($con, $_POST['user_age']);

    
    if (empty($name) || empty($address) || empty($mobile) || empty($gender) || empty($age)) {
        die("Please fill out all fields.");
    }

    $sql = "INSERT INTO user_data (name, age, address, mobile, gender) VALUES ('$name', '$age', '$address', '$mobile', '$gender')";

    $result = mysqli_query($con, $sql);

    
    if ($result) {
        echo "Thank you, " . $name;
    } else {
        echo "Error: " . mysqli_error($con); 
    }

   
    mysqli_close($con);
}
?>
