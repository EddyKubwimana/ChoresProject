<?php
function selectPeople($conn){

               $sql = "SELECT pid,lname,fname FROM People";
                $result = $conn->query($sql);
    
                while ($row = $result->fetch_assoc()) {
                            $pid = $row['pid'];
                            $fname = $row['fname'];
                            $lname = $row['lname'];
                            echo "<option value='$pid'>$fname   $lname </option>";
                }

}


?>