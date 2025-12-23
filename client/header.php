<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="./">
            <img src="./public/logo.png" alt="">
        </a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link" href="./">Home</a>
                </li>

                <?php if (isset($_SESSION['user'])): ?>
                    <li class="nav-item">
                        <a class="nav-link">
                            Welcome, <?= htmlspecialchars($_SESSION['user']['name']) ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/discuss/client/logout.php">Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?u-id=<?php echo $_SESSION['user']['id']; ?>">My question</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/discuss/client/ask.php">Ask a question</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/discuss/client/login.php">Login</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?latest=true">Latest Questions</a>
                </li>
            </ul>
            <form class="d-flex" action="">
                <input class="form-control me-2" type="search question" name="search" placeholder="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>