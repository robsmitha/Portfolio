<?php include "classes.php" ?>

<!DOCTYPE html>
<html lang="en">

<?php include "head.php" ?>

  <body>

    <!-- Navigation -->
    <?php include "navbar.php" ?>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">FAQ
        <small>We're here to help</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">FAQ</li>
      </ol>

      <div class="mb-4" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="card">
          <div class="card-header" role="tab" id="headingOne">
            <h5 class="mb-0">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">How do I get started?
                  <i class="icon-plus pull-right" onclick="$(this).toggleClass('icon-plus icon-minus')"></i>
              </a>
            </h5>
          </div>

          <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
            <div class="card-body">
                The introduction phase of our business is done online where customers can set up a meeting with a brief description about the project they would like to create. We can then schedule a face to face meeting. In this meet we break down what it will take to turn the project into reality and figure out a realistic time frame. After calculating these and other factors we come to a fair and reasonable price and ensure that each customer leaves happy and returns often.
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" role="tab" id="headingTwo">
            <h5 class="mb-0">
              <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">What kinds of businesses do you service?
                  <i class="icon-plus pull-right" onclick="$(this).toggleClass('icon-plus icon-minus')"></i>
              </a>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="card-body">
                All kinds! We've done interior design sites, sites for mobile applications, childcare sites and hospitality/entertainment websites. You name it we can provide it.
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" role="tab" id="headingThree">
            <h5 class="mb-0">
              <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Do I own my site?
                  <i class="icon-plus pull-right" onclick="$(this).toggleClass('icon-plus icon-minus')"></i>
              </a>
            </h5>
          </div>
          <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="card-body">
                You have complete ownership of this site, we designed it for the sole purpose of enhancing you business' online prosperity.
            </div>
          </div>
        </div>

          <div class="card">
              <div class="card-header" role="tab" id="headingFour">
                  <h5 class="mb-0">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Can I get a quote first?
                          <i class="icon-plus pull-right" onclick="$(this).toggleClass('icon-plus icon-minus')"></i>
                      </a>
                  </h5>
              </div>
              <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
                  <div class="card-body">
                      To give accurate estimates, we need to understand what you want to accomplish with your website. After getting to know the basics of a project, we put together a proposal outlining price and scope of project.                  </div>
              </div>
          </div>

          <div class="card">
              <div class="card-header" role="tab" id="headingFive">
                  <h5 class="mb-0">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">What's this going to cost?
                          <i class="icon-plus pull-right" onclick="$(this).toggleClass('icon-plus icon-minus')"></i>
                      </a>
                  </h5>
              </div>
              <div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingFive">
                  <div class="card-body">
                      A website's cost can vary depending on what you need to accomplish with the site. A simple static page is going to cost less than a page that need more functionality and back end work. We are a small business as well so we understand growing pains. Our service is super affordable and we will be able to give a reasonable price with many perks after a quick consultation.                  </div>
              </div>
          </div>


          <div class="card">
              <div class="card-header" role="tab" id="headingSix">
                  <h5 class="mb-0">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">How long does it take to build a site?
                          <i class="icon-plus pull-right" onclick="$(this).toggleClass('icon-plus icon-minus')"></i>
                      </a>
                  </h5>
              </div>
              <div id="collapseSix" class="collapse" role="tabpanel" aria-labelledby="headingSix">
                  <div class="card-body">
                      The duration of the site building process can vary depending on the size of the site and other factors having to do with content. A simple site can be pieced together to its final product in about 2 weeks with a couple days tacked on for testing after the initial launch.
                  </div>
              </div>
          </div>


          <div class="card">
              <div class="card-header" role="tab" id="headingSeven">
                  <h5 class="mb-0">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">How does the payment process work?
                          <i class="icon-plus pull-right" onclick="$(this).toggleClass('icon-plus icon-minus')"></i>
                      </a>
                  </h5>
              </div>
              <div id="collapseSeven" class="collapse" role="tabpanel" aria-labelledby="headingSeven">
                  <div class="card-body">
                      As stated above the pricing of each website is unique so it makes it difficult to establish a default payment plan or an hourly rate. This is why we have such a genuine client engagement process to make sure both sides come to agreeable terms. We recommenced a pay by project rate opposed to an hourly rate to avoid any sense of sticker shock. With the pay by project rate we establish exactly what will be included in the project and come to a fair and reasonable price.
                  </div>
              </div>
          </div>


          <div class="card">
              <div class="card-header" role="tab" id="headingEight">
                  <h5 class="mb-0">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">What if I don't have much content?
                        <i class="icon-plus pull-right" onclick="$(this).toggleClass('icon-plus icon-minus')"></i>
                      </a>
                  </h5>
              </div>
              <div id="collapseEight" class="collapse" role="tabpanel" aria-labelledby="headingEight">
                  <div class="card-body">
                      We would love to work with you to create content for your site. By working together, we can create and organize content that accurately reflects your business. Then with the addition of some free stock photo and graphics your site will come together quite smoothly.
                  </div>
              </div>
          </div>
      </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include "footer.php" ?>

    <!-- Bootstrap core JavaScript -->
    <?php include "scripts.php" ?>

  </body>

</html>
