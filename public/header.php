<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="home.php"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;&nbsp;SafeFarm Insurance</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "home.php") ? "active" : ""; ?>" href="home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "customers.php") ? "active" : ""; ?>" href="customers.php">Customers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "waitingList.php") ? "active" : ""; ?>" href="waitingList.php">Waiting List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "reports.php") ? "active" : ""; ?>" href="reports.php">Submit Report</a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
                    <i class="fas fa-user-cog"></i>&nbsp;Hi! <?= $currentFirstName; ?>
                </a>
                <div class="dropdown-menu">
                    <a href="../views/login.php" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
                </div>
            </li>
        </ul>
    </div>
    </nav>