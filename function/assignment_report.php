<?php
function selectAssignedAssignment($conn){
    $sql = "SELECT  `Chores`.`chorename`, CONCAT(`People`.`fname`, ' ', `People`.`lname`)AS fullname,`Status`.`sname`,`Assignment`.`date_assign`,`Assignment`.`date_due` FROM `Assigned_people` 
    INNER JOIN `People` ON `Assigned_people`.`pid` = `people`.`pid` 
    INNER JOIN `Assignment` ON `Assignment`.`assignmentid` = `Assigned_people`.`assignmentid`
    INNER JOIN `Chores` ON `Chores`.`cid` = `Assignment`.`cid`
    INNER JOIN `Status` ON `Status`.`sid` = `Assignment`.`sid`" ;
    $secondResult = $conn->query($sql);

    while ($ro = $secondResult->fetch_assoc()) {
        $chorename = $ro['chorename'];
        $fullname = $ro['fullname'];
        $assigneddate = $ro['date_assign'];
        $datedue = $ro['date_due'];
        $status = $ro['sname'];

        echo"<tr>";
                echo"<td>$chorename</td>";
                echo"<td>$fullname</td>";
                echo"<td>$assigneddate</td>";
                echo" <td>$datedue</td>";
                echo"<td>$status</td>";
                echo"<td class='action-buttons'>";
                echo"<button id =class='edit-button' onclick='editAssignedChore(1)'><img src ='../asset/edit.png'></button>";
                echo"<button class='complete-button' onclick='markChoreComplete(1)'><img src ='../asset/completed.png'></button>";
                echo "<button class='incomplete-button' onclick='markChoreIncomplete(1)'><img src ='../asset/incomplete.png'></button>";
                echo "</td>";
        echo "</tr>";
    }
               

}

?>