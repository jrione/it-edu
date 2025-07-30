<?php
$uri = service('uri');
$menu = $uri->getSegment(1);
$submenu = $uri->getSegment(2);
?>
<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container-xl">

        <!-- Hamburger button for mobile -->
        <button class="navbar-toggler border-0 p-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false"
            aria-label="Toggle navigation">
            <svg class="hamburger-icon" xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <line x1="4" y1="6" x2="20" y2="6" />
                <line x1="4" y1="12" x2="20" y2="12" />
                <line x1="4" y1="18" x2="20" y2="18" />
            </svg>
        </button>

        <!-- Navbar content -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="navbar-nav">
                <li class="nav-item <?= $menu == "dashboard" ? "active" : "" ?>">
                    <a class="nav-link d-flex items-center justify-center" href="<?= base_url("dashboard") ?>">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                            </svg>
                        </span>
                        <span class="nav-link-title">Dashboard</span>
                    </a>
                </li>

                <?php if (session()->get('isLoggedIn')) { ?>
                    <li class="nav-item <?= $menu == "artikel" && $submenu != "list-approve" ? "active" : "" ?>">
                        <a class="nav-link d-flex items-center justify-center" href="<?= base_url("artikel") ?>">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                </svg>
                            </span>
                            <span class="nav-link-title">Artikel Saya</span>
                        </a>
                    </li>
                <?php } ?>

                <?php if (session()->get('user_role') == 'admin') { ?>
                    <li class="nav-item <?= $menu == "artikel" && $submenu == "list-approve" ? "active" : "" ?>">
                        <a class="nav-link d-flex items-center justify-center" href="<?= base_url("artikel/list-approve") ?>">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                    <path d="M9 15l2 2l4 -4" />
                                </svg>
                            </span>
                            <span class="nav-link-title">Approve Artikel</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>