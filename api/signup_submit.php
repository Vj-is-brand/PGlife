<?php
     require("../includes/database_connect.php");

     $full_name = $_POST['full_name'];
     $phone = $_POST['phone'];
     $email = $_POST['email'];
     $password = $_POST['password'];
     $password = sha1('password');
     $college_name = $_POST['college_name'];
     $gender = $_POST['gender'];

     $sql1 = "SELECT * from users where email='$email'";

     $result = mysqli_query($conn,$sql1);
     if (!$result) {
       echo " something went wrong !";
       exit;
     }
    
     $row_count = mysqli_num_rows($result);
     if ($row_count!=0) {
        echo "This email-id is already registered with us";
        exit;
     }     

     $sql="INSERT into users (email, password, full_name, phone, gender, college_name) VALUES ('$email','$password','$full_name','$phone', '$gender', '$college_name')";
     $result = mysqli_query($conn,$sql);
     if (!$result){
        echo " something went wrong !";
     }

     echo " Your account has been created Successfull ";
?>
     click<a href="../index.php">here</a>
     <?php
     mysqli_close($conn);
    ?>