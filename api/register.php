<?php
    include("connection.php");

    $name = $_POST['name'];
    $h_name = $_POST['h_name'];
    $mobile = $_POST['mob'];
    $nid = $_POST['nid'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $division=$_POST['division'];
    $district=$_POST['district'];
    $village=$_POST['village'];
    $word_no=$_POST['word_no'];
    $add = $_POST['add'];
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $email=$_POST['email'];
    $role = $_POST['role'];

    if($cpass!=$pass){
        echo '<script>
                alert("Passwords do not match!");
                window.location = "../routes/register.php";
            </script>';
    }
    else{
        move_uploaded_file($tmp_name,"../uploads/$image");
        $insert = mysqli_query($connect, "insert into user (name, h_name, mobile, nid, password, division, district, village, word_no, address, photo, status, votes, email, role) values('$name', '$h_name',$mobile', '$nid', '$pass','$division', '$district', '$village', '$word_no', '$add', '$image', 0, 0, '$email', '$role') ");
        if($insert){
            echo '<script>
                    alert("Registration successfull!");
                    
                        window.location = "../";
                    
                </script>';
        }
        else
         {
             echo"Go to a error:".mysqli_errno($connect);
         }
    }
    
?>