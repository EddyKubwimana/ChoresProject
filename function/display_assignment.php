<?php

    function displayAssignment($conn){



    $sql = "SELECT Assignment.assignmentid, Chores.chorename,Status.sname,date_assign,date_due, who_assigned FROM Assignment INNER JOIN Chores ON Assignment.cid = Chores.cid INNER JOIN Status ON Status.sid = Assignment.sid";
    $result = mysqli_query($conn, $sql);
     while ($row = $result->fetch_assoc()) {

       $id = $row['assignmentid'];
       $status = $row['sname'];
       $chorename = $row['chorename'];
       $date_assigned = $row['date_assign'];
       $date_due = $row['date_due'];
       echo"<tr>";
                    echo"<td>$chorename </td>";
                    echo"<td>$status</td>";
                    echo" <td>$date_assigned</td>";
                    echo"<td>$date_due</td>";
                    echo "<td>
                    <button class='edit-button' onclick='editAssignment($id)'><img src ='../asset/edit.png'></button> <button class='delete-button' onclick='deleteAssignment($id)'><img src ='../asset/delete.png'></button></td>";
                    echo "</td>";
                    
                    
        echo"</tr>";}

    $conn->close();

    }
?>