<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Question</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Add Question</h1>

    <form action="/discuss/server/requests.php" method="post">

        <!-- Question Title -->
        <div class="mb-3">
            <label class="form-label">Question Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <!-- Question Description -->
        <div class="mb-3">
            <label class="form-label">Question Description</label>
            <textarea name="description" class="form-control" rows="5" required></textarea>
        </div>

        <!-- Category -->
        <div class="mb-3">
            <label class="form-label">Category</label>
            <?php include __DIR__ . '/category.php'; ?>
        </div>

        <!-- Submit -->
        <button type="submit" name="ask" class="btn btn-primary">
            Post Question
        </button>

    </form>
</div>

</body>
</html>
