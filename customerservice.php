<?php
//start session
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Customer Service - OnTime</title>
        <meta name="description" content="ONtime - Top Seller & Best Quality Services on watches">
        <meta name="keywords" content="Watches, Watch, Strap, Minute, Second, Buying, Selling, Discount, Offer, Fix, Repair, Maintenance, New Arrivals, Gshock, Fossil, Tag Heuer, Fashion, Hand Accessory, Second Hand, Time, Time Keeper, Pocket Watch, Rolex">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/customerservice.css" rel="stylesheet" type="text/css">
        <link href="css/headerFooter.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/customerservice.js"></script>
    </head>
    <body>
        <?php
        include "header.inc.php";
        ?>
        <main class="aftnav">
            <article class="container">
                <section class="row">
                    <figure class="col-sm-5">
                        <!-- allwatches.com.sg,MAINTENANCE / COMPLETE OVERHAUL SERVICE,https://allwatches.com.sg/maintenance-complete-overhaul-service/ -->
                        <img class="imgMaintenance" src="images/Maintenance.png" alt="Maintenance">
                        <cite>maintenance-complete-overhaul-service. (n.d.). [image] Available at: https://allwatches.com.sg/maintenance-complete-overhaul-service/ [Accessed 11 Oct. 2019].</cite>
                    </figure>
                    <section class="col-sm-7" id="Maintenance">
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
                    </section>
                </section>
            </article>
            <article class="container" id="CustomerInquiries">
                <!--Responsive Form CSS - https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_responsive_form -->
                <form name="CustomerInquiries" action="p_customerservice.php" method="post">
                    <h1>Customer Inquiries</h1>
                    <section class="row">
                        <section class="col-25">
                            <label for="CIname">Name</label>
                        </section>
                        <section class="col-75">
                            <input type="text" id="CIname" name="CIname" placeholder="Your name.." required pattern="^([a-zA-Z]+[,.]?[ ]?|[a-zA-Z]+['-]?)+$">
                        </section>
                    </section>
                    <section class="row">
                        <section class="col-25">
                            <label for="CIemail">Email</label>
                        </section>
                        <section class="col-75">
                            <input type="email" id="CIemail" name="CIemail" placeholder="E.g: abc@gmail.com" required pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$">
                        </section>
                    </section>
                    <section class="row">
                        <section class="col-25">
                            <label for="CInumber">Phone Number</label>
                        </section>
                        <section class="col-75">
                            <input type="tel" id="CInumber" name="CInumber" placeholder="(+65) E.g: 98765432" maxlength="8" required pattern="[0-9]{8}">
                        </section>
                    </section>
                    <section class="row">
                        <section class="col-25">
                            <label for="CIquestion">Question</label>
                        </section>
                        <section class="col-75">
                            <textarea id="CIquestion" name="CIquestion" placeholder="Write your question.." required></textarea>
                        </section>
                    </section>
                    <section class="row">
                        <input type="submit" name="CI-submit" value="Submit">
                    </section>
                </form>
                <!--Responsive Form CSS - https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_responsive_form -->
            </article>
            <article>
                <h1 class="FAQ">FAQ</h1>
                <hr>
                <!-- FAQ collapsible - https://bootsnipp.com/snippets/qADDB -->
                <section class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <section class="panel panel-default">
                        <section class="panel-heading" role="tab" id="headingOne">
                            <h2 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Do you provide watch repair and servicing?
                                </a>
                            </h2>
                        </section>
                        <section id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <section class="panel-body">
                                Yes! You can contact us at
                                <a href="tel:+651234-5678">+65 1234 5678</a> or come to our store @ <address>Ang Mo Kio Avenue 8, Singapore 567739</address>
                            </section>
                        </section>
                    </section>
                    <section class="panel panel-default">
                        <section class="panel-heading" role="tab" id="headingTwo">
                            <h2 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseThree">
                                    How long does it takes to repair a watch?
                                </a>
                            </h2>
                        </section>
                        <section id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <section class="panel-body">
                                2 – 3 months, depending on the brand and complexity of the repair. We will contact
                                you for the collection of your watch once it
                            </section>
                        </section>
                    </section>
                    <section class="panel panel-default">
                        <section class="panel-heading" role="tab" id="headingThree">
                            <h2 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    I bought a watch oversea, can I send to you for repair?
                                </a>
                            </h2>
                        </section>
                        <section id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <section class="panel-body">
                                Yes. We service all kinds of watches!
                            </section>
                        </section>
                    </section>
                </section>
                <!-- FAQ collapsible - https://bootsnipp.com/snippets/qADDB -->
            </article>
        </main>
        <?php
        include "footer.inc.php";
        ?>
    </body>
</html>