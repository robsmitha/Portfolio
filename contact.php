<?php include "classes.php" ?>
<?php
/**
 * Author: Jacob Mills
 * Date: 10/31/2017
 * Description: This page is intended to provide contact information to users so that they can ask questions, inform us of issues, or provide other feedback regarding our software and services.
 */



$errors = "";
$mailSent = false;

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check for empty fields
    if(empty($_POST['name'])      ||
        empty($_POST['email'])     ||
        empty($_POST['phone'])     ||
        empty($_POST['message'])   ||
        !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
    {
        $errors = "Please complete all required fields to send an email.";
        return false;
    }
    else{
        $name = strip_tags(htmlspecialchars($_POST['name']));
        $email_address = strip_tags(htmlspecialchars($_POST['email']));
        $phone = strip_tags(htmlspecialchars($_POST['phone']));
        $message = strip_tags(htmlspecialchars($_POST['message']));

        // Create the email and send the message
        $email_subject = "Website Contact Form:  $name";
        $email_body = "You have received a new message from your website contact form.<br/><br/>"."Here are the details:<br/><br/>Name: $name<br/><br/>Email: $email_address<br/><br/>Phone: $phone<br/><br/>Message:<br/>$message";
        if($name != "" && $email_address != "" && $message != ""){
            $mailSent = true;
            Mailer::sendContactEmail($email_address,$email_subject,$email_body);
        }
        else{
            $mailSent = false;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include "head.php" ?>

  <body class="bg-light">

    <!-- Navigation -->
    <?php include "navbar.php" ?>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Contact</h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Contact</li>
      </ol>

      <!-- Content Row -->
      <div class="row">
        <!-- Map Column -->
        <div class="col-lg-8 mb-4">
            <h3>Send me a Message</h3>
            <form name="contactForm" id="contactForm" method="post">
                <?php if ($errors != ""){
                    echo "<div id=\"failure\"><div class=\"alert alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button><strong>" . $errors . "</strong></div></div>";
                }
                ?>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Full Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required
                               data-validation-required-message="Please enter your name.">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Phone Number:</label><small> (optional)</small>
                        <input type="tel" class="form-control" id="phone" name="phone">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Email Address:</label>
                        <input type="email" class="form-control" id="email" name="email" required
                               data-validation-required-message="Please enter your email address.">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Message:</label>
                        <textarea rows="10" cols="100" class="form-control" id="message" name="message" required
                                  data-validation-required-message="Please enter your message" maxlength="999"
                                  style="resize:none"></textarea>
                    </div>
                </div>
                <div id="success"></div>

                <?php if ($mailSent): ?>
                    <div id="success"><div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong>Your message has been sent. </strong></div></div>
                <?php endif ?>
                <!-- For success/fail messages -->
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
        <!-- Contact Details Column -->
        <div class="col-lg-4 mb-4">
          <h3>Contact Details</h3>
          <p>
            <abbr title="Phone">P</abbr>: (727) 432-3457
          </p>
          <p>
            <abbr title="Email">E</abbr>:
            <a href="mailto:rws15@my.fsu.edu">rws15@my.fsu.edu</a>
          </p>
            <p>Do you have questions about me or my services? Send me an email! I would be happy to address any inquiries, issues, or feedback that you may have.</p>
            <p>Email: <a href="mailto:rws15@my.fsu.edu">rws15@my.fsu.edu</a></p>
            <p>You can also contact me by using the form on this page.</p>
        </div>
      </div>
      <!-- /.row -->

      <!-- Contact Form -->
      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <!-- Content Row -->
        <div class="row d-none">
            <!-- Contact Form -->
            <div class="col-lg-8 mb-4">
                <!-- Embedded Google Map -->
                <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>
            </div>
            <!-- Contact Details Column -->
            <div class="col-lg-4 mb-4">
                <br/><br/><br/>
                <p>Do you have questions about our services or software? Send us an email! We would be happy to address any inquiries, issues, or feedback that you may have.</p>
                <p>Email: <a href="mailto:wmcmailer@gmail.com">wmcmailer@gmail.com</a></p>
                <p>You can also contact us by using the form on this page.</p>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include "footer.php" ?>

    <!-- Bootstrap core JavaScript -->
    <?php include "scripts.php" ?>

    <!-- Contact form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <!--<script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>-->

  </body>

</html>
