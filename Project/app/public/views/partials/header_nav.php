<nav class="navbar justify-content-between navbar-expand-lg p-0 border-bottom border-dark <?php echo $fontColoring; ?> <?php  echo $page_type; ?>" data-bs-theme="dark">
    <div class = "nav-item h-100 <?php if($page_type =="homepage") echo "current"; ?> p-2">
        <img src="assets/favicons/logo.png" class="image-fluid h-100">
        <a class="align-middle navbar-brand NavHeader p-0" href="/">Haarlem Festival</a>
    </div>
    <ul class = "navbar-nav flex-row h-100">
        <li class = " nav-item   <?php if($page_type =="yummy") echo "current"; ?> p-2 h-100">
            <a class="d-flex nav-link NavHeader p-0 h-100" href="/yummy">
                <img src="assets/favicons/yummy.png" class="image-fluid align-self-center favicon"><div class="align-self-center">Food</div>
            </a>
        </li>
        <li class = "nav-item <?php if($page_type =="history") echo "current"; ?> p-2 h-100">
            <a class="d-flex  nav-link NavHeader p-0 h-100" href="#">
                <img src="assets/favicons/history.png" class="image-fluid align-self-center favicon"><div class="align-self-center">History</div>
            </a>
        </li>
        <li class = "nav-item <?php if($page_type =="magic") echo "current"; ?> p-2 h-100">
            <a class="d-flex  nav-link NavHeader p-0 h-100" href="#">
                <img src="assets/favicons/magic.png" class="image-fluid align-self-center favicon"><div class="align-self-center">Tylers Museum</div>
            </a>
        </li>
        <li class = "nav-item <?php if($page_type =="jazz") echo "current"; ?> p-2 h-100">
            <a class="d-flex nav-link NavHeader p-0 h-100" href="#">
                <img src="assets/favicons/jazz.png" class="image-fluid align-self-center favicon"><div class="align-self-center">Jazz</div>
            </a>
        </li>
        <li class = "nav-item <?php if($page_type =="stories") echo "current"; ?> p-2 h-100">
            <a class="d-flex  nav-link NavHeader p-0 h-100" href="#">
                <img src="assets/favicons/stories.png" class="image-fluid align-self-center favicon"><div class="align-self-center">Stories</div>
            </a>
        </li>
        <li class = "nav-item <?php if($page_type =="ticket") echo "current"; ?> p-2 h-100">
            <a class="d-flex  nav-link NavHeader p-0 h-100" href="#">
                <img src="assets/favicons/ticket.png" class="image-fluid align-self-center favicon"><div class="align-self-center">Tickets</div>
            </a>
        </li>
        <?php if ($loggedIn): ?>
            <li class = "nav-item  p-2 h-100">
                <a class="d-flex  nav-link NavHeader p-0 h-100" href="#">
                    <img src="assets/favicons/login.png" class="image-fluid align-self-center favicon"><div class="align-self-center">Logout</div>
                </a>
            </li>
        <?php else: ?>
            <li class = "nav-item <?php if($page_type =="login") echo "current"; ?>  p-2 h-100">
                <a class="d-flex  nav-link NavHeader p-0 h-100" href="/login">
                    <img src="assets/favicons/login.png" class="image-fluid align-self-center favicon"><div class="align-self-center">Login</div>
                </a>
            </li>
        <?php endif?>
        
        <li class="align-self-center nav-item dropdown p-2 ">
            <a class=" nav-link dropdown-toggle p-0"  role="button" data-bs-toggle="dropdown"  aria-expanded="false">
                <img src="assets/favicons/english.png" class="flag" >
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item " href="#"><img src="assets/favicons/english.png" class="flag" ></a>
                <a class="dropdown-item " href="#"><img src="assets/favicons/dutch.png" class="flag" ></a>
            </div>
        </li>
    </ul>
</nav>
