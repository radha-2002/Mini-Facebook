<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT users.username, images.image_url, COUNT(likes.user_id) AS like_count
        FROM images
        INNER JOIN users ON images.user_id = users.id
        LEFT JOIN likes ON images.id = likes.image_id
        GROUP BY images.id
        ORDER BY like_count DESC
        LIMIT 3";
$result = mysqli_query($conn, $sql);


echo '<table>';
echo '<tr><th>Username</th><th>Image</th><th>Likes</th></tr>';

while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($row['username']) . '</td>';
    echo '<td><img src="' . htmlspecialchars($row['image_url']) . '"></td>';
    echo '<td>' . htmlspecialchars($row['like_count']) . '</td>';
    echo '</tr>';
}

echo '</table>';

mysqli_close($conn);
?>
