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
      <table>
        <thead>
          <td>Order ID</td>
          <td>Naam</td>
          <td>Department</td>
          <td>Product</td>
          <td>Aantal</td>
          <td>Actie</td>
        </thead>
        <tbody>
          <td>1</td>
          <td>Max van der Velde</td>
          <td>Logistics</td>
          <td>Laptop</td>
          <td>3</td>
          <td>asd</td>
        </tbody>
      </table>
    </main>
</body>

</html>
