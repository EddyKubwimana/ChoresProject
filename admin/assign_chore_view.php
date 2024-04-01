
<?php
session_start();

include("../setting/core.php");
include("../setting/connection.php");
require_once "../function/select_people.php";
require_once "../function/select_chore.php";
require_once "../function/get_all_assignments.php";
require_once "../function/assignment_report.php";


isLogIn();

onlyAdmin();
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


        
        .chore-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            min-width: 900px;
            text-align: center;
            margin: 20px;
            
        }

        .chore-assigned {
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

        .action-buttons {
            display: flex;
            justify-content: space-around;
        }

        .edit-button, .complete-button, .incomplete-button {
            background-color: #368983;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .edit-button:hover, .complete-button:hover, .incomplete-button:hover {
            background-color: #2c6e6e;
        }
    </style>
</head>
<body>
<div class="navbar">
        <a href="#">Chore MS</a>
        <a href="../views/home.php"> <img src =../asset/home.png> Home</a>
        <a href="../views/chore.php"> <img src =../asset/manage.png>Manage Chores</a>
        <?php
        isSuperAdmin();
        ?>
        <a href="../login/logout.php"> <img src =../asset/logout.png>Logout</a>
    </div>

    <div class="chore-container">
        <h2>Assign New Chore</h2>
        <form id="assignChoreForm" action="../action/assign_chore.php" method="post" name="assignChoreForm">

            <label for="assignChore">Select The Assignment:</label>
            <select id="assignChore" name="aid" required>
               
            <option value="0">Select</option>

            <?php
               selectAssignment($conn);
            ?>
 
            </select>

            <label for="assignPerson">Select A  Person:</label>

            <select id="assignPerson" name="pid" required>

                    <option value="0">Select</option>

                    <?php
                    selectPeople($conn);
                    ?>

                    </select>

            <button type="submit">Assign Chore</button>
        </form>

        <div class="chore-assigned">
        <h2>Manage Assigned Chores</h2>
        <table>
            <thead>
                <tr>
                    <th>Chore Name</th>
                    <th>Person Assigned</th>
                    <th>Date Assigned</th>
                    <th>Due Date</th>
                    <th>Chore Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
               
                <?php

                selectAssignedAssignment($conn);

                ?>

            </tbody>

        </table>

    </div>
    </div>


<script>

function markChoreComplete(choreId){

window.location.href = "../action/mark_complete.php?assignmentid="+choreId+"";

}

function markChoreIncomplete(choreId){

window.location.href = "../action/mark_incomplete.php?assignmentid="+choreId+"";

}

</script>

    

</body>

<?php

$conn->close();

?>
