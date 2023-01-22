<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <style><?php include 'styles/payment.css'; ?></style>
        
    </head>
    <body>
        <br><br>
        <center>
        <div class='image'>
            <form action="payment.php" enctype="multipart/form-data" method="post">
            Select image :
            <input type="file" name="file"><br/><br>
            <input type="submit" value="Upload" name="Submit1"> <br/>
            </form>
        </div>
    </center>
    <br><br><br><br>
    <?php
    if(isset($_POST['Submit1']))
    {
        $showAlert = false; 
        $showError = false; 
        $exists=false;
        session_start();
        include 'dbconnect.php';
        $filepath = "images/" . $_FILES["file"]["name"];

        if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) 
        {
            $exp = $_SESSION['expense'];
            $sql = "SELECT * FROM expense WHERE name = '$exp'";
            $result = mysqli_query($conn,$sql);
            $rows = $result->fetch_assoc();
            echo "<center><img src=".$filepath." height=200 width=300 /></center>";
            echo $rows['name'];
//            echo "<center>
//                <h3>Expense Report</h3>
//            <table>
//                <tr>
//                    <td><b>Expense Name</b></td>
//                    <td> $rows[1] </td>
//                </tr>
//                <tr>
//                    <td><b>Total Expense</b></td>
//                    <td> $rows[2] </td>
//                </tr>
//                <tr>
//                    <td><b>Total No of People</b></td>
//                    <td> $rows[3] </td>
//                </tr>
//                <tr>
//                    <td><b>Per Person Expense</b></td>
//                    <td>< $rows[4] ></td>
//                </tr>
//            </table>
//            </center>";
        } 
        else 
        {
        echo "Error !!";
        }
    } 
    ?>
    <br><br><!-- comment -->
    <center>
                <h3>Expense Report</h3>
            <table>
                <tr>
                    <td><b>Expense Name</b></td>
                    <td><?php echo $rows['name'] ?></td>
                </tr>
                <tr>
                    <td><b>Total Expense</b></td>
                    <td><?php echo $rows['total'] ?></td>
                </tr>
                <tr>
                    <td><b>Total No of People</b></td>
                    <td><?php echo $rows['count'] ?></td>
                </tr>
                <tr>
                    <td><b>Per Person Expense</b></td>
                    <td><?php echo $rows['amount'] ?></td>
                </tr>
            </table>
            </center>
    <br><br><!-- comment -->
    <center>
    <button onclick="window.print()">Print Summary</button>
    </center>
    </body>
</html>
