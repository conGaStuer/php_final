<?php 
include("../Database/database.php");

session_start();
if(isset($_SESSION['username']) && $_SESSION['username'] != "" ) {
    $username = $_SESSION["username"];
}
if(isset($_SESSION['password']) && $_SESSION['password'] != "" ) {
    $password = $_SESSION["password"];
}
if($username != "") {
    echo "<div class='user-bar'> WELCOME TO noon'i
    " . "  " .  $username . " " . "<a href='../Authen/logout.php' ; >Log out</a></div>
    ";
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>

    <section class="section-1">
        <div class="nav-side">
            <div class="nav-bar">
                <div class="nav-menu">
                    <i class="fa-solid fa-bars"></i>
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" name="search" id="">
                </div>
                <img src="../assets/logo.png" alt="" width="200px" class="logo">
                <div class="nav-user">
                <i class="fa-regular fa-user"></i>
                <i class="fa-regular fa-heart"></i>
                <i class="fa-solid fa-cart-shopping"></i>
                </div>
            </div>
        </div>
        <div class="home-content">
            <div class="content-text">
                <h4>NEW ARRIVALS</h4>
                <h3>
                    Chairs & Seating You'll Love
                </h3>
                <span>Free Standard shipping with $35</span>
                <a>SHOP NOW</a>
            </div>
            <div class="content-image">

            </div>
        </div>
    </section>
    <section class="section-2">
        <div class="sale-info__side">
            <div class="sale-info__side-1">
                <div class=sale-1>
                    <p>Up to 40% off</p>
                    <p>Top Lamp Brands</p>
                    <a href="">SHOP NOW</a>
                </div>
                <div class="sale-2">
                    <p>NEW PRODUCTS</p>
                    <span>Up to 25% Off Cabinets</span><br>
                    <a href="">SHOP NOW</a>
                </div>
            </div>
            <div class="sale-info__side-2">
                <div class="side-2__text">
                    <p class="bigsale" >BIG SALE</p><br>
                    <span>Up to 70% Off</span><br>
                    <span>Furniture $</span><br>
                    <span>Decor</span>
                    <a href="">SHOP NOW</a>
                </div>
            </div>
        </div>
    </section>
    <div class="banner">
        <p>10%</p>
        <div>
            <h3>Get More Pay Less</h3>
            <span>On orders $500 + Use Coupon Code: <b>WSD10</b></span>
        </div>
    </div>
    <section class="section-3">
        <div class="section-3_container">
            <?php 
            $sql = "SELECT * from furnitures_item";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)){
                echo "<div class='item'>" . $rows["id"].  "<br>" .
                $rows["item_name"].  "<br> " .
                $rows["item_price"].  "<br> "
                 .  "</div>" ;
                }
            }
            ?>


        </div>
    </section>
</body>
</html>
<script>
    var slideUp = {
    distance: '150%',
    origin: 'bottom',
    opacity: null,
    delay:500
};
    var slideRight = {
        distance: '120%',
        origin: 'left',
        opacity: null,
        delay:1000
    };
    ScrollReveal().reveal('.content-text', slideUp);
    ScrollReveal().reveal('.content-image', slideRight);
    ScrollReveal().reveal('.section-2');
    ScrollReveal().reveal('.sale-info__side-1', { delay: 500 });
    ScrollReveal().reveal('.sale-info__side-2', { delay: 1000 });
    ScrollReveal().reveal('.banner' ,{ delay: 500 });
</script>
<?php
mysqli_close($conn);
?> 
