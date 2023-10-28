<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/add.css?v=2">
    <title>Document</title>
</head>
<body>
<?php 
    include("../Database/database.php");


    $id = $_GET["id"];

    if($_SERVER["REQUEST_METHOD"]=="POST" ){
        $id_new = $_POST["id"];
        $item_name = $_POST["item_name"];
        $image = $_POST["image"];
        $item_price = $_POST["item_price"];
        $item_tag = $_POST["item_tag"];
        $sql_update = "UPDATE products set 
        id = '  $id_new',
        item_name = ' $item_name',
        image = ' $image ',
        item_price = '$item_price',
        item_tag = '$item_tag' where id = '$id'
        " ;
        $result = mysqli_query($conn, $sql_update);
        if($result) {
            header("Location: ../Admin/adminPage.php");
        } else {
            echo "Add error!!" ;
        }
    }
    ?>
<div class="overlay">
    <i class="fa-solid fa-x" onCLick="closeX()"></i>
    </div>
    <?php         $sql_select = "SELECT * FROM products WHERE id = '$id'";
        $result_select = mysqli_query($conn, $sql_select);
      
        // Fetch the updated data using the mysqli_fetch_assoc() function.
        $row = mysqli_fetch_assoc($result_select); ?>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
    
        <div>
                <label for="">ID</label>
                <input type="text" name="id" id="" value=<?php echo $id ?>>

          
        </div>
        <div>
                <label for="">Item_name</label>
                <input type="text" name="item_name" id=""  value="<?php echo $row["item_name"]; ?>"  >
        </div>
        <div>
                <label for="">Item_imageLink</label>
                <input type="text" name="image" id="" value="<?php echo $row["image"]; ?>" >
        </div>
        <div>
                <label for="">Item_price</label>
                <input type="text" name="item_price" id="" value="<?php echo $row["item_price"]; ?>">
        </div>
        <div>
                <label for="">Item_tag</label>
                <input type="text" name="item_tag" id="" value="<?php echo $row["item_tag"]; ?>">
        </div>
        <button>Save</button>
    </form>

</body>
</html>
