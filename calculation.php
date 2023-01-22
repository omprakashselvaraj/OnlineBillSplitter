<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            table,th,td {
            border: 1;
            border-bottom: 1px solid #faf9f9;
            border-collapse: collapse;
            text-align:left;
            padding: 10px;
            margin-bottom: 40px;
            font-size: 0.9em;
            background-color: rgb(114, 209, 238);
        }
        </style>
    </head>
    <body>
        <?php
        // put your code here
        $showAlert = false; 
        $showError = false; 
        $exists=false;
        session_start();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            include 'dbconnect.php';
            $expense = $_POST["expense"]; 
            $total = $_POST["total"]; 
            $people = $_POST["people"];
            $eachexp = $total / $people;
            $mail = $_SESSION['login_user'];
            $_SESSION['expense'] = $expense;
            $sql = "INSERT INTO `expense` (mailid, name, total, count,
                    amount) VALUES ('$mail','$expense','$total', '$people',
                    '$eachexp')";
    
            $result = mysqli_query($conn, $sql);
        }
        
        ?>
        <div class="result">
            <br><br><!-- comment -->
            <center>
                <h3>Expense Report</h3>
            <table>
                <tr>
                    <td><b>Expense Name</b></td>
                    <td><?php echo $expense ?></td>
                </tr>
                <tr>
                    <td><b>Total Expense</b></td>
                    <td><?php echo $total ?></td>
                </tr>
                <tr>
                    <td><b>Total No of People</b></td>
                    <td><?php echo $people ?></td>
                </tr>
                <tr>
                    <td><b>Per Person Expense</b></td>
                    <td><?php echo $eachexp ?></td>
                </tr>
            </table>
            </center>
        </div>
        <br><br><!-- comment -->
    <center>
        <a href="payment.php"><h5> click here for payment gateway </h5></a>
    </center>
    </body>
</html>
