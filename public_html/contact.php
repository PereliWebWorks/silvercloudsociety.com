<?php require_once(__DIR__ . "/../resources/config.php"); ?>
<?php include(__DIR__ . "/../resources/templates/head.php"); ?>
<?php include(__DIR__ . "/../resources/templates/navbar.php"); ?>

	<div class="parallax-container" data-parallax="scroll" data-position="top" data-bleed="10" 
		data-image-src="images/girl_with_bike.jpg" data-natural-width="1000" data-natural-height="527">
		  <h1 class="hidden-xs hidden-sm parallax-header">ABOUT</h1>
		  <h1 class="visible-xs visible-sm parallax-header parallax-header-xs">ABOUT</h1>
    </div>

    <section class="text-content">
      <div class="container">
      	<h3>Please feel free to give us a call at ***-***-**** or fill out the form below.</h3>
        <form>
          <span class="row">
            <div class="form-group col-xs-4">  
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
            <div class="form-group col-xs-6">
              <label for="contact-first-name">First Name *</label>
              <input type="text" id="contact-first-name" name="first_name" required="true" class="col-xs-12"/>
            </div>
            <div class="form-group col-xs-6">
              <label for="contact-last-name">Last Name *</label>
              <input type="text" id="contact-last-name" name="last_name" required="true" class="col-xs-12"/>
            </div>
          </span>
          <div class="form-group">
          </div>
          <div class="form-group">
          </div>
          <div class="form-group">
          </div>
          <div class="form-group">
          </div>
          <div class="form-group">
          </div>
        </form>
      </div>
    </section>

    <div class="parallax-container" data-parallax="scroll" data-bleed="10" data-speed="0.2" data-image-src="images/wedding.jpg" data-natural-width="1000" data-natural-height="714">
    	<!--<h3 class="parallax-header" id="parallax-header-2">We strive to be a creative, artistic and redemptive presence in the way we do our business and the quality of our work.</h3>-->
    </div>

<?php include(__DIR__ . "/../resources/templates/foot.php"); ?>