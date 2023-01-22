<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

    include 'dbconnect.php';
    $db=$conn;
    function fetch_data(){
        global $db;
        session_start();
        $uname = $_SESSION['login_user'];
        $query="SELECT * from expense where mailid='$uname'";
        $exec=mysqli_query($db, $query);
        if(mysqli_num_rows($exec)>0){
            $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
        return $row;  

        }else{
            return $row=[];
        }
   }
   $fetchData= fetch_data();
   show_data($fetchData);
   function show_data($fetchData){
    echo '<table border="1">
           <tr>
               <th>Expense Name</th>
               <th>Total Expense</th>
               <th>Total Count</th>
               <th>Per head expense</th>
           </tr>';
    if(count($fetchData)>0){
         foreach($fetchData as $data){ 
     echo "<tr>
             <td>".$data['name']."</td>
             <td>".$data['total']."</td>
             <td>".$data['count']."</td>
             <td>".$data['amount']."</td>
      </tr>";

        }
   }else{

     echo "<tr>
           <td colspan='7'>No Data Found</td>
          </tr>"; 
   }
     echo "</table>";
   }
   ?>
?>
    