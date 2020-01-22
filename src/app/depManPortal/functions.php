<?php
if ($_SESSION['logged'] != true || $_SESSION['is_dept_manager'] != true) {
  $redirectlocation = APP_PATH . "/login/index.php";
  return header("location: {$redirectlocation}");
}

// Get all order requests which are not approved yet
$sqlGetOrder = "
  select O.id, E.name empName, P.name prodName, P.price, O.amount, O.reason
  from _Order O
  inner join Employee E on E.id = O.employee_id
  inner join Product P on P.id = O.prod_id
  where '{$_SESSION['department']}' = E.department_name AND
  O.approved is null;";
  $sqlGetOrderResult = mysqli_query($conn, $sqlGetOrder);

  $getBudget = "select 'budget'
                from department
                where department = '{$_SESSION['department']}';";

$sqlGetBudget = mysqli_query($conn, $getBudget);

  $restBudget = "select 'rest_budget'
                from department
                where department ='{$_SESSION['department']}';";

$sqlGetRestBudget = mysqli_query($conn, $RestBudget);

$_SESSION ['getbudget']= $sqlGetBudget;

$_SESSION ['getrestbudget']= $sqlGetRestBudget;

  function acceptRequest($conn, $orderId, $total) {

  // is budget hoger dan total dan kan je niet accepteren
//   Als accept request is aangeklikt:
//
// rest-budget ophalen uit database en totaal van prijs in geaccepteerd bedrag eraf halen.
//
// rest budget = rest-budget - totaal;
//
//
// naar supplier mail sturen bij accept

    $sqlAcceptOrderQuery = "
    UPDATE `_order`
    SET approved = '1'
    WHERE `id` = '{$orderId}'";

    if (mysqli_query($conn, $sqlAcceptOrderQuery)) {
      //UPDATES
      header("Refresh:0");
    }else{
      echo "Error: " . $sqlAcceptOrderQuery . "<br>" . mysqli_error($conn);
    }

    if ($sqlGetRestBudget){
      $sqlGetRestBudget = $sqlGetRestBudget-$totalPrice;
    }


  }
  // anders kan die wel geaccepteerd worden

  }






//functie totale budget;



  function denyRequest($conn, $orderId, $reason) {

    $sqlAcceptOrderQuery = "
    UPDATE `_order`
    SET approved = '0', deny_reason = '" . $reason . "'
    WHERE `id` = {$orderId};";

    if (mysqli_query($conn, $sqlAcceptOrderQuery)) {
      //UPDATES
      header("Refresh:0");
    }else{
      echo "Error: " . $sqlAcceptOrderQuery . "<br>" . mysqli_error($conn);
    }
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    while($record = mysqli_fetch_assoc($sqlGetOrderResult)){
      if (isset($_POST['accept' . $record['id']])) {
        $total = $record['price'] * $record['aantal'];

        // Call acceptRequest function with the parameters form the according request
        acceptRequest($conn, $record['id'], $total);


      }
      if (isset($_POST['deny' . $record['id']])) {

        if ($_POST['reason' . $record['id']] == 1) {
          $reason = "Recent al gekocht";
          // Call acceptRequest function with the parameters form the according request
          denyRequest($conn, $record['id'],$reason);
        }elseif ($_POST['reason' . $record['id']] == 2) {
          $reason = "Overbodig artikel";
          // Call acceptRequest function with the parameters form the according request
          denyRequest($conn, $record['id'],$reason);
        }elseif ($_POST['reason' . $record['id']] == 3) {
          if (empty($_POST['budgetReason' . $record['id']])) {
            header("Refresh:0");
          }else {
            $reason = $_POST['budgetReason' . $record['id']];
            // Call acceptRequest function with the parameters form the according request
            denyRequest($conn, $record['id'],$reason);
          }
        }elseif ($_POST['reason' . $record['id']] == 4) {
          $reason = "Niet meer leverbaar";
          // Call acceptRequest function with the parameters form the according request
          denyRequest($conn, $record['id'],$reason);
        }elseif ($_POST['reason' . $record['id']] == 5) {
          $reason = "Externe omstandigheden";
          // Call acceptRequest function with the parameters form the according request
          denyRequest($conn, $record['id'],$reason);
        }else {
          header("Refresh:0");
        }
      }
    }
  }
?>
