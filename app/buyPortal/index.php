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
                    <button type="submit" name="submit" id="searchButtonID">

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
                                <select name="Prijs">
                                    <?php
                      echo "Prijs <br />";
                  ?>
                                </select>
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
            <tr>
                <td>
                    Pennen €3,50 BIC
                </td>
                <td>
                    Printer inkt €21,30 CANNON
                </td>
                <td>
                    A4 papier 100 stuks €10,00 NICEDAY
                </td>
            </tr>
            <tr>
                <td>
                    Kleur printer inkt €30,30 CANNON
                </td>
                <td>
                    Potloden €1,50 BIC
                </td>
                <td>
                    Sticky notes geel €4,50 NICEDAY
                </td>
            </tr>
        </table>
    </main>
</body>

</html>