<?php
session_start();
require_once('./php/component.php');
// require_once('./php/createdb.php');
// require_once('./php/getdata.php');
include 'connect.php';

//Create instance of Createdb class
// $database = new CreateDb($dbname ="Productdb", $tablename ="Producttb");
if(isset($_POST['add']))
{
  //  print_r($_POST['product_id']);
  if(isset($_SESSION['cart'])){

       $item_array_id = array_column($_SESSION['cart'], $column['product_id']);

       if(in_array($_POST['product_id'], $item_array_id)){
            echo '<script>alert("product is already added in the cart")</script>';
            echo '<script>window.location="index.php"</script>';
       }else{
            $count = count($_SESSION['cart']);
            $item_array=array(
              'product_id'=>$_POST['product_id']
            );
            $_SESSION['cart'][$count]=$item_array;
       }

  }else{
    $item_array = array(
        'product_id'=> $_POST['product_id']
    );

    //Create new session variable
    $_SESSION['cart'][0]=$item_array;
    print_r($_SESSION['cart']);
  }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Shopping card</title>
</head>
<body>
    <?php 
    require_once("php/header.php")?>
    <div class="container">
        <div class="row text-center py-5">
        <?php
            // $result =$database->getdata();  
            // While($row =mysqli_fetch_assoc($result)){
            //    component($row['product_name'],$row['product_price'],$row['product_image']);
            // } 
              $sql= "Select * from producttb";
    $result=mysqli_query($conn,$sql);
    if($result){
      while($row=mysqli_fetch_assoc($result)){
          $productid=$row['id'];
          $product_name=$row['product_name'];
          $product_price =$row['product_price'];
          $product_image = $row['product_image'];

          component($product_name,$product_price,$product_image,$productid);

          
      }
    }
    ?>

        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>