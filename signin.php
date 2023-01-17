<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
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
                session_start();
                $email = $_POST["email"]; 
                $password = $_POST["password"];
                $sql = "SELECT * FROM userdata WHERE mailid = '$email' and password = '$password'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
//                $active = $row['active'];
                $count = mysqli_num_rows($result);
                echo $count;
                if($count == 1){
                    #session_register("email");
                    $_SESSION['login_user'] = $email;
                    echo '<script type="text/javascript">
                        window.onload = function () { alert("Login Successfull"); } 
                    </script>';
                    include 'product.html';
                }
                else{
                    echo '<script type="text/javascript">
                        window.onload = function () { alert("Invalid Credential"); } 
                    </script>';
                    include 'signin.html';
                }
            }
        ?>
    </body>
</html>
