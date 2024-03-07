<?php
function incompleteChore($userId, $conn){
   
  $sql = "SELECT `Status`.`sid` FROM `Assignment` 
  INNER JOIN `Assigned_people` ON `Assignment`.`assignmentid` = `Assigned_people`.`assignmentid`
   INNER JOIN `Status` ON `Assignment`.`sid` = `Status`.`sid` WHERE `Assigned_people`.`pid` = 1 and `Status`.`sname` = 'Incomplete'";
   $result = $conn->query($sql);
   $answer =  mysqli_num_rows($result);
   mysqli_free_result($result);

return $answer;

}


function completeChore($userId, $conn){

$sql = "SELECT `Status`.`sid` FROM `Assignment` 
INNER JOIN `Assigned_people` ON `Assignment`.`assignmentid` = `Assigned_people`.`assignmentid`
INNER JOIN `Status` ON `Assignment`.`sid` = `Status`.`sid` WHERE `Assigned_people`.`pid` = 1 and `Status`.`sname` = 'Completed'";

$result = $conn->query($sql);
$answer =  mysqli_num_rows($result);
mysqli_free_result($result);
return $answer;

}


function inprogressChore($userId,$conn){

$sql = "SELECT `Status`.`sid` FROM `Assignment` 
INNER JOIN `Assigned_people` ON `Assignment`.`assignmentid` = `Assigned_people`.`assignmentid`
INNER JOIN `Status` ON `Assignment`.`sid` = `Status`.`sid` WHERE `Assigned_people`.`pid` = 1 and `Status`.`sname` = 'InProgress'";
$result = $conn->query($sql);

$answer =  mysqli_num_rows($result);
mysqli_free_result($result);

return $answer;
}