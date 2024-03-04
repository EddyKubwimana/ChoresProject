<?php


function selectChore($conn){
    $sql = "SELECT cid, chorename FROM Chores";
    $secondResult = $conn->query($sql);

    while ($ro = $secondResult->fetch_assoc()) {
                $cid = $ro['cid'];
                $cname = $ro['chorename'];

                echo "<option value='$cid'>$cname</option>";
    };

}

?>