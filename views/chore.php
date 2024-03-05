
<?php

include("../setting/core.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chore Management</title>
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
            text-align: center;
            margin: 20px;
            
        }

        h2 {
            color: #368983;
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
    </style>
</head>
<body>
    <div class="navbar">
        <a href="#">Chore MS</a>
        <a href="home.php"> <img src =../asset/home.png> Home</a>
        <a href="chore.php"> <img src =../asset/manage.png>Manage Chores</a>
        <?php

        isSuperAdmin();

        ?>
       
        <a href="../login/logout.php"> <img src =../asset/logout.png>Logout</a>
    </div>
    
    <div class="chore-container">
        <h2>Ongoing/Pending Chore Assignments</h2>
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
                    <td>Mow </td>
                    <td>Claire NAHIMANA</td>
                    <td>2024-02-01</td>
                    <td>2024-02-15</td>
                    <td>Pending</td>
                    <td><button class="action-button" onclick="markAsCompleted()">Mark as Completed</button></td>
                </tr>
                <tr>
                    <td>Wash Dishes</td>
                    <td>Jane KAburayo</td>
                    <td>2024-02-03</td>
                    <td>2024-02-10</td>
                    <td>In Progress</td>
                    <td><button class="action-button" onclick="markAsCompleted()">Mark as Completed</button></td>
                </tr>
            </tbody>
        </table>

        <h2 class="completed-chore-table">Completed Chores</h2>
        <table class="completed-chore-table">
            <thead>
                <tr>
                    <th>Chore Name</th>
                    <th>Assigned By</th>
                    <th>Date Assigned</th>
                    <th>Date Due</th>
                    <th>Chore Status</th>
                </tr>
            </thead>
            <tbody>
               
                <tr>
                    <td>Washing clothes</td>
                    <td>Steve Nsabimana</td>
                    <td>2024-01-25</td>
                    <td>2024-02-05</td>
                    <td>Completed</td>
                </tr>
                <tr>
                    <td>Clean Windows</td>
                    <td> Williams Hatungima</td>
                    <td>2024-01-30</td>
                    <td>2024-02-10</td>
                    <td>Complseted</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        function markAsCompleted() {

            alert(' marked as completed!');
        }
    </script>
</body>
</html>