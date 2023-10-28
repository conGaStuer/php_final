<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/shop.css?v=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>  
<div class="side-bar">

    <i class="fa-solid fa-x" onClick="onClickSideBar()"></i>
        <ul>
        <li><a href="../Views/Home.php">Home</a></li>
        <li><a href="../Views/Shop.php">Shop</a></li>
        <li><a href="../Views/Aboutus.php">About us</a></li>
        <li><a href="../Views/Contact.php">Contact us</a></li>
        </ul>
    </div>
    <div class="overlay">

    </div>
        <div class="nav-side">
            <div class="nav-bar">
                <div class="nav-menu">
                    <i class="fa-solid fa-bars" onClick="menu()"></i>
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" name="search" id="">
                </div>
                <img src="../assets/logo.png" alt="" width="200px" class="logo">
                <div class="nav-user">
                <i class="fa-regular fa-user"></i>
                <i class="fa-regular fa-heart"></i>
                <a href="../Views/Cart.php"><i class="fa-solid fa-cart-shopping"></i></a> 
                </div>
            </div>
        </div>
    <section>
        <div class="filter-side"></div>
        <div class="products-side">
        <?php 
        include("../Database/database.php");
            $sql = "SELECT * from products";
            $result = mysqli_query($conn,$sql);
            
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)){
                    ?> 
                <a href="../Views/Product.php?id=<?php echo $rows["id"] ?>">
                <div class="product" >
                    <img src="<?php echo $rows["image"] ?>" alt="" class="img" width="310px" height="400px">
                    <div class="item_name" style="font-size: 20px ;position: relative; top: 10px;"  >
                    <?php echo $rows["item_name"] ?>
                </div>
                    <div class="item_price" style="font-weight: bold;position: relative;top: 10px;" >
                    <?php echo "$" . " " .  $rows["item_price"] ?>
                </div>
                </div>
                </a>
                <?php
                }
            }
            ?>
        </div>
    </section>
</body>
</html>
<script>
        const sideBar = document.getElementsByClassName("side-bar")[0];
    const overlay =  document.getElementsByClassName("overlay")[0];
    const navSide = document.getElementsByClassName("nav-side")[0];
    const onClickSideBar = () => {
        sideBar.style.left = "-300px";
        navSide.style.display = "flex";
        overlay.style.opacity = 0;
        overlay.style.zIndex = -2;
    }
    const menu = () => {
        sideBar.style.left = "0px";
        overlay.style.opacity = 1;
        overlay.style.zIndex = 2;
        navSide.style.display = "none";
    }


</script>