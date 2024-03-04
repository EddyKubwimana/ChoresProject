<?php

session_start();
if (isset($_SESSION["userId"]) && $_SESSION["userId"]) {

include("../setting/connection.php");
$sql = "SELECT fname,lname FROM People WHERE pid ='$_SESSION[userId]'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$username = $row["fname"].' '.$row["lname"];
}

else{

    header("Location:/choreProject/login/login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
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

        #username{

            padding:3px;
            text-align: right;
        }

       

        .welcome-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 20px;
            
        }

        h1 {
            color: #368983;
        }

        .statistics-box {
            display: flex;
            justify-content: space-around;
            margin: 30px;
            margin-top: 20px;
        }

        .box {
            flex: 1;
            padding: 15px;
            margin: 15px;
            min-width: 300px;
            background-color: #368983;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }

        .box:hover {
            background-color: #2c6e6e;
        }

        h2 {
            color:white;
            text-align: center;
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

        .completed-chore-table {
            margin-top: 40px;
        }

        .completed-chore-table th {
            background-color: #2c6e6e;
        }

        .action-button {
            background-color: #368983;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .action-button:hover {
            background-color: #2c6e6e;
        }

        .statusImage{
            width : 30px;
           
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="#">Chore MS</a>
        <a href="home.php"> <img src =../asset/home.png> Home</a>
        <a href="chore.html"> <img src =../asset/manage.png>Manage Chores</a>
        <a href="../admin/chore_control_view.php"> <img src =../asset/create.png>Create Chore</a>
        <a href ="../admin/assignment_chore_view.php"><img src= ../asset/addAssignment.png>Create Assignment</a>
        <a href = "../admin/assign_chore_view.php"><img src= ../asset/update.png>Assign Chore</a>
        <a href="../login/logout.php"> <img src =../asset/logout.png>Logout</a>
    </div>

    <div class="welcome-container">
        <div id = "username">

          <h1><img class = "statusImage" src =../asset/user.png><?php echo"$username"; ?></h1>

        </div>
        <h1>Welcome to Chore Manager</h1>
        

        <div class="statistics-box">
            <div class="box" onclick="redirectToChoreManagement('in-progress')">
                <img class = "statusImage" src =../asset/pending.png>
                <h2>In Progress</h2>
                <p>12 chores</p>
            </div>
            <div class="box" onclick="redirectToChoreManagement('incomplete')">
                <img  class = "statusImage" src =../asset/incomplete.png>
                <h2>Incomplete</h2>
                <p>5 chores</p>
            </div>
            <div class="box" onclick="redirectToChoreManagement('completed')">
                <img class = "statusImage" src =../asset/completed.png>
                <h2>Completed</h2>
                <p>20 chores</p>
            </div>
        </div>

    

        <h2>Recently Completed Chores</h2>
        <table>
            <thead>
                <tr>
                    <th>Chore Name</th>
                    <th>Assigned By</th>
                    <th>Date Assigned</th>
                    <th>Date Due</th>
                    <th>Chore Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
              
                <tr>
                    <td>Cleaning</td>
                    <td>Eddy Kubwimana</td>
                    <td>2024-02-01</td>
                    <td>2024-02-15</td>
                    <td>Pending</td>
                    <td><button class="action-button" onclick="markAsCompleted()"><img src =../asset/completed.png></button></td>
                </tr>
                <tr>
                    <td>Wash Dishes</td>
                    <td>Jane Smith</td>
                    <td>2024-02-03</td>
                    <td>2024-02-10</td>
                    <td>In Progress</td>
                    <td><button class="action-button" onclick="markAsCompleted()"><img src =../asset/completed.png></button></td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        function redirectToChoreManagement(status) {
        
            window.location.href = 'chore.html?status=' + status;
        }

        function markAsCompleted() {
            // Add your logic to update the chore status (e.g., mark as completed)
            alert(' marked as completed!');
        }
    </script>
</body>
</html>

