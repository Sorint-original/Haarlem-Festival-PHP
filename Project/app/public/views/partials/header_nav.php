<nav style = "background-image: linear-gradient(to right <?php echo $gradientColors; ?>" class="navbar container-fluid p-0 border-bottom border-dark <?php echo $fontColoring; ?>" data-bs-theme="dark">
    <div class = "nav-item <?php if($page_type =="homepage") echo "current"; ?> p-2">
        <a class="navbar-brand NavHeader p-0" href="/">Haarlem Festival</a>
    </div>
    <ul class = "navbar-nav flex-row">
        <li class = "nav-item <?php if($page_type =="yummy") echo "current"; ?> p-2">
            <a class="nav-link NavHeader p-0" href="#">Food</a>
        </li>
        <li class = "nav-item <?php if($page_type =="history") echo "current"; ?> p-2">
            <a class="nav-link NavHeader p-0" href="#">History</a>
        </li>
        <li class = "nav-item <?php if($page_type =="magic") echo "current"; ?> p-2">
            <a class="nav-link NavHeader p-0" href="#">Tylers Museum</a>
        </li>
        <li class = "nav-item <?php if($page_type =="jazz") echo "current"; ?> p-2">
            <a class="nav-link NavHeader p-0" href="#">Jazz</a>
        </li>
        <li class = "nav-item <?php if($page_type =="stories") echo "current"; ?> p-2">
            <a class="nav-link NavHeader p-0" href="#">Stories</a>
        </li>
        <li class = "nav-item <?php if($page_type =="ticket") echo "current"; ?> p-2">
            <a class="nav-link NavHeader p-0" href="#">Tickets</a>
        </li>
        <?php if ($loggedIn): ?>
            <li class = "nav-item  p-2">
                <a class="nav-link NavHeader p-0" href="#">Logout</a>
            </li>
        <?php else: ?>
            <li class = "nav-item <?php if($page_type =="login") echo "current"; ?>  p-2">
                <a class="nav-link NavHeader p-0" href="#">Login</a>
            </li>
        <?php endif?>
    </ul>
</nav>
