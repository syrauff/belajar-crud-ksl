<?php
include 'db.php';

if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    
    $sql = "INSERT INTO items (name, description) VALUES ('$name', '$description')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?msg=created");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
