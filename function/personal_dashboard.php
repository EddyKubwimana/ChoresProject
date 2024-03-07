<?php
function incompleteChore($userId, $conn){
   
  $sql = "SELECT `Status`.`sid` FROM `Assignment` 
  INNER JOIN `Assigned_people` ON `Assignment`.`assignmentid` = `Assigned_people`.`assignmentid`
   INNER JOIN `Status` ON `Assignment`.`sid` = `Status`.`sid` WHERE `Assigned_people`.`pid` =  $userId and `Status`.`sname` = 'Incomplete'";
   $result = $conn->query($sql);
   $answer =  mysqli_num_rows($result);
   mysqli_free_result($result);

return $answer;

}


function completeChore($userId, $conn){

$sql = "SELECT `Status`.`sid` FROM `Assignment` 
INNER JOIN `Assigned_people` ON `Assignment`.`assignmentid` = `Assigned_people`.`assignmentid`
INNER JOIN `Status` ON `Assignment`.`sid` = `Status`.`sid` WHERE `Assigned_people`.`pid` = $userId and `Status`.`sname` = 'Completed'";

$result = $conn->query($sql);
$answer =  mysqli_num_rows($result);
mysqli_free_result($result);
return $answer;

}


function inprogressChore($userId,$conn){

$sql = "SELECT `Status`.`sid` FROM `Assignment` 
INNER JOIN `Assigned_people` ON `Assignment`.`assignmentid` = `Assigned_people`.`assignmentid`
INNER JOIN `Status` ON `Assignment`.`sid` = `Status`.`sid` WHERE `Assigned_people`.`pid` =  $userId and `Status`.`sname` = 'InProgress'";
$result = $conn->query($sql);

$answer =  mysqli_num_rows($result);
mysqli_free_result($result);

return $answer;
}


function personalChores($userId,$conn){

    $sql = "SELECT Chores.chorename,CONCAT(People.fname, ' ' , People.lname)AS assigner,Assignment.date_assign, Assignment.date_due,Status.sname FROM Assigned_people
    INNER JOIN Assignment ON Assigned_people.assignmentid = Assignment.assignmentid 
    INNER JOIN People as p ON Assigned_people.pid = p.pid 
    INNER JOIN Status ON Assignment.sid = Status.sid
    INNER JOIN People ON Assignment.who_assigned = People.pid
    INNER JOIN Chores ON Assignment.cid = Chores.cid
    
    where Assigned_people.pid = $userId;" ;
    $secondResult = $conn->query($sql);

    while ($ro = $secondResult->fetch_assoc()) {
        $chorename = $ro['chorename'];
        $fullname = $ro['Assigner'];
        $assigneddate = $ro['date_assign'];
        $datedue = $ro['date_due'];
        $status = $ro['sname'];

        echo"<tr>";
                echo"<td>$chorename</td>";
                echo"<td>$fullname</td>";
                echo"<td>$assigneddate</td>";
                echo" <td>$datedue</td>";
                echo"<td>$status</td>";
                echo "<td><button class='action-button' onclick='markAsCompleted()'><img src =../asset/completed.png></button></td>";
        echo "</tr>";
    }



    
}

function managePersonalChores($userId,$conn){

    $sql = "SELECT Chores.chorename,CONCAT(People.fname, ' ' , People.lname)AS assigner,Assignment.date_assign, Assignment.date_due,Status.sname FROM Assigned_people
    INNER JOIN Assignment ON Assigned_people.assignmentid = Assignment.assignmentid 
    INNER JOIN People as p ON Assigned_people.pid = p.pid 
    INNER JOIN Status ON Assignment.sid = Status.sid
    INNER JOIN People ON Assignment.who_assigned = People.pid
    INNER JOIN Chores ON Assignment.cid = Chores.cid
    
    where Assigned_people.pid = $userId AND Status.sname ='InProgress'" ;

    $secondResult = $conn->query($sql);

    while ($ro = $secondResult->fetch_assoc()) {
        $chorename = $ro['chorename'];
        $fullname = $ro['Assigner'];
        $assigneddate = $ro['date_assign'];
        $datedue = $ro['date_due'];
        $status = $ro['sname'];

        echo"<tr>";
                echo"<td>$chorename</td>";
                echo"<td>$fullname</td>";
                echo"<td>$assigneddate</td>";
                echo" <td>$datedue</td>";
                echo"<td>$status</td>";
                echo "<td><button class='action-button' onclick='markAsCompleted()'><img src =../asset/completed.png></button></td>";
        echo "</tr>";
    }

    

    
}


function allCompletedChores($userId,$conn){

    $sql = "SELECT Chores.chorename,CONCAT(People.fname, ' ' , People.lname)AS assigner,Assignment.date_assign, Assignment.date_due,Status.sname FROM Assigned_people
    INNER JOIN Assignment ON Assigned_people.assignmentid = Assignment.assignmentid 
    INNER JOIN People as p ON Assigned_people.pid = p.pid 
    INNER JOIN Status ON Assignment.sid = Status.sid
    INNER JOIN People ON Assignment.who_assigned = People.pid
    INNER JOIN Chores ON Assignment.cid = Chores.cid

    where Assigned_people.pid = $userId AND (Status.sname = 'Completed'" ;
    $secondResult = $conn->query($sql);

    while ($ro = $secondResult->fetch_assoc()) {
        $chorename = $ro['chorename'];
        $fullname = $ro['Assigner'];
        $assigneddate = $ro['date_assign'];
        $datedue = $ro['date_due'];
        $status = $ro['sname'];

        echo"<tr>";
                echo"<td>$chorename</td>";
                echo"<td>$fullname</td>";
                echo"<td>$assigneddate</td>";
                echo" <td>$datedue</td>";
                echo"<td>$status</td>";
        echo "</tr>";
    }    
}