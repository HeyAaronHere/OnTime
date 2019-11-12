<!DOCTYPE html>
<html>

<head>
    <title>Customer Service - OnTime</title>
    <meta name="description" content="ONtime - Top Seller & Best Quality Services on watches">
    <meta name="keywords" content="Watches, Watch, Strap, Minute, Second, Buying, Selling, Discount, Offer, Fix, Repair, Maintenance, New Arrivals, Gshock, Fossil, Tag Heuer, Fashion, Hand Accessory, Second Hand, Time, Time Keeper, Pocket Watch, Rolex">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/customerservice.css" rel="stylesheet" type="text/css">
    <link href="css/headerFooter.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/customerservice.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <section>
        <?php
        include "header.php";
        ?>
        <main class="aftnav">
            <article>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5">
                            <!-- allwatches.com.sg,MAINTENANCE / COMPLETE OVERHAUL SERVICE,https://allwatches.com.sg/maintenance-complete-overhaul-service/ -->
                            <img class="imgMaintenance" src="images/Maintenance.png" alt="Maintenance">
                        </div>
                        <div class="col-sm-7" id="Maintenance">
                            <h1>Maintenance</h1>
                            <h2>In case your watch needs some fixing...</h2>
                            <section>
                                <p>Regular maintenance is essential to ensure that your watch functions correctly. The
                                    lubrication in the movement parts will deteriorates and eventually dries up after
                                    certain time. When it happens, friction will generate and
                                    thus affect the precision in telling time. If your watch is noticeably fast or slow,
                                    the movement / mechanism may need to be serviced. Aging of gasket in particular will
                                    also adversely affect the water-resistance of a watch.
                                </p>
                                <p>We recommend a maintenance service to check your watch movement (for mechanical
                                    watches), battery (for quartz watches) and replace new gaskets every 1.5 to 2 years.
                                </p>
                                <p>To optimize the reliability and well-functioning of your valuable timepiece, a
                                    complete overhaul service is recommended every 3 to 5 years.</p>
                                <p>For quotation, bring along your watch to your nearest ONtime store for assessment or
                                    call to enquire about this service.</p>
                            </section>
                        </div>
                    </div>
                </div>
            </article>
            <div class="container" id="CustomerInquiries">
                <!--Responsive Form CSS - https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_responsive_form -->
                <form name="CustomerInquiries" action="customerservice.php" method="post" onsubmit="return validateform()">
                    <h1>Customer Inquiries</h1>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Name</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="CIname" name="CIname" placeholder="Your name.." required pattern="^([a-zA-Z]+[,.]?[ ]?|[a-zA-Z]+['-]?)+$">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="CIemail">Email</label>
                        </div>
                        <div class="col-75">
                            <input type="email" id="CIemail" name="CIemail" placeholder="E.g: abc@gmail.com" required pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="CInumber">Phone Number</label>
                        </div>
                        <div class="col-75">
                            <input type="tel" id="CInumber" name="CInumber" placeholder="(+65) E.g: 98765432" maxlength="8" required pattern="[0-9]{8,8}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="question">Question</label>
                        </div>
                        <div class="col-75">
                            <textarea id="CIquestion" name="CIquestion" placeholder="Write your question.." required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <input type="submit" value="Submit">
                    </div>
                </form>
                <!--Responsive Form CSS - https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_responsive_form -->
            </div>
            <article>
                <section>
                    <h1 class="FAQ" id="FAQ">FAQ</h1>
                    <hr>
                    <!-- FAQ collapsible - https://bootsnipp.com/snippets/qADDB -->
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Do you provide watch repair and servicing?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    Yes! You can contact us at
                                    <a href="tel:+651234-5678">+65 1234 5678</a> or come to our store @ <address>Ang Mo
                                        Kio
                                        Avenue 8, Singapore 567739</address>
                                    <!--<section id="map-container-google-1" class="map-container">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.665252371279!2d103.84664861475406!3d1.3775233989953317!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da16e96db0a1ab%3A0x3d0be54fbbd6e1cd!2sSingapore%20Institute%20of%20Technology%20(SIT%40NYP)!5e0!3m2!1sen!2ssg!4v1570349899057!5m2!1sen!2ssg"
                                        frameborder="1" style="border:1;">
                                    </iframe>
                                </section>-->
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseThree">
                                        How long does it takes to repair a watch?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    2 – 3 months, depending on the brand and complexity of the repair. We will contact
                                    you for the collection of your watch once it
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        I bought a watch oversea, can I send to you for repair?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    Yes. We service all kinds of watches!
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FAQ collapsible - https://bootsnipp.com/snippets/qADDB -->
                </section>
            </article>
        </main>
        <?php
        include "footer.php";
        ?>
</body>

</html>