<?php
include __DIR__ . '/../common/database.php';

$message = "";

if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);

    if ($name == "") {
        $message = "Category name is required";
    } else {
        $stmt = $conn->prepare("INSERT INTO category (name) VALUES (?)");
        $stmt->bind_param("s", $name);

        if ($stmt->execute()) {
            $message = "Category added successfully";
        } else {
            $message = "Error adding category";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-header bg-dark text-white">
                        <h4>Add Category</h4>
                    </div>
                    <div class="card-body">

                        <?php if ($message): ?>
                            <div class="alert alert-info"><?= $message; ?></div>
                        <?php endif; ?>

                        <form method="post">
                            <div class="mb-3">
                                <label class="form-label">Category Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter category name">
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary w-100">
                                Add Category
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>