<?php
function selectAssignment($conn){
    $sql = "SELECT  `assignmentid`, `chorename` FROM `Assignment` INNER JOIN `Chores` ON `Assignment`.`cid` = `Chores`.`cid`";
    $secondResult = $conn->query($sql);

    while ($ro = $secondResult->fetch_assoc()) {
                $aid = $ro['assignmentid'];
                $cname = $ro['chorename'];

                echo "<option value='$aid'>$cname</option>";
    };

}

?>