<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        $showAlert = false; 
        $showError = false; 
        $exists=false;
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            include 'dbconnect.php';
            $email = $_POST["email"]; 
            $name = $_POST["username"]; 
            $mobile = $_POST["phone"]; 
            $password = $_POST["password"]; 
            $sql = "Select * from userdata where mailid='$email'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $active = $row['active'];
            $count = mysqli_num_rows($result);
            if($count == 0){
                $sql = "INSERT INTO `userdata` ( name,mobile,mailid, 
                    password) VALUES ('$name', '$mobile', '$email',
                    '$password')";
    
                $result = mysqli_query($conn, $sql);
                echo '<script type="text/javascript">
                    window.onload = function () { alert("Successfully Registered"); } 
                </script>';
                include 'signin.html';
            }
            else{
                echo '<script type="text/javascript">
                    window.onload = function () { alert("Email Already Exist"); } 
                </script>'; 
                include 'signup.html';
            }
        }
     ?>
    </body>
</html>
