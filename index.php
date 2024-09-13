<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Example with PHP & MySQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">CRUD Example with PHP & MySQL</h2>

        <!-- Form Create -->
        <div class="card mt-4">
            <div class="card-header">
                <h5>Add New Item</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="actions/create.php">
                    <div class="mb-3">
                        <label for="name" class="form-label">Item Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" required>
                    </div>
                    <button type="submit" name="create" class="btn btn-primary">Add Item</button>
                </form>
            </div>
        </div>

        <!-- Table Read -->
        <div class="card mt-4">
            <div class="card-header">
                <h5>Item List</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include 'read.php'; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Form Update (Tampil saat klik tombol edit) -->
        <?php if (isset($_GET['edit'])):
            $id = $_GET['edit'];
            $result = $conn->query("SELECT * FROM items WHERE id=$id");
            $row = $result->fetch_assoc();
        ?>
        <div class="card mt-4">
            <div class="card-header">
                <h5>Edit Item</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="actions/update.php">
                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">Item Name</label>
                        <input type="text" class="form-control" name="name" value="<?= $row['name']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" value="<?= $row['description']; ?>" required>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">Update Item</button>
                </form>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
