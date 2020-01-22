<?php
include "../../meta.php";
include "functions.php";
?>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<!--<main>
        <div id="ItemLijstID">
            <div class="ItemsHead">
                <h2>Items</h2>
                <form id="searchFormID">
                    <input type="text" name="search" placeholder="Zoeken" id="searchInputID">
                    <button type="submit" name="submit" id="searchButtonID"> Zoeken

                    </button>
                </form>
            </div>
            <div id="ItemTableContain">
                <table id="ItemViewTableID">

                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        <div id="ItemFormID">
            <div class="ItemHead">
                <h2>Item toevoegen</h2>
            </div>
            <div id="ItemFormContainID">
                <form method="post">
                    <table id="InputFormID">
                        <tr>
                            <td>Item:</td>
                            <td><input type="text" name="ItemNr"></td>
                        </tr>
                        <tr>
                            <td>Prijs:</td>
                            <td>

                                <input type="text" name="search" placeholder="Vul prijs in" id="searchInputID">
                                <button type="submit" name="submit" id="searchButtonID"> Item toevoegen
                            </td>
                        </tr>

                    </table>
                </form>
                <p id="noticeParID">Als het Itemnummer al bestaat in de database zal
                    deze worden geüpdate met de nieuwe waarden of worden verwijderd.</p>
            </div>
        </div>
    </main> -->

    <main>
      <div class="prodContainer">
        <h2>Producten</h2>
        <table>
          <thead>
            <th> Product</th>
            <th> Leverancier </th>
            <th> Prijs </th>
            <th> Actie </th>
          </thead>
          <?php
          $options = "";
          for ($i=1; $i <= 50; $i++) {
            $options .= ("<option value='{$i}'>{$i}</option>");
          }
          if ($sqlGetProdResult) {
            while($record = mysqli_fetch_assoc($sqlGetProdResult)){
              echo (
                "<tr>
                  <td>{$record['name']}</td>
                  <td>{$record['supplier']}</td>
                  <td>{$record['price']}</td>
                  <td>
                    <form method='post'>
                      <select name='amount{$record['id']}'>{$options}</select>
                      <input type='submit' name='button{$record['id']}' value='Add to cart'>
                      <textarea name="comment" rows="5" cols="40"></textarea>

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
            <thead>
              <th> Product</th>
              <th> Leverancier </th>
              <th> Prijs </th>
              <th> Aantal </th>
            </thead>
            <?php
            if (empty($cart)) { //If cart is empty, show empty cart
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
              foreach ($cart as $prod) {
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
                  <td>{$prod['supplier']}</td>
                  <td>{$prod['price']}</td>
                  <td>
                    <form method='post'>
                    <select name='amountCart{$prod['id']}'>{$options}</select>
                    </form>
                  </td>
                  </tr>"
                );
              }
            }
            ?>
          </table>
          <?php
            if (!empty($cart)) { //If cart is empty, show empty cart
              echo (
                "<form class='sendReqForm' method='post'>
                  <input type='submit' name='submitRequest' value='Stuur koop-verzoek'>
                </form>"
              );
            }
          ?>

        </div>
    </main>
</body>

</html>
