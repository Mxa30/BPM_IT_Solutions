<?php
  // SQL QUERYS
  // Get all products
  $sqlGetProd = "
  select id, name, supplier, price
  from Product
  order by id desc;";
  $sqlGetProdResult = mysqli_query($conn, $sqlGetProd);

  // Initialize cart in global scope
  $cart = [["id"=>1,"name"=>"Pen","supplier"=>"BIC", "price"=>15, "amount"=>12],["id"=>1,"name"=>"Printer","supplier"=>"Canon", "price"=>99.85, "amount"=>1]];
  function addToCart($conn, $id, $name, $supplier, $price, $amount) {
    // loop trough already existing cart items
    global $cart;
    foreach ($cart as $key => $prod) {
      if ($key['id'] == $id) { // If item is already in cart add selected amount to cart
        $cart[$key]['amount'] = $cart[$key]['amount'] + $amount;
        return getCart();
      }
    }
    // If the cart doesn't have the selected item, add it to the cart
    array_push($cart, ["id"=>$id, "name"=>$name, "supplier"=>$supplier, "price"=>$price, "amount"=>$amount]);
    return getCart();
  }

  // Get the cart array
  function getCart() {
    global $cart;
    return $cart;
  }

  // Send products in cart to Order table in database
  function submitCart($conn) {
    $cart = getCart();
    foreach ($cart as $key => $prod) {
      $sqlPostOrderQuery = "
      insert into Order (employee_name,employee_department,prod_id)
      values ";

      if (mysqli_query($conn, $sqlPostOrderQuery)) {
        // Added successfully
      }else{
        echo "Error: " . $sqlPostOrderQuery . "<br>" . mysqli_error($conn);
      }
    }
  }

  // Find the rigth post request for calling the functions
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    while($record = mysqli_fetch_assoc($sqlGetProdResult)){
      if (isset($_POST['button' . $record['id']])) {
        // Call addToCart function with the parameters form the according product
        addToCart($conn, $record['id'], $record['name'], $record['supplier'], $record['price'], $_POST['amount' . $record['id']]);
      }
    }
    if (isset($_POST['submitRequest'])) {
      // Call the function submitCart if the button "Stuur koop-verzoek" is pressed
      submitCart($conn);
    }
  }
?>
