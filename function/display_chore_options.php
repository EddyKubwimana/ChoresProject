<?php

    function displayChores($conn){


    $sql = "SELECT cid, chorename FROM Chores";
    $result = $conn->query($sql);
                
     while ($row = $result->fetch_assoc()) {
                                
                                        $cid = $row['cid'];
                                        $chorname = $row['chorename'];
                                        echo"<tr id = '$cid'>";
                                        echo "<td>$cid</td>";
                                        echo "<td>$chorname</td>";
                                        echo "<td><button class='edit-button' onclick='editChore($cid)'><img src ='../asset/edit.png'></button>
                                        <button class='delete-button' onclick='deleteChore($cid)'><img src ='../asset/delete.png'></button></td>";
                                        echo"</tr>";
    
                            }


    $conn->close();

    }
?>