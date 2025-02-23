<nav style = "background-image: linear-gradient(to right <?php echo $gradientColors; ?>" class="navbar justify-content-between navbar-expand-lg p-0 border-bottom border-dark <?php echo $fontColoring; ?>" data-bs-theme="dark">
    <div class = "nav-item <?php if($page_type =="homepage") echo "current"; ?> p-2">
        <a class="navbar-brand NavHeader p-0" href="/">Haarlem Festival</a>
    </div>
    <ul class = "navbar-nav flex-row ">
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
        
        <li class="nav-item dropdown p-2">
            <a class="nav-link dropdown-toggle p-0" href="#" role="button" data-bs-toggle="dropdown"  aria-expanded="false">
                <img src="assets/images/english.png" class="flag" >
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="#"><img src="assets/images/english.png" class="flag" ></a>
                <a class="dropdown-item" href="#">B</a>
                <a class="dropdown-item" href="#">C</a>
                <a class="dropdown-item" href="#">D</a>
            </div>
        </li>
    </ul>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>