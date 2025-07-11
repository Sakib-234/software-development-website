<?php
session_start();
$username = $_SESSION['username'];

if (!isset($username)) {
    header('location:index.php');
}

if (isset($_GET['logout'])) {
    unset($username);
    session_destroy();
    header('location:index.php');
}

?>

<?php
include 'config.php';


if (isset($_POST['deletebtn'])) {
    $selectedId = $_POST['selectedId'];
    $sql = "DELETE FROM reservation WHERE id = $selectedId";
    mysqli_query($conn, $sql);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="approval.css">
</head>
<body>
    <div class="contaner">
        <div class="navbar item">
            
            <h1>User List</h1>
            
        </div>
        <div class="content item">
            <table>
                <thead>
                    <tr>
                        <th>User No.</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Problem</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    include 'config.php';

                    $sql = "SELECT * FROM reservation";
                    
                    $result = mysqli_query($conn,$sql);
                    $no=1;
                    while($row=mysqli_fetch_assoc($result))
                    {
                        echo '<tr>
                        <td>'.$no.'</td>
                        <td>'.$row['name'].'</td>
                        <td>'.$row['phone'].'</td>
                        <td>'.$row['email'].'</td>
                        <td>'.$row['address'].'</td>
                        <td>'.$row['problem'].'</td>
                        
                    </tr>';
                    $no++;
                    }
                    
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="text-right">
      </div>

    <!-- div style="width: 8%; /* Adjust width as needed */
    margin: 50px auto;">
        <button onclick="window.print();" class="edit box" id="print-btn;" style="text-align: center;width: 167px ;border-radius: 22px;
    background: #e9edf5; border: 2px solid #000; padding: 20px; box-sizing: border-box;">Print</button>
    </div -->

    <script>
        function confirmDelete(name) {
            return confirm("Are you sure you want to delete user " + name + "?");
        }
        window.print();
    </script>

</body>
</html>