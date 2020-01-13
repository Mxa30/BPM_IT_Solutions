<title>temp title</title>
<link rel="stylesheet"  type="text/css" href="style.css">
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
</body>
</html>
