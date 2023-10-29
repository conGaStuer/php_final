<?php 
include("../Database/database.php");

session_start();
if(isset($_SESSION['username']) && $_SESSION['username'] != "" ) {
    $username = $_SESSION["username"];
}
if(isset($_SESSION['password']) && $_SESSION['password'] != "" ) {
    $password = $_SESSION["password"];
}
echo "Hello" . $username;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/adminPage.css?v=2">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <button class="add" ><a href="../Admin/add.php">Add new items</a></button>

    <table>
        <tr>
            <th>ID</th>
            <th>Item_name</th>
            <th>Item_imageLink</th>
            <th>Item_price</th>
            <th>Item_tag</th>
            <th>Edit</th>
        </tr>
        <?php 
            $sql = "SELECT * from products";
            $result = mysqli_query($conn,$sql);
            if (isset($_POST["delete"])) {
                // Get the ID of the product to delete
                $delete_id = $_POST["delete_id"];
          
                // Delete the product from the database
                $sql_delete = "DELETE FROM products WHERE id = '$delete_id'";
                mysqli_query($conn, $sql_delete);
              }
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><span><?php echo $rows["id"] ?></span></td>
            <td><span><?php echo $rows["item_name"] ?></span></td>
            <td><span><?php echo $rows["image"] ?></span></td>
            <td><span><?php echo $rows["item_price"] ?></span></td>
            <td><span><?php echo $rows["item_tag"] ?></span></td>
            <td>
                <button class="update"><a href="../Admin/update.php?id=<?php echo $rows["id"] ?>">Update</a></button>
                <?php
                $id = $rows["id"];

                echo "<form action='' method='post'>
                <input type='hidden' name='delete_id' value='$id'>
                <button class='delete' type='submit' name= 'delete' >Delete</button>
                </form>" ;
                ?>


            </td>
        </tr>
        <?php  
                    }
                        }

        ?>

    </table>
</body>
</html>
