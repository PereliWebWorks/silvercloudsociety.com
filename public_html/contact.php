<?php require_once(__DIR__ . "/../resources/config.php"); ?>
<?php include(__DIR__ . "/../resources/templates/head.php"); ?>
<?php include(__DIR__ . "/../resources/templates/navbar.php"); ?>

	<div class="parallax-container" data-parallax="scroll" data-position="top" data-bleed="10" 
		data-image-src="images/piano.jpg" data-natural-width="640" data-natural-height="640">
		  <h1 class="parallax-header">CONTACT</h1>
    </div>


    <section class="text-content">
      <div class="container">
        <?php include(__DIR__ . "/../resources/templates/flashMessages.php"); ?>
      	<h3>Please feel free to give us a call at ***-***-**** or fill out the form below.</h3>

        <form id="contact-form" enctype="multipart/form-data" method="post" action="mailers/contact.php">
          <span class="row">
            <div class="form-group col-md-4 col-xs-12">  
              <label for="contact-category">Category *</label>
              <select class="form-control" id="contact-category" name="category" class="">
                <option value="1">General Question</option>
                <option value="2">Business Inquiry</option>
                <option value="3">Job Inquiry</option>
                <option value="4">Other</option>
              </select>
            </div>
          </span>
          <span class="row">
            <div class="form-group col-md-6 col-xs-12">
              <label for="contact-first-name">First Name *</label>
              <input type="text" id="contact-first-name" name="first_name" required="true" />
            </div>
            <div class="form-group col-md-6 col-xs-12">
              <label for="contact-last-name">Last Name *</label>
              <input type="text" id="contact-last-name" name="last_name" required="true" />
            </div>
          </span>
          <span class="row">
            <div class="form-group col-xs-12">
              <label for="contact-organization">Organization</label>
              <input type="text" id="contact-organization" name="organization" />
            </div>
          </span>

          <span class="row">
            <div class="form-group col-xs-12">
              <label for="contact-email">Email *</label>
              <input type="email" id="contact-email" name="email" required="true" />
            </div>
          </span>
          <span class="row">
            <div class="form-group col-xs-12">
              <label for="contact-subject">Subject *</label>
              <input type="text" id="contact-subject" name="subject" required="true" />
            </div>
          </span>
          <span class="row">
            <div class="form-group col-xs-12">
              <label for="contact-message">Message *</label>
              <textarea id="contact-message" name="message" rows="5" required="true">d</textarea>
            </div>
          </span>
          <span class="row">
            <div class="form-group col-xs-12">
              <label for="contact-resume">Resume (PDF Only)</label>
              <input type="file" id="contact-resume" name="resume" />
            </div>
          </span>
          <span class="row">
            <div class="col-md-2 col-xs-12">
              <input type="submit" class="btn btn-default" id="contact-form-submit-btn" value="Send" />
            </div>
          </span>
        </form>
      </div>
    </section>


    <script>$("[required]").attr("value", "d@g.com");</script>

    <div class="parallax-container" data-parallax="scroll" data-bleed="10" data-speed="0.2" 
      data-image-src="images/rollercoaster.jpg" data-natural-width="640" data-natural-height="640"></div>

<?php include(__DIR__ . "/../resources/templates/foot.php"); ?>