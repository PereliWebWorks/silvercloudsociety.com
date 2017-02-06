<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        $pageName = explode(".", basename($_SERVER['PHP_SELF']))[0]; //Get page name without .php extension
        $titleAddition =  $pageName === "index" ? "" : " | " . ucfirst($pageName) ;
    ?>
    <title>Silver Cloud Society<?= $titleAddition; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="stylesheets/style.css" rel="stylesheet" type="text/css" />
    <link href="stylesheets/navbar.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- textillate -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <script src="https://cdn.rawgit.com/davatron5000/Lettering.js/5a4897f9/jquery.lettering.js"></script>
    <script src="https://cdn.rawgit.com/jschr/textillate/54a2a79a/jquery.textillate.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="js/parallax.js/parallax.min.js"></script>
    <script>
        
        $(function(){
            // mobile menu slide from the left
            $('button.navbar-toggle').on('click', function() {
                var $navMenu = $($(this).data('target'));
                if (!$navMenu.hasClass("open"))
                {
                    $navMenu.add("#main-content, img").animate({left: "-=80%"});
                    $("body").css("overflow", "hidden");
                }
                else
                {
                    $navMenu.add("#main-content, img").animate({left: "+=80%"});
                    $("body").css("overflow", "scroll");
                }
                $navMenu.toggleClass("open");
            });

            $(".animated-index-header").textillate({ 
                                                    in: { effect: 'fadeIn' },
                                                    out: { effect: 'flash' },
                                                    callback: function()
                                                    {
                                                        $(".animated-index-header").textillate("out");
                                                    }
                                                    });

            $(".milton-inline").each(function(index, element)
            {
                $(element).textillate({
                    in: { effect: 'flash'},
                    out: { effect: 'flash'},
                    initialDelay: Math.floor(Math.random() * 5000) + 1000,
                    minDisplayTime: Math.floor(Math.random() * 7000) + 3000,
                    loop: true
                });
            });           

        });
    </script>
<head>
<body>
<div id="main-content">
<style>

</style>