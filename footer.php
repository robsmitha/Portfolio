<?php
/**
 * Created by PhpStorm.
 * User: Rob
 * Date: 12/9/2017
 * Time: 12:32 PM
 */
?>
<!-- Footer -->
<footer class="footer text-center" id="footer">
    <div class="container">
        <?php if(SessionManager::getSecurityUserId() > 0   //Security user logged in
            && SessionManager::getCustomerId() == 0) {
            ?>
            <small>Hi, <?php echo SessionManager::getUsername(); ?> <a href="logout.php">Logout</a></small>
        <?php
        }else if(SessionManager::getCustomerId() > 0){  //customer is logged in
            ?>
            <small>Hi, <?php echo SessionManager::getFirstName(); ?> <a href="logout.php">Logout</a></small>
            <?php
        }
        else{   //nobody logged in
            ?>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="login.php">Customer</a></li>
                <li class="list-inline-item">&middot;</li>
                <li class="list-inline-item"><a href="admin-login.php">Admin</a></li>
            </ul>
        <?php
        }
        ?>
        <p class="mb-0">&copy; Rob Smitha <?php echo date("Y"); ?></p>
        <ul class="list-inline">
            <li class="list-inline-item">
                <a href="https://www.linkedin.com/in/robsmitha" target="_blank">
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="https://github.com/robsmitha/" target="_blank">
                    <i class="fa fa-github-alt" aria-hidden="true"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="https://www.facebook.com/rob.smitha" target="_blank">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="https://twitter.com/robsmitha" target="_blank">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="https://www.instagram.com/rob.smitha/" target="_blank">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="mailto:rws15@my.fsu.edu">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                </a>
            </li>
        </ul>
        <br>
    </div>
</footer>

<!-- Scroll to Top Button
<a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
    <i class="fa fa-angle-up"></i>
</a>-->