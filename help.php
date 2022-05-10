<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="help.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <title>Help Links</title>
</head>

<body class="bg">
    <?php include("bootstrap.php");?>
    <section class="contact">
        <div class="content">
            <h2>Contact Us</h2>
            <p>You can contact us directly via information below. We will reponse within 24 hours</p>
        </div>
        <div class="container">
            <div class="contactInfo">
                <div class="box">
                    <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Address</h3>
                        <p>702 Nguyen Van Linh District 7,<br> Ho Chi Minh City</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Phone</h3>
                        <p>0911261439</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Email</h3>
                        <p>InstaKilogram@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="contactForm">
                <form>
                    <h2>Send Message</h2>
                    <div class="inputBox">
                        <input type="text" name="" require="required">
                        <span>Full name</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="" require="required">
                        <span>Email</span>
                    </div>
                    <div class="inputBox">
                        <textarea require="required"></textarea>
                        <span>Type your Message</span>
                    </div>
                    <div class="inputBox">
                        <input type="submit" name="" value="Send">
                    </div>
                </form>
            </div>
        </div>
        <?php include("footer.php")?>
    </section>

</body>

</html>