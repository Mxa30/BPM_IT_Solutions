<?php include "../../meta.php";?>
<title>temp title</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <main>
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
    </main>

    <main>
        <table>
          <thead> items </thead>
          <td> Items</td>
          <td> Merk </td>
          <td> Prijs </td>
          <td> In winkelmandje stoppen </td>
            <tr>
              <td>
                    10 Pennen
              </td>
              <td>
                    BIC
              </td>
              <td>
                  €3,50
              </td>
              <td><form method="POST" action=''>
      <input type="submit" name="Button1"  value="Bestellen">
    </form>
    <?php
      if (isset($_POST['Button1'])) {
        echo "Toegevoegd aan winkelmandje  ";
      }
    ?>
              </td>
            </tr>
            <tr>
              <td>
                  50 Pennenst.
              </td>
              <td>
                    Baron
              </td>
              <td>  €3,50 </td>
              <td><form method="POST" action=''>
      <input type="submit" name="Button2"  value="Bestellen">
    </form>
    <?php
      if (isset($_POST['Button2'])) {
        echo "Toegevoegd aan winkelmandje  ";
      }
    ?>
              </td>
            </tr>
            <tr>
              <td>
                  Printer inkt
              </td>
              <td>
                    CANNON
              </td>
              <td>€21,30 </td>
              <td><form method="POST" action=''>
      <input type="submit" name="Button3"  value="Bestellen">
    </form>
    <?php
      if (isset($_POST['Button3'])) {
        echo "Toegevoegd aan winkelmandje  ";
      }
    ?>
              </td>
            </tr>
            <tr>
              <td>
              Kleur printer inkt
              </td>
              <td>
                    CANNON
              </td>
              <td> €30,30</td>
              <td><form method="POST" action=''>
      <input type="submit" name="Button4"  value="Bestellen">
    </form>
    <?php
      if (isset($_POST['Button4'])) {
        echo "Toegevoegd aan winkelmandje ";
      }
    ?>
              </td>
            </tr>
            <tr>
              <td>
                Potloden
              </td>
              <td>
                    BIC
              </td>
              <td>€1,50 </td>
              <td><form method="POST" action=''>
      <input type="submit" name="Button5"  value="Bestellen">
    </form>
    <?php
      if (isset($_POST['Button5'])) {
        echo "Toegevoegd aan winkelmandje  ";
      }
    ?>
              </td>
            </tr>
            <tr>
              <td>
                  Sticky notes geel
              </td>
              <td>
                    NICEDAY
              </td>
              <td>€4,50 </td>
              <td><form method="POST" action=''>
      <input type="submit" name="Button6"  value="Bestellen">
    </form>
    <?php
      if (isset($_POST['Button6'])) {
        echo "Toegevoegd aan winkelmandje  ";
      }
    ?>
              </td>
            </tr>
            <tr>
              <td>
                A4 papier 100 stuks
              </td>
              <td>
                    NICEDAY
              </td>
              <td>€10,00</td>
              <td><form method="POST" action=''>
      <input type="submit" name="Button7"  value="Bestellen">
    </form>
    <?php
      if (isset($_POST['Button7'])) {
        echo "Toegevoegd aan winkelmandje  ";
      }
    ?>
              </td>
            </tr>
            <tr>
              <td>
                  Printer
              </td>
              <td>
                    CANNON
              </td>
              <td> €100,00</td>
              <td><form method="POST" action=''>
      <input type="submit" name="Button8"  value="Bestellen">
    </form>
    <?php
      if (isset($_POST['Button8'])) {
        echo "Toegevoegd aan winkelmandje  ";
      }
    ?>
              </td>
            </tr>
            <tr>
              <td>
                  Bureaustoel Groen
              </td>
              <td>
                    Topstar
              </td>
              <td>€85,00</td>
              <td><form method="POST" action=''>
      <input type="submit" name="Button9"  value="Bestellen">
    </form>
    <?php
      if (isset($_POST['Button9'])) {
        echo "Toegevoegd aan winkelmandje  ";
      }
    ?>
              </td>
            </tr>
            <tr>
              <td>
                  Bureaustoel Bruin
              </td>
              <td>
                    Topstar
              </td>
              <td>€85,00</td>
              <td><form method="POST" action=''>
      <input type="submit" name="Button10"  value="Bestellen">
    </form>
    <?php
      if (isset($_POST['Button10'])) {
        echo "Toegevoegd aan winkelmandje  ";
      }
    ?>
              </td>
            </tr>
            <tr>
              <td>
                  Bureaustoel Oranje
              </td>
              <td>
                    Topstar
              </td>
              <td>€85,00 </td>
              <td><form method="POST" action=''>
      <input type="submit" name="Button11"  value="Bestellen">
    </form>
    <?php
      if (isset($_POST['Button11'])) {
        echo "Toegevoegd aan winkelmandje  ";
      }
    ?>
              </td>
            </tr>
            <tr>
              <td>
                  Bureaustoel deluxe Groen
              </td>
              <td>
                    Topstar
              </td>
              <td>€185,00 </td>
              <td><form method="POST" action=''>
              <input type="submit" name="Button12"  value="Bestellen">
              </form>
                <?php
                  if (isset($_POST['Button12'])) {
                    echo "Toegevoegd aan winkelmandje  ";
                  }
                ?>
              </td>
            </tr>
            <tr>
              <td>
                  Bureaustoel deluxe Bruin
              </td>
              <td>
                    Topstar
              </td>
              <td>€185,00 </td>
              <td><form method="POST" action=''>
      <input type="submit" name="Button13"  value="Bestellen">
    </form>
    <?php
      if (isset($_POST['Button13'])) {
        echo "Toegevoegd aan winkelmandje  ";
      }
    ?>
              </td>
            </tr>
            <tr>
              <td>
                  Bureaustoel deluxe Oranje
              </td>
              <td>
                    Topstar
              </td>
              <td>€185,00 </td>
              <td><form method="POST" action=''>
      <input type="submit" name="Button14"  value="Bestellen">
    </form>
    <?php
      if (isset($_POST['Button14'])) {
        echo "Toegevoegd aan winkelmandje  ";
      }
    ?>
              </td>
            </tr>
            <tr>
              <td>
                  Whiteboard
              </td>
              <td>
                    Brank
              </td>
              <td>€50,00 </td>
              <td><form method="POST" action=''>
      <input type="submit" name="Button15"  value="Bestellen">
    </form>
    <?php
      if (isset($_POST['Button15'])) {
        echo "Toegevoegd aan winkelmandje  ";
      }
    ?>
              </td>
            </tr>
            <tr>
              <td>
                  Whiteboard
              </td>
              <td>
                    Zeron
              </td>
              <td>€60,00 </td>
              <td><form method="POST" action=''>
      <input type="submit" name="Button16"  value="Bestellen">
    </form>
    <?php
      if (isset($_POST['Button16'])) {
        echo "Toegevoegd aan winkelmandje  ";
      }
    ?>
              </td>
          </tr>
        </table>
    </main>
</body>

</html>
