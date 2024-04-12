<link rel="stylesheet" href="../common/styles.css">
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<nav>
    <div class="logo" id="logo">
        <a href="../homePage/index.php" class="logo">AutoPark Smart Explorer</a>
    </div>
    <div class="nav-links" id="navLinks">
        <span class="material-symbols-outlined" onclick="hideMenu()">
            close
        </span>

        <ul>
            <li><a href="../homePage/index.php">Home</a></li>
            <li><a href="../csvExplorer/index.php">CSV Explorer</a></li>
            <li><a href="../about/about.php">About</a></li>
        </ul>
    </div>
    <span class="material-symbols-outlined" onclick="showMenu()">
        menu
    </span>
</nav>
<script>
    var navLinks = document.getElementById("navLinks");

    function showMenu() {
        navLinks.style.right = "0";
    }

    function hideMenu() {
        navLinks.style.right = "-200px";
    }
</script>