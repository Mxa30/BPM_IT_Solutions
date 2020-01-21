<header>
    <ul class="headerInfo">
        <li><b>Naam:</b> <?php echo($_SESSION['name']) ?></li>
        <li><b>Department:</b> <?php echo($_SESSION['department']) ?></li>
    </ul>
    <ul class="headerNav">
      <a href="<?php echo(APP_PATH . "/buyportal/index.php");  ?>"><li>Koop portaal</li></a>
      <?php
        if ($_SESSION['is_dept_manager']) {
          echo(
            "<a href='" . APP_PATH . "/depmanportal/index.php" . "'><li>Department manager portaal</li></a>"
          );
        }
      ?>
      <form class="logOutForm"method="post">
        <button class="logOutButton" type="submit" name="logOut">
          <li>
            Log uit
          </li>
        </button>
      </form>
    </ul>
</header>
