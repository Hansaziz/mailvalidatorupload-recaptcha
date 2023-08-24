<!-- 
    Before Update
    <?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "file_upload_db";

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT email, filename, uploaded_at FROM uploads";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Email</th><th>Filename</th><th>Uploaded At</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["email"] . "</td><td>" . $row["filename"] . "</td><td>" . $row["uploaded_at"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}

$conn->close();

?> -->

<!-- AFTER UPDATE -->
<!DOCTYPE html>
<html>
<head>
    <title>View Data</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: auto;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit;
    }
    $userRole = $_SESSION['user']; // Replace with actual role retrieval

    if ($userRole !== "userA") {
        echo "You don't have permission to view this page.";
        exit;
    }

    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "file_upload_db";

    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT email, filename, uploaded_at FROM uploads";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>Email</th><th>Filename</th><th>Uploaded At</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["email"] . "</td><td>" . $row["filename"] . "</td><td>" . $row["uploaded_at"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";
    }

    $conn->close();
    ?>
</body>
</html>