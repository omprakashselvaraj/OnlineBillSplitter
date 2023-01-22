<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            
        </title>
        <style><?php include 'styles/table.css'; ?></style>
    </head>
    <body>
        <?php
        // put your code here
            include 'dbconnect.php';
            session_start();
            $uname = $_SESSION['login_user'];
            $sql = "SELECT * FROM expense where mailid='$uname'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
//                $active = $row['active'];
            ?>
    <center>
            <table>
            <tr>
                <th>Expense Name</th>
                <th>Total Expense</th>
                <th>Total Count</th>
                <th>Per head expense</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['name'];?></td>
                <td><?php echo $rows['total'];?></td>
                <td><?php echo $rows['count'];?></td>
                <td><?php echo $rows['amount'];?></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </center>
    <br>
    <div>
        <center>
            <a href="product.html"> Back to Main Page </a>
        </center>
    </div>
    <br><!-- comment -->
    <center>
        <button onclick="window.print()">Print Summary</button>
    </center>
    </body>
</html>
