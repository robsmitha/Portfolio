<?php include_once ("classes.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-110090520-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-110090520-1');
    </script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Rob Smitha is a web applications developer in Tallahassee, FL." />
    <meta name="keywords" content="Web Development, Programming, Software development, Bootstrap 4 Website" />
    <meta name="author" content="Rob Smitha" />

    <title>Rob Smitha</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendor/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/resume.min.css" rel="stylesheet">
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .bg-primary {
            background: #343a40!important;
        }
        body{
            padding-top: 0;
        }
        /*
        .text-primary {
            color: #782F40!important;
        }
        .btn-primary {
            background-color: #782F40!important;
            border-color: #782F40!important;
        }
        */
    </style>
</head>

<body id="page-top">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Rob Smitha</span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/robsmitha.png" alt="">
        </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        MENU <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#experience">Experience</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#education">Education</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#skills">Skills</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#interests">Portfolio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid p-0 bg-light">

    <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
            <h1 class="mb-0">Rob
                <span class="text-primary">Smitha</span>
            </h1>
            <div class="subheading mb-4">680 W. Virginia Street · Tallahassee, FL 32304 · (727) 432-3457 ·
                <a href="contact.php">rws15@my.fsu.edu</a>
            </div>
            <p>
                Full Stack Developer here to help you win new clients and stand up web applications FAST.
            </p>
            <div id="divAlertMsg" class="alert alert-primary d-none" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <b id="lblAlertMsg"></b>
                <a href="#" onclick="location.reload();">
                    <i class="fa fa-refresh"></i></a>
            </div>

            <div id="divSubscriberForm">
                <!--email section-->
                <label>I'm always <i class="fa fa-building" data-toggle="tooltip" data-placement="top" title="building"></i> new projects.
                    <br><small>&nbsp;Sign up for launch updates below. <i class="icon-question" data-toggle="tooltip" data-placement="top" title="This is NOT spam"></i></small></label>
                <div class="form-inline">
                    <label class="sr-only" for="emailAddress">Email Address</label>
                    <input type="email" class="form-control mb-2 mr-sm-2" name="emailAddress" id="emailAddress" placeholder="Example@email.com" required>
                    <a href="#" id="SignUp" name="SignUp" class="btn btn-outline-primary mb-2" onclick="if(doValidation(this.id)) $(this).addClass('d-none');">Subscribe</a>
                    <a href="#" id="Clear" name="Clear" class="btn btn-outline-danger mb-2 d-none" onclick="if(doValidation(this.id)) $(this).addClass('d-none');">Clear</a>
                </div>
                <!--validate against bot-->
                <div id="divBotValidator" class="d-none">
                    <label for="form_message">What is <span id="lblA1"></span> + <span id="lblA2"></span>?</label>
                    <div class="form-inline">
                        <input id="validationQuestion" type="number" class="form-control mb-2 mr-sm-2" placeholder="Prove you're not a robot *" required>

                        <a href="#" id="Validate" name="Validate" class="btn btn-outline-primary mb-2" onclick="doValidation(this.id)">Verify</a>
                    </div>
                </div>
            </div>
            <!--
            <a class="btn btn-dark btn-lg" href="about.php">Learn More</a>
            <a class="btn btn-dark btn-lg" href="contact.php">Contact Me</a>
            -->
            <br>
            <ul class="list-inline list-social-icons mb-0">
                <li class="list-inline-item">
                    <a href="https://www.facebook.com/rob.smitha">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                </span>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="https://www.instagram.com/Rob.Smitha/">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                </span>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="https://www.linkedin.com/in/robsmitha">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                </span>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="https://github.com/robsmitha/">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                </span>
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="experience">
        <div class="my-auto">
            <h2 class="mb-5">Experience</h2>

            <div class="resume-item d-flex flex-column flex-md-row mb-5">
                <div class="resume-content mr-auto">
                    <h3 class="mb-0">President</h3>
                    <div class="subheading mb-3"><a href="http://webmediaconcepts.com/">Web Media Concepts</a></div>
                    <p>
                        Web Media Concepts is a contemporary web design company in Tallahassee, Florida. Our company keeps up with the latest web design trends to deliver modern and professional websites for companies of all sizes. We know getting your website designed or redesigned within the constraints of a large web design firm can be a huge hassle when you have a business to run. Web Media Concepts eliminates the stress of getting a new website by treating you like a human being, and not a project deadline.                    </p>
                </div>
                <div class="resume-date text-md-right">
                    <span class="text-primary">October 2016 - Present</span>
                </div>
            </div>

            <div class="resume-item d-flex flex-column flex-md-row mb-5">
                <div class="resume-content mr-auto">
                    <h3 class="mb-0">Web Developer</h3>
                    <div class="subheading mb-3"><a href="http://www.brandtinfo.com/">Brandt Information Services</a></div>
                    <p>
                        Brandt offers local, state, and federal organizations innovative solutions to make technology work smarter for our customers. We provide Fish & Wildlife and Parks agencies creative solutions to increase outdoors participation and agency revenue streams while leveraging innovative marketing and outreach approaches.
                        <br>
                        At Brandt, Rob is a key contributor to the user interface design of large scale web applications used by millions of customers both commerical and recreational.
                    </p>
                </div>
                <div class="resume-date text-md-right">
                    <span class="text-primary">Febuary 2017 - Present</span>
                </div>
            </div>

        </div>

    </section>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="education">
        <div class="my-auto">
            <h2 class="mb-5">Education</h2>

            <div class="resume-item d-flex flex-column flex-md-row mb-5">
                <div class="resume-content mr-auto">
                    <h3 class="mb-0">Florida State University</h3>
                    <div class="subheading mb-3">Bachelor of Arts</div>
                    <div>Computer Science</div>
                </div>
                <div class="resume-date text-md-right">
                    <span class="text-primary">August 2016 - present</span>
                </div>
            </div>
            <div class="resume-item d-flex flex-column flex-md-row mb-5">
                <div class="resume-content mr-auto">
                    <h3 class="mb-0">Tallahassee Community College</h3>
                    <div class="subheading mb-3">Associates in Arts</div>
                </div>
                <div class="resume-date text-md-right">
                    <span class="text-primary">August 2014 - December 2015</span>
                </div>
            </div> <div class="resume-item d-flex flex-column flex-md-row mb-5">
                <div class="resume-content mr-auto">
                    <h3 class="mb-0">East Lake High School</h3>
                    <div class="subheading mb-3">High School Diploma</div>
                </div>
                <div class="resume-date text-md-right">
                    <span class="text-primary">August 2009 - June 2013</span>
                </div>
            </div>
    </section>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="skills">
        <div class="my-auto">
            <h2 class="mb-5">Skills</h2>

            <div class="subheading mb-3">Programming Languages &amp; Tools</div>
            <ul class="list-inline list-icons">
                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="HTML5">
                    <i class="devicons devicons-html5"></i>
                </li>
                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="CSS3">
                    <i class="devicons devicons-css3"></i>
                </li>
                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Javascript">
                    <i class="devicons devicons-javascript"></i>
                </li>
                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="jQuery">
                    <i class="devicons devicons-jquery"></i>
                </li>
                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Github">
                    <i class="devicons devicons-github"></i>
                </li>
                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Ubuntu">
                    <i class="devicons devicons-ubuntu"></i>
                </li>
                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Visual Studio">
                    <i class="devicons devicons-visualstudio"></i>
                </li>
                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title=".NET">
                    <i class="devicons devicons-dotnet"></i>
                </li>
                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="IntelliJ">
                    <i class="devicons devicons-intellij"></i>
                </li>
                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="MailChimp">
                    <i class="devicons devicons-mailchimp"></i>
                </li>
                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Terminal">
                    <i class="devicons devicons-terminal"></i>
                </li>
                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Microsoft SQL Server">
                    <i class="devicons devicons-msql_server"></i>
                </li>
                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Bootstrap">
                    <i class="devicons devicons-bootstrap"></i>
                </li>
                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="WordPress">
                    <i class="devicons devicons-wordpress"></i>
                </li>
                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="PHP">
                    <i class="devicons devicons-php"></i>
                </li>
                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Linux">
                    <i class="devicons devicons-linux"></i>
                </li>
                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="MySQL">
                    <i class="devicons devicons-mysql"></i>
                </li>
            </ul>

            <div class="subheading mb-3">Workflow</div>
            <ul class="fa-ul mb-0">
                <li>
                    <i class="fa-li fa fa-check"></i>
                    Mobile-First, Responsive Design</li>
                <li>
                    <i class="fa-li fa fa-check"></i>
                    Rapid Application Development</li>
                <li>
                    <i class="fa-li fa fa-check"></i>
                    RFP Responses & Demos</li>
                <li>
                    <i class="fa-li fa fa-check"></i>
                    Agile Development &amp; Scrum</li>
                <li>
                    <i class="fa-li fa fa-check"></i>
                    User Interface Design</li>
                <li>
                    <i class="fa-li fa fa-check"></i>
                    Cross Browser Testing &amp; Debugging</li>
            </ul>
        </div>
    </section>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="interests">
        <div class="my-auto">
            <h2 class="mb-5">Portfolio</h2>
            <div class="row">
                <?php
                $portfolioItemList = Portfolioitem::loadall();
                if(!empty($portfolioItemList)){
                    foreach ($portfolioItemList as $portfolioitem){
                        ?>

                        <div class="col-lg-4 col-md-4 col-sm-6 portfolio-item mt-2">
                            <div class="card h-100">
                                <a href="portfolio-item.php?id=<?php echo $portfolioitem->getId() ?>"><img class="card-img-top" src="<?php echo $portfolioitem->getImageUrl() ?>" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="portfolio-item.php?id=<?php echo $portfolioitem->getId() ?>"><?php echo $portfolioitem->getName() ?></a>
                                    </h4>
                                    <p class="card-text"><?php echo nl2br(substr($portfolioitem->getDescription(), 0, 300)) ?>...</p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="contact">
        <div class="my-auto">
            <h2 class="mb-5">Contact</h2>
            <div class="row mb-5">
                <div class="col-md-8">
                    <div class="subheading mb-3">You made it this far, might as well send me a message.</div>
                    <form name="contactForm" id="contactForm" method="post">
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
                        <div id="divDanger" class="d-none"><div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong>Please review your entries. </strong></div></div>
                        <div id="divSuccess" class="d-none"><div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong>Your message has been sent. </strong></div></div>
                        <!-- For success/fail messages
                        <button type="submit" class="btn btn-primary">Send Message</button>-->
                        <a href="#contact" onclick="sendContactEmail();" class="btn btn-primary mb-3">Send Message</a>
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
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
    <?php include_once ("footer.php"); ?>
</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/resume.min.js"></script>
<script>
    //Document Ready Function for page
    $( document ).ready(function() {
        //generate random numbers for form validation
        randomnum1 = Math.floor((Math.random() * 10) + 1);
        randomnum2 = Math.floor((Math.random() * 10) + 1);
        $("#lblA1").text(randomnum1);   //assign numbers to labels
        $("#lblA2").text(randomnum2);

        $("#emailAddress").on('keyup', function (e) {
            //if user hits enter on email sign up input
            if (e.keyCode == 13) {
                //enter key
                doValidation("SignUp");
            }
        });
        $("#validationQuestion").on('keyup', function (e) {
            //if user hits enter on validation question
            if (e.keyCode == 13) {
                doValidation("Validate");
            }
        });
    });

    function validateEmail(email) {
        //checks if email input is valid format
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email.toLowerCase());
    }

    function doValidation(cmd){
        cmd = cmd.toUpperCase();
        switch (cmd){
            case "SIGNUP":
                var emailaddress = $("#emailAddress").val();

                if(emailaddress.length > 0){
                    if(validateEmail(emailaddress)){
                        //valid email address was entered
                        $("#SignUp").addClass("d-none");
                        $("#Clear").removeClass("d-none");
                        $("#emailAddress").addClass("is-valid");
                        $("#emailAddress").prop("disabled", true);  //disable email so we have this email value locked in
                        $('#divBotValidator').removeClass('d-none');    //show random number validation question
                    }
                    else{
                        $("#emailAddress").addClass("is-invalid");
                        return false;
                    }
                }
                else{
                    $("#emailAddress").addClass("is-invalid");
                    return false;
                }
                return true;
            case "VALIDATE":
                var validationAnswer = $("#validationQuestion").val();  //capture solution entered by user
                var validationSolution = randomnum1 + randomnum2;       //calculate solution by random generated numbers
                if(validationAnswer == validationSolution){
                    //solution entered by user was correct
                    $("#divSubscriberForm").addClass("d-none"); //remove subscriber form

                    //call AJAX function to add subscriber to db
                    addSubscriber($("#emailAddress").val());

                    return true;
                }
                $("#validationQuestion").addClass("is-invalid");
                return false;
            case "CLEAR":
                //provides a way for the user to clear and re-enter email
                $("#emailAddress").val(''); //clear email value
                $("#SignUp").removeClass("d-none"); //show
                $("#Clear").addClass("d-none");     //hide
                $("#emailAddress").removeClass("is-valid");
                $("#emailAddress").prop("disabled", false);  //enable email field
                $('#divBotValidator').addClass('d-none');    //hide random number validation
                return true;
        }

    }
    function addSubscriber(email){
        $.ajax({
            type: 'POST',
            url: 'AJAX/addSubscriber.php',
            data: {
                'email': email
            },
            success: function(msg){
                if(msg === ""){
                    alert("Posting failed.");
                }
                else{
                    $("#divAlertMsg").removeClass("d-none");    //show success message
                    $("#lblAlertMsg").html(msg);
                }

            }
        });
        return false;
    }
    function sendContactEmail(){
        var returnValue = true;
        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var message = $("#message").val();
        if(name.length > 0){
            $("#name").addClass("is-valid");
        }
        else {
            $("#name").addClass("is-invalid");
            returnValue = false;
        }
        if(email.length > 0){
            $("#email").addClass("is-valid");
        }
        else {
            $("#email").addClass("is-invalid");
            returnValue = false;
        }
        if(message.length > 0){
            $("#message").addClass("is-valid");
        }
        else {
            $("#message").addClass("is-invalid");
            returnValue = false;
        }
        if(returnValue){
            $.ajax({
                type: 'POST',
                url: 'sendContactEmail.php',
                data: {
                    'name': name,
                    'email': email,
                    'phone': phone,
                    'message': message
                },
                success: function(msg){
                    if(msg.toUpperCase() === "SUCCESS"){
                        $("#name").addClass("is-valid");
                        $("#email").addClass("is-valid");
                        $("#message").addClass("is-valid");
                        $("#divSuccess").removeClass("d-none");
                        $("#divDanger").addClass("d-none");
                    }
                    else{
                        $("#divSuccess").addClass("d-none");
                        $("#divDanger").removeClass("d-none");
                    }

                }
            });
        }
        else{
            $("#divDanger").removeClass("d-none");
        }

    }
</script>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
</body>

</html>
