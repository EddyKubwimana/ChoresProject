<?php


function selectChoreStatus($conn){
    $sql = "SELECT sid, sname FROM Status";
    $secondResult = $conn->query($sql);

    while ($ro = $secondResult->fetch_assoc()) {
                $cid = $ro['sid'];
                $cname = $ro['sname'];

                echo "<option value='$cid'>$cname</option>";
    };

}

?>