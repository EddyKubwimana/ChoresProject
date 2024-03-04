<?php

function selectRole($conn){
         $sql = "SELECT fid, fam_name FROM Family_name";
          $result = $conn->query($sql);
  
            while ($row = $result->fetch_assoc()) {
                  $roleId = $row['fid'];
                  $roleName = $row['fam_name'];
                  echo "<option value='$roleId'>$roleName</option>";
               }


}

?>