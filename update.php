<?php
include 'db.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    
    $sql = "UPDATE items SET name='$name', description='$description' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?msg=updated");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>
