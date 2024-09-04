<?php
include("connect.php");

    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $address = $_POST['address'];
    $role = $_POST['role'];
    $image = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];

    if($password == $cpassword){
        move_uploaded_file($tmp_name, "../uploads/$image");
        $insert = mysqli_query($connect, "INSERT INTO user (name, mobile, password, address, role, photo, status, votes) VALUES ('$name', '$mobile', '$password', '$address', '$role', '$image',0,0)");
        if($insert){
            echo '
            <script>
            alert("Registration Successfull!");
            window.location = "../";
            </script>
            ';
        }
        else{
            echo '
            <script>
            alert("Some error occured");
            window.location = "../route/registration.html";
            </script>
            ';
        }
    }
    else{
        echo '
        <script>
        alert("Password and Confirm Password does not match");
        window.location = "../route/registration.html";
        </script>
        ';
    }
?>