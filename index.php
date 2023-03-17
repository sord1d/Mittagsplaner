<?php
require_once('config.php');
require_once('header.php');

  session_start();
if (isset($_SESSION["mealselected"])) {

  echo "<div class = 'successMSG'>";
  echo $choiceSuccess;
  echo '</div>';
  unset($_SESSION["mealselected"]);
  header("Refresh:5; url=index.php");
   }

$conn = new mysqli($hostName, $userName, $password, $databaseName);
// Verbindung überprüfen
if ($conn->connect_error) {
  die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

// SQL-Abfrage schreiben
$sql = "SELECT * FROM speisen WHERE datum = '" . date("Y-m-d") . "'";
// Abfrage ausführen und Ergebnis speichern
$result = $conn->query($sql);

// Überprüfen ob Ergebnis gültig ist
if ($result && $result->num_rows > 0) {
  // HTML-Tabelle erstellen
  echo "<table class='table table-striped table-bordered table-dark topmargin'>";
  echo "<tr>";
#  echo "<th>ID</th>";
  echo "<th>". $mealName ."</th>";
#  echo "<th>Datum</th>";
  echo "<th>". $mealQuantity ."</th>";
  echo "<th>". $mealPicture ."</th>";
  echo "<th>". $mealChoose ."</th>";

  echo "</tr>";

  echo '<form action="abstimmen.php" method="get">';

  // Durch jede Zeile des Ergebnisses gehen
  while ($row = $result->fetch_assoc()) {
    // Werte in Tabellenzellen anzeigen
    echo "<tr>";
#    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["name"] . "</td>";
#    echo "<td>" . $row["datum"] . "</td>";
    echo "<td>" . $row["anzahl"] . "</td>";
    echo "<td> <img src ='" . $row["bild"] . "' width ='400' height = '200'></td>";
    echo "<td><button type='submit' class='btn btn-primary' name='id' value='". $row["id"] ."'>". $mealChoose ."</button></td>";
    echo "</tr>";
  }

  // HTML-Tabelle schließen
  echo "</table>";

} else {
  // Keine Daten gefunden
  echo $noMealToday;
}

// Verbindung schließen
$conn->close();

require_once('footer.php');
?>
