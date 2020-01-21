<?php
include "../../meta.php";
include "functions.php";
?>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php
    // INCLUDE THE HEADER AND IT'S STYLESHEET
      include APP_PATH . "/header/index.php";
      include APP_PATH . "/header/functions.php";
      echo ("<link rel='stylesheet' href='" . APP_PATH . "/header/style.css". "'>");
    ?>
    <main>
        <div class="prodContainer">
          <h2>Producten</h2>
          <table>
            <thead>
              <th> Product</th>
              <th> Prijs </th>
              <th> Actie </th>
            </thead>
            <?php
            $options = "";
            for ($i=1; $i <= 50; $i++) {
              $options .= ("<option value='{$i}'>{$i}</option>");
            }
            if ($sqlGetProdResult) {
              if (!isset($_SESSION['prod'])){
                $prod = [];
                while ($record = mysqli_fetch_assoc($sqlGetProdResult)) {
                  $prod[] = $record;
                }
                $_SESSION['prod'] = $prod;
              }
              foreach($_SESSION['prod'] as $record){
                echo (
                  "<tr>
                    <td>{$record['name']}</td>
                    <td>€{$record['price']}</td>
                    <td>
                      <form method='post'>
                        <select name='amount{$record['id']}'>{$options}</select>
                        <button type='submit' name='button{$record['id']}'>Add to cart</button>
                      </form>
                    </td>
                  </tr>"
                );
              }
            }else {
              echo (
                "<tr>
                  <table class='emptyProd'>
                    <tr>
                      <td>Er zijn op dit moment geen producten beschikbaar</td>
                    </tr>
                  </table>
                </tr>"
              );
            }
            ?>

          </table>
        </div>
        <div class="cartContainer">
            <h2>Cart</h2>
            <table class="cart">
              <form class='sendReqForm' method='post'>
              <thead>
                <th> Product</th>
                <th> Prijs </th>
                <th> Aantal </th>
                <th> Reden </th>
              </thead>
              <?php
              if (empty($_SESSION['cart'])) { //If cart is empty, show empty cart
                echo (
                  "<tr>
                    <table class='emptyCart'>
                      <tr>
                        <td>Cart is leeg, voeg een product toe</td>
                      </tr>
                    </table>
                  </tr>"
                );
              }else { //If cart is not empty, show the containing items
                foreach ($_SESSION['cart'] as $prod) {
                  $options = "";
                  for ($i=1; $i <= 50; $i++) {
                    if ($i != $prod['amount']) {
                      $options .= ("<option value='{$i}'>{$i}</option>");
                    }else {
                      $options .= ("<option selected='selected' value='{$i}'>{$i}</option>");
                    }
                  }
                  echo (
                    "<tr>
                    <td>{$prod['name']}</td>
                    <td>€{$prod['price']}</td>
                    <td>
                      <select name='amountCart{$prod['id']}'>{$options}</select>
                    </td>
                    <td>
                      <textarea name='reason{$prod['id']}' required></textarea>
                    </td>
                    </tr>"
                  );
                }
              }
              ?>
            </table>
            <?php
              if (!empty($_SESSION['cart'])) { //If cart is empty, show empty cart
                echo (
                  "<input class='sendCart' type='submit' name='submitRequest' value='Stuur koop-verzoek'>
                  </form>"
                );
              }
            ?>

          </div>
        <div class="requestContainer">
          <h2>Koopverzoek status</h2>
          <table class="requestTable">
            <thead>
              <th> Product</th>
              <th> Totaalprijs </th>
              <th> Aantal </th>
              <th> Reden </th>
              <th> Status </th>
            </thead>
            <tbody>
              <tr>
                <td>Pen</td>
                <td>$15</td>
                <td>2</td>
                <td>Pennen zijn op</td>
                <td>Afwachtend</td>
              </tr>
            </tbody>
          </table>
        </div>
    </main>
</body>

</html>
