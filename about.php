<?php
include_once ("classes.php");
?>
<!DOCTYPE html>
<html lang="en">

<?php include "head.php" ?>

<body>
<!--navigation bar-->
<?php include "navbar.php"; ?>
<div class="content-wrapper">
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-sm-6 mb-1 mt-3">
            <img class="rounded img-fluid d-block mx-auto img-thumbnail" style="width: 200px;" src="img/robsmitha.png" alt="">
            <br>
            <h3 class="text-center">Rob Smitha
                <small>Web Developer</small>
            </h3>
            <br>
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
        <div class="col-lg-8 col-sm-6 mb-1">
            <h4 class="text-white">About</h4>
            <p class="text-dark lead">
                Rob Smitha is a web applications developer in Tallahassee, Florida. Rob has developed a variety of application interfaces and works as a web developer at prominent company called Brandt Information Services.
                At Brandt, Rob is a key contributor to the user interface design of large scale projects used by millions of customers both commercial and recreational.
            </p>
            <a class="btn btn-primary btn-lg" href="portfolio-1-col.php">View Portfolio</a>
            <br>
            <div class="my-auto text-center">
                <h4 class="subheading mb-3">Programming Languages &amp; Tools</h4>
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
            </div>
        </div>
    </div>
    <hr style="width: 15%;">
    <div class="row">
        <div class="col-12">
            <?php
            //$SliderList = Portfolioitem::loadall();
            //include "portfolio-slider.php"
            ?>
        </div>
    </div>
</div>


<?php include "footer.php" ?>
</div> <!-- /content-wrapper -->
<?php include "modal.php" ?>
<!-- Optional JavaScript -->

<?php include "scripts.php" ?>
<script>
    //javascript to prevent alphabetic & special chars input into task id search
    var isShift = false;
    function keyUP(keyCode) {

        if (keyCode == 16)
            isShift = false;
    }
    function isNumeric(keyCode) {
        if (keyCode == 16)
            isShift = true;

        var isValidInput = ((keyCode >= 48 && keyCode <= 57 || keyCode == 8 ||
            (keyCode >= 96 && keyCode <= 105) || keyCode == 13) && isShift == false);
        if (!isValidInput)
        {
            $('#divValidateInput').removeClass('is-valid');	//change color of input
            $('#divValidateInput').addClass('is-invalid');
        }
        else {
            $('#divValidateInput').removeClass('is-invalid');
            $('#divValidateInput').addClass('is-valid');
        }
        return isValidInput;
    }
    //JavaScript to work the "Hello, World" text
    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }
    $(document).ready(function() {
        $("#btnSubmit").click(function(){
            name = $("#txtSearch").val();
            if(name == "")
                name = "World";
            $("#lblQuestion").text("Hello, " + capitalizeFirstLetter(name) + "!");
        });
    });
    $(document).keypress(function(e) {
        if(e.which == 13) {
            name = $("#txtSearch").val();
            if(name == "")
                name = "World";
            $("#lblQuestion").text("Hello, " + capitalizeFirstLetter(name) + "!");
        }
    });

</script>
</body>
</html>