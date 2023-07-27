<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sai Hospital</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .logo {
            max-width: 100px;
            height: auto;
            border-radius: 50%;
        }
        img {
            max-width: 200px;
            height: auto;
            border-radius: 10%;
        }
        table{
            margin : auto auto;
        }
        tr,th, td {
            margin: 120px;
            padding: 30px;

        }
        .contact{
            margin-right: 1000px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="index.html" class="home">Home</a></li>
            
            <li><a href="index.html" class="home">Log-out</a></li>
            
        </ul>
        </div><br><br><br>  
        <?php
        
        


            define("DB_HOST", "localhost");
            define("DB_USER", "root");
            define("DB_PASSWORD", "");
            define("DB_DATABASE", "appointment");


            $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);


            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }



            $sql = "SELECT * FROM appointmentdetails1";
            $result = $conn->query($sql);


            $rows = array();


            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                }
            }
        ?>

        <table border="1">
            <tr>
                <th>Sr No</th>
                <th>Name</th>
                <th>Mobile Number</th>
                <th>Email</th>
                <th>Patient Name</th>
                <th>Patient Gender</th>
                <th>Patient Age</th>
                <th>Doctor</th>
                <th>Action</th>

                
            </tr>
            <?php foreach ($rows as $row): ?>
            <tr>
                <td><?php echo $row['serial_number']; ?></td>
                <td><?php echo $row['Name']; ?></td>
                <td><?php echo $row['Mobile_No']; ?></td>
                <td><?php echo $row['Email']; ?></td>
                <td><?php echo $row['Patient Name']; ?></td>
                <td><?php echo $row['Patient Gender']; ?></td>
                <td><?php echo $row['Patient Age']; ?></td>
                <td><?php echo $row['Doctor']; ?></td>
                <td><Button>Visited</Button></td>
            </tr>
            <?php endforeach; ?>
            
        </table>
    
    
</body>
</html>