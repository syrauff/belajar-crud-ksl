<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM items WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: /index.php?msg=deleted");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
