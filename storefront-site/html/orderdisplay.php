<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Returns</title>
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/google-material-icons.css">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/privacy-policy.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT']."/html/header.php";?>
    <?php include $_SERVER['DOCUMENT_ROOT']."/php/order.php";?>
    <main>
        <div class="grid-container">
            <div class="sidebar">
                <nav class="sidebar-nav">
                    <span style="font-size: 1.2em;">Information</span>
                    <hr>
                    <ul>
                        <li>
                            <a href="./faq.php">FAQ</a>
                        </li>
                        <li>
                            <a href="./locations.php">Locations and Hours</a>
                        </li>
                        <li>
                            <b>Return Policy</b>
                        </li>
                        <li>
                            <a href="./shipping.php">Shipping</a>
                        </li>
                    </ul>
                </nav>
            </div>  
        </div>
        <table>
         <?php
         while($db = mysqli_fetch_Array($orders)){ ?> <tr> <?php
             while ($cart = mysqli_fetch_field($orders)){                
                 echo $product; 
                echo $productquantity; 
                echo $totalprice
             }
         }
         ?>
        </table>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT']."/html/footer.php";?>
    <script src="../scripts/render-cart-quantity.js" type="module"></script>
</body>

</html>