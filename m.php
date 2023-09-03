<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "radha";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT username, image, l
        FROM img2
        ORDER BY l DESC
        LIMIT 3";
$result = mysqli_query($conn, $sql);

echo '<table border=1 style="width:100%;">';
echo '<tr><th>Username</th><th>Image</th><th>Likes</th></tr>';

while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($row['username']) . '</td>';
    echo '<td><img style="width:150px;height:150px;"src="upload/' . htmlspecialchars($row['image']) . '"></td>';
    echo '<td>' . htmlspecialchars($row['l']) . '</td>';
    echo '</tr>';
}

echo '</table>';

mysqli_close($conn);
?>
