<!DOCTYPE html>
<html class="wide wow-animation" >
  <head>
    <title>AirCycle - Get your own tracker today!</title>
    <?php include 'parts/head.php'; ?>
  </head>
  <body>
  <div class="page"> 
      <section class="section page-header-3">
  <?php include 'parts/header.php'; ?>
  <section class="section section-md bg-gray-100">
        <div class="container">
          <h3 class="text-center">Get Started</h3>
          <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-9">
              <form class="rd-mailform rd-form" data-form-output="form-output-global" data-form-type="contact" method="post" action="mailto:info@aircycle.org">
                <div class="row row-x-16 row-20">
                  <div class="col-md-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-name" type="text" name="name" data-constraints="@Required">
                      <label class="form-label" for="contact-name">Your Name</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-email" type="email" name="email" data-constraints="@Required @Email">
                      <label class="form-label" for="contact-email">Email</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-phone" type="text" name="phone" data-constraints="@PhoneNumber">
                      <label class="form-label" for="contact-phone">Phone</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-healthinsurance" type="text" name="healthinsurance" data-constraints="@Required">
                      <label class="form-label" for="contact-healthinsurance">Health Insurance</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-wrap form-button">
                      <button class="button button-block button-secondary" type="submit">Send Message</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <?php include 'parts/footer.php'; ?>
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="theme/js/core.min.js"></script>
    <script src="theme/js/script.js"></script>
  </body>
</html>