
<?php

include("../setting/core.php");
isLogIn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Chore</title>


    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            background-image: url(../asset/login.jpeg);
            margin: 0;
            padding: 0;
            display: flex;
        
        }

        .navbar {
            background-color: #368983;
            padding: 20px;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: left;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            margin-bottom: 15px;
            min-width:200px ;
            padding-bottom: 40px;
        }
        .chore-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 800px;
            text-align: center;
            margin: 20px;
        }

        h2 {
            color: #368983;
        }

        h2 {
            color: #368983;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            width: 300px;
            height:300 ;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 8px;
            font-weight: bold;
            color: #368983;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
            max-width: 300px;
        }

        button {
            background-color: #368983;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #2c6e6e;
        }

        

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #368983;
            color: #fff;
        }

        .action-buttons {
            display: flex;
            justify-content: space-around;
        }

        .edit-button, .delete-button {
            background-color: #368983;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .edit-button:hover, .delete-button:hover {
            background-color: #2c6e6e;
        }

    .overlay {
        display: none;
        align-items: center;
        justify-content: center;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1000;
    }

    .popup {
    background: #fff;
    padding: 100px;
    border-radius: 10px;
    text-align: center;
    color :black;
    background-color:white ;
    }

    .popup button {
    padding: 10px;
    margin-top: 10px;
    cursor: pointer;
       }

    </style>
</head>
<body>
   <div class="navbar">
        <a href="#">Chore MS</a>
        <a href="../views/home.php"> <img src =../asset/home.png> Home</a>
        <a href="../views/chore.html"> <img src =../asset/manage.png>Manage Chores</a>
        <a href="chore_control_view.php"> <img src =../asset/create.png>Create Chore</a>
        <a href = "assign_chore_view.php"><img src= ../asset/update.png>Assign Chore</a>
        <a href="../login/logout.php"> <img src =../asset/logout.png>Logout</a>
    </div>

    
    <div class="chore-container" id = "chore-container">
        <div class='overlay' id = "overlay">
            <div class='popup'>
                <form id="choreForm" action="../action/create_chore.php" method ="post" name="choreForm">
                    <label for="choreName">Chore Name:</label>
                    <input type="text" id="choreName" name="choreName" placeholder="Enter chore name" required>
        
               
        
                    <button onclick='closePopupun()'type="submit" id="createChoreBtn" name="createChoreBtn">Create Chore</button>
        
                </form>
               
            </div>
        </div>
        

        <h2>Chore List</h2>
        <table>
            <thead>
    
                <tr>
                    <th>Chore ID</th>
                    <th>Chore Name</th>
                    <th><button onclick="create()"><img src ="../asset/create.png">Add A chore</button></th>
                 
                </tr>
            </thead>
            <tbody>

            <?php
                        require_once "../setting/connection.php";
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
            ?>
        </table>
    </div>

    <script>

    function editChore(choreId) {
        var chore = document.getElementById(choreId);
        var cid = choreId; 

        var container = document.getElementById("chore-container");

        var overlay = document.createElement("div");
        overlay.classList.add("overlay");
        overlay.style.display = "flex";
        overlay.setAttribute("myclass","overlay");
        overlay.innerHTML= "<div class='popup'><form id='choreForm' action='../action/update_chore.php' method ='get' name='cid'><label for='cid'>id:</label><input type='number' name='cid' value='" + cid + "' readonly><label for='choreName'>update the chore name:</label><input type='text' id='choreName' name='choreName' placeholder='Enter the updated name' required><button onclick='closePopupun()' type='submit' id='createChoreBtn' name='createChoreBtn'>update</button></form><button onclick='closePopupdeux()'>cancel</button></div>";
        container.appendChild(overlay);
    }


        function deleteChore(choreId){
    
            var chore = document.getElementById(choreId);

            var container = document.getElementById("chore-container");

            var overlay = document.createElement("div");
            overlay.classList.add("overlay");
            overlay.style.display = "flex";

            overlay.setAttribute("myclass","overlay");
            overlay.innerHTML= "<div class='popup' <p>Do you want to delete the chore! .</p> <button onclick=deletion("+choreId+")>Delete</button> <button onclick='closePopupdeux()'>Cancel</button> </div>"
            container.appendChild(overlay);
            



        

        }

        function closePopupun() {
            var div = document.getElementById("overlay");
            div.style.display = "none";
            
            }

            function closePopupdeux() {
                window.location.href = "chore_control_view.php";
                $(".overlay").remove();
                
                

            }

          function create() {

            var div = document.getElementById("overlay");
            div.style.display = "flex";


           }


        
    function deletion(choreId){

    window.location.href = "../action/delete_chore.php?cid="+choreId+"";

    }
       
 </script>

</body>
</html>
