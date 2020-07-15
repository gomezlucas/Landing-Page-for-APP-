<?php
//Conect Database 
include('./db_connect.php');

$errors = array('email' => '');
$email = '';
$ok =  '';

if (isset($_POST['submit'])) {
    //check that the input is not empty 
    if (empty($_POST['email'])) {
        $errors['email'] = "the field can not be empty";
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Please provide a valid email.";
        } else {
            $errors['email'] = '';
            //Create query
            $sql = "INSERT INTO subscriptions (email) VALUES ('$email')";
            // Save to DB 
            if (!mysqli_query($conn, $sql)) {
                echo "Query error:" .  mysqli_error($conn);
            } else {
                $ok = "Your email has been saved succesfully";
            include('./correo.php');
            }
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Favicon-->
    <link rel="shortcut icon" href="./assets/images/mobileLogo.svg" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./assets/css/styles.css">
    <title> RescueCall | Coming Soon</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light fixed-top " id="mainNav">
        <div class="container" data-aos="fade-right" data-aos-duration="2000">
            <a class="navbar-brand" href="#">
                <img class="navbar__logo1" src="./assets/images/mobileLogo.svg" alt="">
                <svg class="navbar__logo2" viewBox="0 0 183 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.16 22.1702C16.84 21.6902 16.72 21.4902 17.24 21.2502C23.16 18.4902 25.96 5.65017 19.04 2.69017C16 1.41017 9.16 6.57017 7.96 10.1702C7.8 11.3302 6.24 4.81017 5.48 3.77017C4.16 1.69018 2.24 0.570173 1.44 0.490174C1.08 0.410175 0.92 0.490174 0.96 0.930173C0.4 2.77017 -0.28 30.6102 0.44 34.7302C0.6 36.6502 0.32 41.3702 2.12 41.6902C2.16 41.4502 2.2 41.2502 2.32 41.0102C2.64 41.0102 2.88 41.0902 3.16 41.0502C5.76 40.6502 8.08 28.9302 8.08 26.0502C8.08 24.6102 9 26.0902 10.36 27.2502C13.28 29.6902 20.56 37.1702 22.52 37.6902C25.24 38.4102 28.04 36.7702 28.76 35.0502C28.4 35.8102 24.76 33.8902 17.16 22.1702ZM8.08 17.4102C8.32 9.53017 15.52 5.05018 15.92 8.37018C16.96 17.1302 10.76 22.1702 8.8 23.1302C7.96 23.8102 8.04 18.5702 8.08 17.4102ZM35.5438 29.6902C32.7038 31.0102 32.2238 27.1302 32.2238 25.2102C32.3038 24.9302 32.1438 24.1702 32.4638 24.0902C34.7838 23.6502 38.2238 20.0502 37.5038 14.3702C37.2638 12.5302 35.9438 11.8502 34.4638 11.8502C31.1038 11.8502 27.9038 16.6902 27.2237 19.5702C26.1437 24.0102 27.5438 33.2102 33.3838 33.2102C34.7038 33.2102 38.1038 30.2502 39.4638 28.2502C40.4238 27.0102 42.4238 23.6102 42.3838 22.1702C42.5838 21.6902 41.9438 20.8102 41.6638 22.0902C40.9438 24.8102 38.7438 28.2102 35.5438 29.6902ZM33.6238 13.6902C35.4638 13.6102 35.1038 17.6502 35.1438 18.1302C35.2238 19.5302 34.9438 22.1302 32.2238 23.2902C32.1438 21.1702 31.9438 13.7702 33.6238 13.6902ZM48.4006 27.5702C47.6806 27.8902 46.8006 25.8502 46.4806 25.0902C45.2806 22.1702 43.5606 18.7302 45.0406 17.6102C45.8806 16.9702 48.7206 13.4102 49.5206 12.1302C50.0006 11.2102 48.6006 9.85018 47.6806 9.25017C44.9206 10.4902 42.5206 14.1702 41.6006 16.9702C40.0806 21.9302 42.8006 28.7302 42.9606 30.9702C42.9206 31.1302 40.3606 34.7302 40.0806 36.0902C39.3206 39.6902 44.8006 39.3702 47.0006 38.1702C49.0406 36.6902 49.3606 31.9702 48.9206 30.6102C48.6406 29.1302 48.0406 28.9302 48.8406 28.3302C50.4406 27.1302 52.7206 25.3702 53.4406 22.0502C53.4406 21.9302 53.4006 21.7702 53.3206 21.6502C53.2806 21.6102 53.1606 21.5702 53.0006 21.6102C52.6806 21.7702 52.7206 21.8102 52.5606 22.1702C52.0806 23.7302 50.9606 25.9702 48.4006 27.5702ZM42.8006 32.7702C43.0006 33.9302 42.6806 35.0102 42.4806 36.1702C42.4006 36.7302 41.7206 36.8102 40.6006 36.8102C40.8406 35.2502 41.5606 34.0902 42.8006 32.7702ZM43.9606 16.8902C43.8406 15.8102 46.1206 12.8102 46.6806 12.1302C47.2006 11.4902 47.6806 10.9302 48.3206 11.1302C47.8806 12.8102 45.0006 15.8502 43.9606 16.8902ZM67.4981 22.0102C67.0581 23.7302 66.6581 25.2902 66.1781 26.8102C65.4981 28.6502 63.4181 31.8502 60.7781 31.7302C60.1781 31.7302 57.4581 30.4502 58.2181 22.4102C58.3381 21.4902 58.5381 20.4502 58.8181 19.4902C59.0981 18.2902 61.2181 12.0502 62.6581 13.0502C63.0981 13.4502 63.0981 14.8902 62.8981 15.4902C62.1381 17.9302 59.9781 23.0502 61.9381 22.8102C62.4181 22.7302 63.1381 21.8502 63.1781 21.2902C63.2181 21.0502 63.2981 20.9702 63.3781 20.7702C63.8581 19.4902 64.3781 14.8502 64.2181 13.2902C64.0981 12.2502 63.7781 11.6102 62.9381 11.0502C60.3381 9.45018 57.1381 10.2102 55.3381 13.2502C52.0181 18.7702 50.9781 25.2502 52.8581 29.0502C53.5781 30.4102 55.4581 32.0502 56.9381 32.9302C57.9381 33.5302 58.9781 33.7302 60.2581 33.8902C65.5781 34.3702 68.3381 25.0502 68.4181 21.6502C68.5781 20.8902 67.7381 21.1302 67.4981 22.0102ZM72.6591 29.9302C72.6191 25.6902 72.8191 18.2902 72.9791 13.9702C73.0191 13.8102 72.9391 13.7702 72.9391 13.5702C72.6991 12.5302 69.2591 10.6902 68.4591 10.4102C66.8591 14.7302 66.6591 24.7302 68.1791 29.0502C69.4591 30.4902 71.2991 32.0102 73.0991 31.4902C74.4591 31.1702 75.7791 30.4502 77.2991 27.9302C78.4191 25.3302 76.5791 31.9702 79.4591 33.8102C83.0991 36.1302 84.8591 27.6502 86.5791 22.0102C86.6591 21.3302 86.2191 21.4902 86.1791 21.4102C85.8591 21.5302 85.8591 21.3302 85.6591 21.8902C85.5391 22.7702 83.0591 31.3702 81.8591 32.1702C81.6591 32.2902 81.1391 32.0102 81.0591 31.7302C80.7391 29.6502 81.2591 24.8902 81.4991 22.8102C81.5391 22.0502 81.7391 15.9702 81.8191 15.6902C82.1391 14.4102 78.7791 14.8502 78.6991 16.6102C78.2991 18.6102 77.6191 25.2102 76.9791 27.0102C76.2991 28.7702 73.0991 31.9302 72.6591 29.9302ZM93.8641 29.6902C91.0241 31.0102 90.5441 27.1302 90.5441 25.2102C90.6241 24.9302 90.4641 24.1702 90.7841 24.0902C93.1041 23.6502 96.5441 20.0502 95.8241 14.3702C95.5841 12.5302 94.2641 11.8502 92.7841 11.8502C89.4241 11.8502 86.2241 16.6902 85.5441 19.5702C84.4641 24.0102 85.8641 33.2102 91.7041 33.2102C93.0241 33.2102 96.4241 30.2502 97.7841 28.2502C98.7441 27.0102 100.744 23.6102 100.704 22.1702C100.904 21.6902 100.264 20.8102 99.9841 22.0902C99.2641 24.8102 97.0641 28.2102 93.8641 29.6902ZM91.9441 13.6902C93.7841 13.6102 93.4241 17.6502 93.4641 18.1302C93.5441 19.5302 93.2641 22.1302 90.5441 23.2902C90.4641 21.1702 90.2641 13.7702 91.9441 13.6902ZM110.001 0.650175C99.4009 8.37018 95.8409 31.7702 106.521 37.2102C108.961 37.9302 111.201 37.6902 113.161 35.7702C113.241 35.6502 113.361 35.5302 113.481 35.4502C115.801 34.9702 118.801 27.6502 118.761 24.2502C119.081 22.7702 113.841 20.4502 114.361 23.2502C115.601 25.2102 114.721 33.4102 112.281 33.8102C112.041 34.1702 111.881 34.1702 111.561 33.9302C108.121 30.6502 107.481 18.0902 108.521 13.9302C108.681 13.4502 108.761 13.4102 109.201 13.5302C109.601 13.7302 110.921 13.7302 111.321 13.6102C113.361 14.5702 121.001 3.45017 118.201 3.05017C116.921 1.77017 111.321 -0.349827 110.001 0.650175ZM108.841 12.6502C108.841 12.5302 108.841 12.4502 108.841 12.3302C108.921 11.5702 110.761 5.01018 111.401 4.09018C119.521 2.41017 111.041 12.5702 109.041 12.6902C109.001 12.6502 108.961 12.6502 108.841 12.6502ZM130.586 26.0102C131.386 25.6502 139.186 22.8502 138.906 23.8502C139.106 25.2902 139.226 33.5702 140.186 36.5702C140.346 37.0102 140.586 37.2502 140.986 37.4102C142.066 37.6902 143.226 39.2102 143.826 37.9702C142.666 33.2902 142.106 28.2502 141.626 23.1302C141.546 22.5302 141.426 22.6102 142.026 22.3302C142.946 21.8902 143.706 21.5702 144.546 21.1302C145.386 20.6902 145.506 20.0902 145.546 19.3302C145.586 18.8502 145.266 18.6902 144.786 18.9702C143.826 19.4502 142.946 19.8902 141.666 20.1702C141.186 20.2902 140.986 20.1302 141.026 19.5702C140.746 16.3302 140.226 8.69017 139.226 4.89017C139.226 4.49018 139.186 4.17017 139.426 3.81017C139.586 3.81017 139.826 3.77017 139.946 3.69017C140.306 3.49017 140.546 3.21018 140.546 2.85017C140.546 2.49017 140.186 2.33017 139.946 2.21017C138.786 1.97017 135.626 0.930173 134.466 0.930173C125.466 0.930173 123.186 28.7302 121.826 35.2902C121.746 36.8102 119.786 35.5702 121.546 36.9302C123.106 38.1302 123.506 38.4102 125.186 39.5302C126.826 40.6102 129.466 29.5302 129.826 26.7302C129.866 26.4102 130.066 26.1302 130.586 26.0102ZM138.386 5.05018C137.906 7.61018 138.426 18.0502 138.666 20.2502C138.706 20.4902 138.746 21.0502 138.346 21.1702C137.026 21.8502 132.746 22.5702 131.426 22.9302C131.106 23.0102 130.746 23.3702 130.746 22.6902C130.826 22.3702 130.986 21.3702 131.106 20.9702C131.506 19.5302 135.226 5.25017 138.386 5.05018ZM153.643 35.8102C152.403 35.8102 152.523 36.0102 152.442 34.3302C152.083 27.6502 156.203 3.25017 154.123 0.850174C153.803 0.770175 153.483 0.730174 153.123 0.730174C152.243 0.650175 148.883 5.41018 147.963 5.69017C147.523 5.81017 147.443 5.97018 147.483 6.45017C146.883 8.81017 146.963 37.4502 146.883 38.2102C146.923 38.5702 148.403 41.5702 148.803 41.5702C149.243 42.2502 166.003 36.2902 167.243 36.7302C167.803 36.8902 168.123 36.4502 168.443 36.2102C168.483 36.1702 168.523 36.0502 168.523 35.9702C168.563 35.6102 168.123 35.0102 167.763 34.9302C165.763 34.8102 156.043 35.6102 153.643 35.8102ZM168.096 35.8102C166.856 35.8102 166.976 36.0102 166.896 34.3302C166.536 27.6502 170.656 3.25017 168.576 0.850174C168.256 0.770175 167.936 0.730174 167.576 0.730174C166.696 0.650175 163.336 5.41018 162.416 5.69017C161.976 5.81017 161.896 5.97018 161.936 6.45017C161.336 8.81017 161.416 37.4502 161.336 38.2102C161.376 38.5702 162.856 41.5702 163.256 41.5702C163.696 42.2502 180.456 36.2902 181.696 36.7302C182.256 36.8902 182.576 36.4502 182.896 36.2102C182.936 36.1702 182.976 36.0502 182.976 35.9702C183.016 35.6102 182.576 35.0102 182.216 34.9302C180.216 34.8102 170.496 35.6102 168.096 35.8102Z" fill="#ffff" />
                </svg>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav  ml-auto text-center ">
                    <li class="nav-item mt-3 mt-md-0 ">
                        <a class="nav-link navbar__button text-uppercase " href="#">
                            <svg width="21" height="28" viewBox="0 0 21 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.4 2H4.4C3.07452 2 2 3.07452 2 4.4V23.6C2 24.9255 3.07452 26 4.4 26H16.4C17.7255 26 18.8 24.9255 18.8 23.6V4.4C18.8 3.07452 17.7255 2 16.4 2Z" stroke="#FAFDFE" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M10.3999 21.2002H10.4119" stroke="#FAFDFE" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            Get the app
                        </a>

                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <!-- Masthead -->
    <section id="masthead">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7">
                    <h1 class="text-uppercase mb-3 mb-sm-0 mb-lg-5 text-center text-md-left">Rescuing you from
                        uncomfortable situations
                    </h1>
                    <p class="mb-4  text-center text-md-left ">Be the first to know when RescueCALL is available</p>
                    <form action="index.php" method="POST">
                        <div class="form-row  ">
                            <div class="col-12 col-lg-8">
                                <input type="text" class="form-control form-control-lg 
                                <?php
                                if ($errors['email']) {
                                    echo "is-invalid";
                                } elseif ($ok) {
                                    echo "is-valid";
                                }
                                ?>" placeholder="Email Address" id="email" name="email" aria-describedby="emailHelp" value="<?php echo htmlspecialchars($email); ?>">
                                <div class="invalid-feedback"> <?php echo $errors['email']; ?>
                                </div>
                                <div class="valid-feedback"> <?php echo $ok; ?>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 ">
                                <button class="btn masthead__button btn-lg mt-2 mt-lg-0 btn-block text-uppercase" type="submit" name="submit">
                                    Notify me</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-12 col-md-5 masthead__images d-flex justify-content-end">
                    <img class="img-fluid masthead__mobile" src="./assets/images/masthead/mobile.png" alt="">
                    <!-- 
    <img class="masthead__ellipse" src="./assets/images/masthead/ellipse.png" alt="">
-->
                </div>
            </div>

        </div>
    </section>

    <!-- Masthead -->

    <!-- Functions   -->
    <section id="functions" class="mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5  order-2  d-flex justify-content-center justify-content-md-start   align-items-center ">
                    <img class="img-fluid functions__mobile" src="./assets/images/functions/mobile.svg" alt="">

                </div>
                <div class="col-12 col-md-7 d-flex align-items-center order-1 order-md-2 mb-0 mb-sm-5 ">
                    <div>
                        <span class="functions__title d-flex align-items-center justify-content-between">
                            <img class="functions__separator" src="./assets/images/icons/separator.svg" alt="">
                            <h2 class="d-inline text-center"> What Our AppDoes </h2>
                            <img class="functions__separator" src="./assets/images/icons/separator.svg" alt="">
                        </span>
                        <div class="functions__list d-flex flex-column justify-content-around ">
                            <div class="d-flex flex-row align-items-center  mb-4">
                                <img class="mr-4" src="./assets/images/icons/check.svg" alt="">
                                <p class="mb-0 ">
                                    Determines your state of comfort when you’re with a 2nd party.
                                </p>
                            </div>
                            <div class="d-flex flex-row align-items-center   mb-4">
                                <img class="mr-4" src="./assets/images/icons/check.svg" alt="">
                                <p class="mb-0 ">
                                    Makes an emergency call to your provided contact number to rescue you from the
                                    discussion. </p>
                            </div>
                            <div class="d-flex flex-row align-items-center  mb-4">
                                <img class="mr-4" src="./assets/images/icons/check.svg" alt="">
                                <p class="mb-0 ">
                                    Calls your line repeatedly for five consecutive times when you don’t decline or
                                    accept
                                    the emergency call. </p>
                            </div>
                            <div class="d-flex flex-row align-items-center   mb-4">
                                <img class="mr-4" src="./assets/images/icons/check.svg" alt="">
                                <p class="mb-0 ">
                                    Determines your state of comfort when you’re with a 2nd party.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- Functions  -->

    <!-- Footer  -->
    <footer id="footer" class="pt-4 mt-3">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-center justify-content-lg-start">
                    <img src="./assets/images/logoFooter.svg" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6    text-center order-2 order-md-1 mt-0 mt-md-3 ">
                    <ul class="footer__list d-flex justify-content-center justify-content-lg-start flex-wrap">
                        <li class="text-uppercase mr-2"> copyright</li>
                        <div class="mr-2">
                            |
                        </div>
                        <li class="text-uppercase mr-2"> rescuecall 2020</li>
                        <div class="mr-0 mr-sm-2 d-none d-sm-block">
                            |
                        </div>
                        <li class="text-uppercase"> all right reserved</li>
                    </ul>
                </div>
                <div class="col-12 col-lg-6  align-self-end order-1 order-md-2 mt-3 mt-md-0">
                    <ul class="footer__links d-flex  justify-content-center justify-content-lg-end">
                        <li class="text-uppercase mr-2"> <a href="#">terms of service</a> </li>
                        <div class="mr-2">
                            |
                        </div>
                        <li class="text-uppercase mr-2"> <a href="#">privacy policy</a></li>
                    </ul>
                </div>
            </div>

        </div>

    </footer>
    <!-- Footer  -->

    <!-- Boostrap Js Links -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- Custom Js -->
    <script src="./assets/js/app.js"></script>
</body>

</html>