<nav class="navbar navbar-expand navbar-dark bg-dark">
    <div class="container">
        <a href="dashboard.php" class="navbar-brand">
            <h1 class="h3">The Company</h1>
        </a>
        <div class="ms-auto">
            <!-- [SHORTCUT] ul.navbar-nav>(li.nav-item>a.nav-link)*2 -->
            <ul class="navbar-nav">
                <li class="nav-item"><a href="#" class="nav-link">Hello <?= $_SESSION['username'] ?></a></li>
                <li class="nav-item"><a href="../actions/logout.php" class="nav-link text-danger">Log out</a></li>
            </ul>
        </div>
    </div>
</nav>