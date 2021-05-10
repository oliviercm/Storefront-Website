<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/google-material-icons.css">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/aboutus.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body class="about-us">
    <?php include $_SERVER['DOCUMENT_ROOT']."/html/header.php";?>
    <main>
        <div class="what-we-do">
            <h2>What We Do</h2>
            <p>We know this is a stressful time, which is why we have created this organization to help you find and buy
                essential supplies. We know how important health and safety is for you and your family. We have made the
                process of buying pandemic supplies easy and fast! We started in 2019 as a response to the COVID-19
                Pandemic. As we reach the light at the end of the tunnel it is important to remember be prepared for future
                pandemics. We hope you'll choose us for your current and future pandemic essential needs! If you have any
                questions feel free to email us at pandemic-essentials@example.com.
            </p>
        </div>
        <h2 class="meet">Meet the Team</h2>
        <div class="team">
            <div class="head-shot"><img src="../images/Jasneil.jpg" width="200px"></div>
            <div class="head-shot"><img src="../images/Jinal.jpg" width="200px"></div>
            <div class="head-shot"><img src="../images/Oliver.jpg" width="200px"></div>
            <div class="head-shot"><img src="../images/Jingxing.jpg" width="200px"></div>
        </div>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT']."/html/footer.php";?>
    <script src="../scripts/render-cart-quantity.js" type="module"></script>
</body>

</html>