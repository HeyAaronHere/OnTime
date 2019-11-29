<?php
//start session
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>About Us - OnTime</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="ONtime - Top Seller & Best Quality Services on watches">
        <meta name="keywords"
              content="Watches, Watch, Strap, Minute, Second, Buying, Selling, Discount, Offer, Fix, Repair, Maintenance, New Arrivals, Gshock, Fossil, Tag Heuer, Fashion, Hand Accessory, Second Hand, Time, Time Keeper, Pocket Watch, Rolex">
        <link rel="stylesheet" href="css/aboutUs.css">
        <link rel="stylesheet" href="css/headerFooter.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/aboutUs.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <main class="container-fluid">
            <?php
            include "include/header.inc.php";
            ?>
              <section class="row">
                <div class="col-lg-5">
                  <img class="img-responsive" id="holzkern" src="images/Holzkern.png" alt="ONtime">
                    <cite>Holzkern Model 'Manhattan'. (2019). [image] Available at
                      https://static.escdn.nl/images/resized/975421:1059:705:contain.jpg [Accessed 09/10/19].</cite>
                </div>
                <div class="col-lg-7" id="ourmission">
                  <h2 class="aboutus">Our Mission</h2>
                  <p>Founded in 2019, ONtime is one of the youngest corporations in Singapore.</p>
                </div>
              </section>
              <section class="row" id="ourteam">
                <h2 class="aboutus">Our Team</h2>
                <p>Our current team consists of 4 highly motivated watch makers.
                    If you'd like to know more about our members, click on the respective picture.</p>
                <article id="yeesiang" class="thumbnail col-md-3 col-sm-6" data-target="#yeesiangstext" data-parent="#yeesiang">
                  <h3>Yee Siang</h3>
                  <img id="yeesiangs" class="img-circle img-responsive" src="images/logo_bg.png" alt="Yee Siang">
                  <figure id="yeesiangstext" class="popup">
                    <article class="textbox">
                      <h4>Yee Siang</h4>
                      <p>
                        Yee Siang was born in Singapore. Yee Siang was born in Singapore. Yee Siang was born in
                        Singapore. Yee Siang was born in Singapore. Yee Siang was born in Singapore.
                      </p>
                    </article>
                  </figure>
                </article>
                <article id="aaron" class="thumbnail col-md-3 col-sm-6" data-target="#aaronstext" data-parent="#aaron">
                  <h3>Aaron</h3>
                  <img  id="aarons" class="img-circle img-responsive" src="images/logo_bg.png" alt="Aaron">
                  <figure id="aaronstext" class="popup"> <!--class="popup collapse"-->
                    <article class="textbox">
                      <h4>Aaron</h4>
                      <p>
                        Aaron was born in Singapore.Aaron was born in Singapore.
                        Aaron was born in Singapore.Aaron was born in Singapore.
                        Aaron was born in Singapore.Aaron was born in Singapore.
                        Aaron was born in Singapore.Aaron was born in Singapore.
                        Aaron was born in Singapore.
                      </p>
                    </article>
                  </figure>
                </article>
                <article id="daniel" class="thumbnail col-md-3 col-sm-6" data-target="#danielstext" data-parent="#daniel">
                  <h3>Daniel</h3>
                  <img id="daniels" class="img-circle img-responsive" src="images/logo_bg.png" alt="Daniel">
                  <figure id="danielstext" class="popup">
                    <article class="textbox">
                      <h4>Daniel</h4>
                      <p>
                        Daniel was born in Singapore. Daniel was born in Singapore.
                        Daniel was born in Singapore. Daniel was born in Singapore.
                        Daniel was born in Singapore. Daniel was born in Singapore.
                        Daniel was born in Singapore. Daniel was born in Singapore.
                      </p>
                    </article>
                  </figure>
                </article>
                <article id="nikola" class="thumbnail col-md-3 col-sm-6" data-target="#nioklastext" data-parent="#nikola">
                  <h3>Nikola</h3>
                  <img id="nikolas" class="img-circle img-responsive" src="images/logo_bg.png" alt="Nikola">
                  <figure id="nikolastext" class="popup">
                    <article class="textbox">
                      <h4>Nikola</h4>
                      <p>
                        Nikola was born in Germany. Nikola was born in Germany.
                        Nikola was born in Germany. Nikola was born in Germany.
                        Nikola was born in Germany. Nikola was born in Germany.
                        Nikola was born in Germany. Nikola was born in Germany.
                        Nikola was born in Germany. Nikola was born in Germany.
                      </p>
                    </article>
                  </figure>
                </article>
              </section>
              <section class="row">
                <h2 class="aboutus">Store Location</h2>
                <p>Our store is located in Ang Mo Kio area, Singapore.</p>
                <div id="map-container-google-1" class="map-container col-md-6">
                  <iframe title="SIT's location on google maps"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.665252371279!2d103.84664861475406!3d1.3775233989953317!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da16e96db0a1ab%3A0x3d0be54fbbd6e1cd!2sSingapore%20Institute%20of%20Technology%20(SIT%40NYP)!5e0!3m2!1sen!2ssg!4v1570349899057!5m2!1sen!2ssg">
                  </iframe>
                </div>
                <div id="storelocation" class="col-md-6">
                  <cite>SIT NYP Building. (2017). [image] Available at: https://commons.wikimedia.org/wiki/File:SIT_NYP_Building.jpg [Accessed 11 Oct. 2019].</cite>
                  <img class="img-rounded" alt="SIT@NYP building" src="images/SIT_NYP_Building.png">
                </div>
              </section>
          </main>
          <?php
            include "include/footer.inc.php";
          ?>
    </body>
</html>
