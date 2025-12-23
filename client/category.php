<?php
include __DIR__ . '/../common/database.php';

$sql = "SELECT * FROM category";
$result = mysqli_query($conn, $sql);

$data = mysqli_num_rows($result) > 0
    ? mysqli_fetch_all($result, MYSQLI_ASSOC)
    : [];
?>

<select name="category_id" id="category" class="form-control" required>
    <option value="">-- Select Category --</option>

    <?php foreach ($data as $row): ?>
        <option value="<?= $row['id']; ?>">
            <?= $row['name']; ?>
        </option>
    <?php endforeach; ?>
</select>
