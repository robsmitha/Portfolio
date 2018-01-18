<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">Rob Smitha</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            MENU <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <!--<ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="portfolio-1-col.php">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blog-home.php">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>-->
            <ul class="navbar-nav ml-auto">
                <?php if(SessionManager::getSecurityUserId() > 0 ) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="admin-home.php">Administration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <?php
                }else if(SessionManager::getCustomerId() > 0){  //customer is logged in
                    ?>
                    <!--
                    <li class="nav-item">
                        <a class="nav-link" href="online-cart.php"><i class="icon-basket"></i> Cart
                            <span id="cartCounter" class="badge badge-pill badge-primary">
                                <?php
                                $foundcart = Cart::loadbycustomerid(SessionManager::getCustomerId());
                                $totalcartcount = 0;
                                if($foundcart != null){
                                    //use this cart id for item;
                                    $cartid = $foundcart->getId();
                                    $totalcartcount = Onlinecart::getcartcount($cartid);
                                }
                                echo $totalcartcount;
                                ?>
                            </span>
                        </a>
                    </li>
                    -->
                    <li class="nav-item">
                        <a class="nav-link" href="customer-profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <?php
                }
                else{   //nobody logged in
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create-customer.php">Register</a>
                    </li>
                    <?php
                }
                ?>

            </ul>
        </div>
    </div>
</nav>