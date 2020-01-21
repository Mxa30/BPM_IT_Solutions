<?php
  if ($_SESSION['logged'] != true) {
    $redirectlocation = APP_PATH . "/login/index.php";
    return header("location: {$redirectlocation}");
  }

  // SQL QUERYS
  // Get all products
  $sqlGetProd = "
  select id, name, price, supplier
  from Product
  order by id desc;";
  $sqlGetProdResult = mysqli_query($conn, $sqlGetProd);

  // Get outgoing orders
  $sqlGetOrder = "
    select O.id, P.name, P.price, O.amount, O.reason, O.approved, O.deny_reason, O.deliverd
    from _Order O
    inner join Product P on P.id = O.prod_id
    where '{$_SESSION['employee_id']}' = O.employee_id AND
    O.picked_up is null;";
    $sqlGetOrderResult = mysqli_query($conn, $sqlGetOrder);

  // Initialize cart in global scope
  //$cart = [["id"=>1,"name"=>"Pen","supplier"=>"BIC", "price"=>15, "amount"=>12],["id"=>1,"name"=>"Printer","supplier"=>"Canon", "price"=>99.85, "amount"=>1]];
  if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
  }
  function addToCart($id, $name, $supplier, $price, $amount) {
    // loop trough already existing cart items
    foreach ($_SESSION['cart'] as $key => $prod) {
      if ($prod['id'] == $id) { // If item is already in cart add selected amount to cart
        $_SESSION['cart'][$key]['amount'] = $_SESSION['cart'][$key]['amount'] + $amount;
        return getCart();
      }
    }
    // If the cart doesn't have the selected item, add it to the cart
    array_push($_SESSION['cart'], ["id"=>$id, "name"=>$name, "supplier"=>$supplier, "price"=>$price, "amount"=>$amount]);
    return getCart();
  }

  // Get the cart array
  function getCart() {
    return $_SESSION['cart'];
  }

  // Send products in cart to Order table in database
  // function submitCart($conn,$reason) {
  //   $cart = getCart();
  //   foreach ($cart as $key => $prod) {
  //     $sqlPostOrderQuery = "
  //     INSERT INTO `_order` (`prod_id`, `amount`, `employee_id`, `reason`)
  //     VALUES ('{$prod['id']}', '{$_POST['amountCart' . $prod['id']]}', '{$_SESSION['employee_id']}','{$reason}');";
  //
  //     if (mysqli_query($conn, $sqlPostOrderQuery)) {
  //       $_SESSION['cart'] = [];
  //       echo "<script type='text/javascript'>alert('Verzoek verstuurd');</script>";
  //     }else{
  //       echo "Error: " . $sqlPostOrderQuery . "<br>" . mysqli_error($conn);
  //     }
  //   }
  // }

  function submitCart($conn,$prod,$reason) {
      $sqlPostOrderQuery = "
      INSERT INTO `_order` (`prod_id`, `amount`, `employee_id`, `reason`)
      VALUES ('{$prod['id']}', '{$_POST['amountCart' . $prod['id']]}', '{$_SESSION['employee_id']}','{$reason}');";

      if (mysqli_query($conn, $sqlPostOrderQuery)) {
        // echo "<script type='text/javascript'>alert('Verzoek verstuurd');</script>";
      }else{
        echo "Error: " . $sqlPostOrderQuery . "<br>" . mysqli_error($conn);
      }
  }

  // Find the rigth post request for calling the functions
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    while($record = mysqli_fetch_assoc($sqlGetProdResult)){
      if (isset($_POST['button' . $record['id']])) {
        // Call addToCart function with the parameters form the according product
        addToCart($record['id'], $record['name'], $record['supplier'], $record['price'], $_POST['amount' . $record['id']]);
      }
      if (isset($_POST['submitRequest'])) {
        // Call the function submitCart if the button "Stuur koop-verzoek" is pressed
        foreach ($_SESSION['cart'] as $prod) {
          submitCart($conn,$prod,$_POST['reason' . $prod['id']]);
        }
        $_SESSION['cart'] = [];
        header("Refresh:0");
      }
    }
  }
?>
