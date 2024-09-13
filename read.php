<?php
include 'db.php';

$result = $conn->query("SELECT * FROM items");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td>";
        echo "<a href='index.php?edit=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a>";
        echo " <a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No items found</td></tr>";
}
?>
