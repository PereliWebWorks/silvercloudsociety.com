<?php require_once(__DIR__ . "/../resources/config.php"); ?>
<?php include(__DIR__ . "/../resources/templates/head.php"); ?>
<?php include(__DIR__ . "/../resources/templates/navbar.php"); ?>

  <!--
	<div class="parallax-container" data-parallax="scroll" data-position="top" data-bleed="10" 
		data-image-src="images/people.jpg" data-natural-width="700" data-natural-height="439">
		  <h1 class="parallax-header">Contact</h1>
    </div>
    -->

    <!--
   <div class="parallax-container" data-parallax="scroll" data-bleed="10" data-speed="0.2" data-image-src="images/skyline.jpg" data-natural-width="920" data-natural-height="612" data-speed="-0.1">
    </div>
    -->

    <div class="parallax-container" data-parallax="scroll" data-position="top" data-bleed="10"
    data-image-src="images/swing.jpg" data-natural-width="638" data-natural-height="501" id="about-parallax-header">
      <h1 class="parallax-header">Contact</h1>
    </div>


    <section class="text-content">
      <div class="container">
        <?php include(__DIR__ . "/../resources/templates/flashMessages.php"); ?>
        <div class="col-xs-12">
          <span class="milton-inline">Silver Cloud Society</span> is a liaison of independent film producers and other creative minded professionals, including but not limited to writers, screenwriters, social media pros, social media geeks and publicists.  
          <div>&nbsp;</div>
          <span class="milton-inline">Silver Cloud Society</span> boasts of a vast array of talents from accredited universities and award winning freelancers.
          <div>&nbsp;</div>
          The primary focal point of <span class="milton-inline">Silver Cloud Society</span> is to bring artists together to highlight our multitude of talent, to develop internal projects and to increase visibility of <span class="milton-inline">Silver Cloud Society</span> by producing competitive films.
          <div>&nbsp;</div>
          <span class="milton-inline">Silver Cloud Society</span> actively recruits writers, senior editors and screenwriters both locally and internationally.
          <div>&nbsp;</div>
          Each internal project requires a proficient multifaceted team to create, arrange and market content that is alluring on screen, on stage, via internet viewing and in written publication. 
          <div>&nbsp;</div>
          To apply, fill out the form below. Include resume and pertinent projects/filmography.
          <div>&nbsp;</div>
        	<h3>Please submit any inquiries via the form below.</h3>
          <div>&nbsp;</div>
          <div>&nbsp;</div>
        </div>
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
                <textarea id="contact-message" name="message" rows="5" required="true"></textarea>
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

    <!--
    <div class="parallax-container" data-parallax="scroll" data-bleed="10" data-speed="0.2" 
      data-image-src="images/rollercoaster.jpg" data-natural-width="640" data-natural-height="640"></div>
      -->

      <div class="parallax-container" data-parallax="scroll" data-bleed="10" data-speed="-0.1" data-image-src="images/piano.jpg" data-natural-width="600" data-natural-height="600">
    </div>

<?php include(__DIR__ . "/../resources/templates/foot.php"); ?>