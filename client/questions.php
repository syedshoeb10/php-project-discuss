<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <div class="row"> <!-- ✅ row wrapper -->

        <!-- LEFT SIDE : QUESTIONS -->
        <div class="col-md-6">
            <h1 class="heading mb-4">Questions</h1>

            <?php
            include __DIR__ . '/../common/database.php';

            $cid = null;

            if (isset($_GET['c-id']) && is_numeric($_GET['c-id'])) {
                $cid = (int) $_GET['c-id'];
                $query = "SELECT * FROM questions WHERE category_id = $cid";
            } else if (isset($_GET['u-id'])) {
                $query = "SELECT * FROM questions WHERE user_id = $uid";
            } else if (isset($_GET['latest'])) {
                $query = "SELECT * FROM questions order by id desc";
            } else if (isset($_GET['search'])) {
                $query = "SELECT * FROM questions where `title` like '%$search%'";
            } else {
                $query = "SELECT * FROM questions";
            }

            $result = $conn->query($query);
            ?>

            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Question Title</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result && $result->num_rows > 0) {
                        $i = 1;
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['id'];
                    ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td>
                                    <a href="?q-id=<?= $id; ?>">
                                        <?= htmlspecialchars($row['title']); ?>
                                    </a>
                                </td>
                                <td>
                                    <?php if (isset($_SESSION['user']) && $_SESSION['user']['id'] == $row['user_id']): ?>
                                        <a href="/discuss/server/requests.php?delete=<?= $id; ?>"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this question?');">
                                            Delete
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>

                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="3" class="text-center text-muted">
                                No questions found
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- RIGHT SIDE : CATEGORIES -->

        <div class="col-md-4">
            <h5 class="mb-3">Categories</h5>
            <?php include './client/categorylist.php'; ?>
        </div>

    </div>
</div>