<?php
$connect = mysqli_connect("localhost", "root", "", "sunday_task");

if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
} else {
    echo "Database connected successfully<br>";
}

if (isset($_POST['save'])) {
    $name = mysqli_real_escape_string($connect, $_POST['user_name']);
    $email = mysqli_real_escape_string($connect, $_POST['user_email']);
    $city = mysqli_real_escape_string($connect, $_POST['user_city']);

    $sql = "INSERT INTO student_table(name, email, city) VALUES ('$name', '$email', '$city')";
    $res = mysqli_query($connect, $sql);

    if ($res) {
        echo "Data inserted successfully";
    } else {
        echo "Error: Data not inserted. " . mysqli_error($connect);
    }
} else {
    echo "Form not submitted";
}

mysqli_close($connect);
?>