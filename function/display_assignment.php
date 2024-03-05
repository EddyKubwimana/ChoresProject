<?php

    function displayAssignment($conn){



    $sql = "SELECT assignmentid, cid,sid,date_assign,date_due, who_assigned FROM Assignment";
    $result = mysqli_query($conn, $sql);
     while ($row = $result->fetch_assoc()) {

       $id = $row['assignmentid'];
       $sid = $row['sid'];
       $cid = $row['cid'];
       $date_assigned = $row['date_assign'];
       $date_due = $row['date_due'];
       echo"<tr>";
                    echo"<td>$id</td>";
                    echo"<td>$sid</td>";
                    echo"<td>$cid </td>";
                    echo" <td>$date_assigned</td>";
                    echo"<td>$date_due</td>";
                    
                    
        echo"</tr>";}

    $conn->close();

    }
?>