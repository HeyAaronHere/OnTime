<?php
//start session
if (!isset($_SESSION)) {
    session_start();
}

$reviewID = "";
$errorMsg = "";
$success = true;

include "connection.inc.php";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Reviews - ONTime</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/reviews.css" type="text/css" />
        <link rel="stylesheet" href="css/headerFooter.css" type="text/css" />
        <script src="js/productreview.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
        </script>
        <script src="js/bootstrap.min.js">
        </script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <?php
        include "header.inc.php";
        ?>


        <main class="review container-fluid">
            <?php if (isset($_SESSION['msg'])): ?>
                <div class="msg" id="h2">
                    <?php
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                    ?>
                </div>
            <?php endif ?>

            <h1>Reviews</h1>
            <p class="text-center">We value every comments you provide!</p>
            <div class="container" id="productreview">
                <!--Responsive Form CSS - https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_responsive_form -->
                <!-- w3schools js validation, https://www.w3schools.com/js/js_validation.asp -->
                <form id="productreviews" action="process_review.php" method="post">
                    <div class="col-sm-12 form-group">
                        <label for="review">
                            Reviews:</label>
                        <textarea class="form-control" id="reviewinput" name="review" placeholder="Write your reviews.." maxlength="6000" rows="7" required></textarea>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="name">
                            Your Name:</label>
                        <input type="text" class="form-control" id="name" name="name" pattern="^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="email">
                            Email:</label>
                        <input type="email" class="form-control" id="email" name="email"  pattern="\S+@\S+\.\S+" required>
                    </div>
                    <input type="hidden" name="review_id" value="<?php echo (isset($reviewID['review_id'])) ? $reviewID['review_id'] : ''; ?>">
                    <input type="submit" id="btnSubmit" name ="submitbutton" value="Submit">
                </form>
            </div>

            <!--Responsive Form CSS - https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_responsive_form -->

            <!-- review URL = https://www.youtube.com/watch?v=qZno3Yk8QKc&t=500s Author = Easy Tutorials -->
            <?php
            if (!isset($_POST['review_id']) || empty($_POST['review_id']) || !is_numeric($_POST['review_id'])) {
                $errors[] = 'Error msg, try again';
            } else {
                $reviewID = $_POST['review_id'];
            }
            $IDquery = "SELECT * FROM review WHERE review_id ='$reviewID'";
            $sql = mysqli_query($conn, $IDquery);
            if (!$sql) {
                $errorMsg .= "<p>Database error: " . $conn->error . "</p>";
                $success = false;
            } else if (mysqli_num_rows($sql) > 0) {
                while ($reviewDetails = mysqli_fetch_assoc($sql)) {
                    ?>
                    <section class="container">
                        <div class="row review_box" >
                            <div class = "col-md-4">
                                <div class ="review_img"> 
                                    <img src="img/logo_bg.png" alt="ONTime icon">
                                </div>
                            </div>
                            <div class="col-md-8">    
                                <div class="review_desc">
                                    <h2><?php $reviewDetails['name'] ?></h2>
                                    <p><?php $reviewDetails['review_desc'] ?> ></p>
                                </div>
                            </div>
                            <div class = "clear"></div>
                        </div>

                        <?php
                    }
                    $sql->free();
                    $conn->close();
                }
                ?>
            </section>                   

            <section class="container">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <figure class="profile">
                            <img src="img/logo_bg.png" alt="ONTime icon" class="user">
                            <blockquote>Watches in ONtime is just AWESOME!!!!</blockquote>
                            <figure class="star-rating">
                                <span class="fa fa-star" data-rating="1"></span>
                                <span class="fa fa-star" data-rating="2"></span>
                                <span class="fa fa-star" data-rating="3"></span>
                                <span class="fa fa-star" data-rating="4"></span>
                                <span class="fa fa-star" data-rating="5"></span>
                            </figure>
                            <h2>Aaron <span>Co-Founder of OnTime </span></h2>
                        </figure>
                    </div>
                    <div class="col-md-4 text-center">
                        <figure class="profile">
                            <img src="img/logo_bg.png" alt="ONTime icon" class="user">
                            <blockquote>Best Watch Shop in Singapore! ONTime! </blockquote>
                            <figure class="star-rating">
                                <span class="fa fa-star" data-rating="1"></span>
                                <span class="fa fa-star" data-rating="2"></span>
                                <span class="fa fa-star" data-rating="3"></span>
                                <span class="fa fa-star-half-o" data-rating="4"></span>
                                <span class="fa fa-star-o" data-rating="5"></span>
                            </figure>
                            <h2>Yee Siang <span>Co-Founder of OnTime </span></h2>
                        </figure>
                    </div>
                    <div class="col-md-4 text-center">
                        <figure class="profile">
                            <img src="img/logo_bg.png" alt="ONTime icon" class="user">
                            <blockquote>WATCH watch watch watches, etc............</blockquote>
                            <figure class="star-rating">
                                <span class="fa fa-star" data-rating="1"></span>
                                <span class="fa fa-star" data-rating="2"></span>
                                <span class="fa fa-star" data-rating="3"></span>
                                <span class="fa fa-star" data-rating="4"></span>
                                <span class="fa fa-star-half-o" data-rating="5"></span>
                            </figure>
                            <h2>Daniel <span>Co-Founder of OnTime </span></h2>
                        </figure>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 text-center">
                        <figure class="profile">
                            <img src="img/logo_bg.png" alt="ONTime icon" class="user">
                            <blockquote>Watches in ONtime is just AWESOME!!!!</blockquote>
                            <figure class="star-rating">
                                <span class="fa fa-star" data-rating="1"></span>
                                <span class="fa fa-star" data-rating="2"></span>
                                <span class="fa fa-star" data-rating="3"></span>
                                <span class="fa fa-star" data-rating="4"></span>
                                <span class="fa fa-star" data-rating="5"></span>
                            </figure>
                            <h2>Nikola <span>Co-Founder of OnTime </span></h2>
                        </figure>
                    </div>
                    <div class="col-md-4 text-center">
                        <figure class="profile">
                            <img src="img/logo_bg.png" alt="ONTime icon" class="user">
                            <blockquote>Best Watch Shop in Singapore! ONTime! </blockquote>
                            <figure class="star-rating">
                                <span class="fa fa-star" data-rating="1"></span>
                                <span class="fa fa-star" data-rating="2"></span>
                                <span class="fa fa-star" data-rating="3"></span>
                                <span class="fa fa-star-half-o" data-rating="4"></span>
                                <span class="fa fa-star-o" data-rating="5"></span>
                            </figure>
                            <h2>Aaron <span>Co-Founder of OnTime </span></h2>
                        </figure>
                    </div>
                    <div class="col-md-4 text-center">
                        <figure class="profile">
                            <img src="img/logo_bg.png" alt="ONTime icon" class="user">
                            <blockquote>WATCH watch watch watches, etc............</blockquote>
                            <figure class="star-rating">
                                <span class="fa fa-star" data-rating="1"></span>
                                <span class="fa fa-star" data-rating="2"></span>
                                <span class="fa fa-star" data-rating="3"></span>
                                <span class="fa fa-star-half-o" data-rating="4"></span>
                                <span class="fa fa-star-o" data-rating="5"></span>
                            </figure>
                            <h2>Yee Siang <span>Co-Founder of OnTime </span></h2>
                        </figure>
                    </div>
                </div>
            </section>
        </main>
        <!-- review URL = https://www.youtube.com/watch?v=qZno3Yk8QKc&t=500s Author = Easy Tutorials -->
        <?php
        include "footer.inc.php";
        ?>
    </body>

</html>
