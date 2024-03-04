
<?php
session_start();

include("../setting/core.php");
include("../setting/connection.php");
require_once "../function/select_people.php";
require_once "../function/select_chore.php";
require_once "../function/select_chore_status.php";
isLogIn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Assignment</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            background-image: url(../asset/login.jpeg);
        }

        .navbar {
            background-color: #368983;
            padding: 20px;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: left;
            max-width: 200px;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            margin-bottom: 15px;
            min-width:200px ;
            padding-bottom: 40px;
        }


        
        .assignment-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            min-width: 900px;
            text-align: center;
            margin: 20px;
            
        }

        .chore-assignment {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            text-align: center;
            margin: 20px;
            min-width: 600px;
        }

        h2 {
            color: #368983;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 8px;
            font-weight: bold;
            color: #368983;
        }

        select, input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
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

    
    </style>
</head>
<body>
<div class="navbar">
        <a href="#">Chore MS</a>
        <a href="../views/home.php"> <img src =../asset/home.png> Home</a>
        <a href="../views/chore.html"> <img src =../asset/manage.png>Manage Chores</a>
        <a href="chore_control_view.php"> <img src =../asset/create.png>Create Chore</a>
        <a href ="assignment_control_view.php"><img src= ../asset/addAssignment.png>Create Assignment</a>
        <a href ="assign_chore_view.php"><img src= ../asset/update.png>Assign Chore</a>
        <a href="../login/logout.php"> <img src =../asset/logout.png>Logout</a>
    </div>

    <div class="assignment-container">
        <h2>Create a New Assignment</h2>
        <form id="assignChoreForm" action="#" method="post" name="assignChoreForm">
            <label for="assignPerson">Select Chore:</label>
            <select id="choreId" name="cid" required>

               <option value="0">Select</option>

               <?php
               selectChore($conn);
               ?>

            </select>

            <label for="status">Chore Status:</label>
            <select id="assignChore" name="" required>
               
            <option value="0">Select</option>

            <?php
               selectChoreStatus($conn);
            ?>
 
            </select>

            <label for="dueDate">Date assigned:</label>
            <input type="date" id="dueDate" name="assignedDate" required>


            <label for="dueDate">Due Date:</label>
            <input type="date" id="dueDate" name="dueDate" required>

            <button type="submit">Create</button>
        </form>

        <div class="chore-assignment">
        <h2>Manage Assignments</h2>
        <table>
            <thead>
                <tr>
                    <th>Assignment Name</th>
                    <th>Status</th>
                    <th>Date assigned</th>
                    <th>Due Date</th>
                    <th>Date updated</th>
                    
                </tr>
            </thead>
            <tbody>
               
                <tr>
                    <td>cleaning</td>
                    <td>Person 1</td>
                    <td>2024-02-01</td>
                    <td>2024-02-15</td>
                    <td>Pending</td>
                    
                </tr>
                <tr>
                    <td>Mowing</td>
                    <td>Person 2</td>
                    <td>2024-02-03</td>
                    <td>2024-02-10</td>
                    <td>In Progress</td>      

            </tbody>

        </table>

    </div>
    </div>

    

</body>

<?php

$conn->close();

?>
