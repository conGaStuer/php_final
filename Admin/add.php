<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/add.css?v=2">
    <title>Document</title>
</head>
<body>
<div class="overlay">
    <i class="fa-solid fa-x" onCLick="closeX()"></i>
    </div>

    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">

        <div>
                <label for="">ID</label>
                <input type="text" name="id" id="">
        </div>
        <div>
                <label for="">Item_name</label>
                <input type="text" name="item_name" id="">
        </div>
        <div>
                <label for="">Item_imageLink</label>
                <input type="text" name="image" id="">
        </div>
        <div>
                <label for="">Item_price</label>
                <input type="text" name="item_price" id="">
        </div>
        <div>
                <label for="">Item_tag</label>
                <input type="text" name="item_tag" id="">
        </div>
        <button>Save</button>
    </form>
    <?php 
    include("../Database/database.php");
    if($_SERVER["REQUEST_METHOD"]=="POST" ){
        $id = $_POST["id"];
        $item_name = $_POST["item_name"];
        $image = $_POST["image"];
        $item_price = $_POST["item_price"];
        $item_tag = $_POST["item_tag"];
        $sql_insert = "INSERT INTO products (id,item_name,image,item_price,item_tag)
        values ('$id','$item_name','$image','$item_price','$item_tag')
        ";
        $result = mysqli_query($conn,$sql_insert);
        if($result) {
            header("Location: ../Admin/adminPage.php");
        } else {
            echo "Add error!!" ;
        }
    }
    ?>
</body>
</html>
