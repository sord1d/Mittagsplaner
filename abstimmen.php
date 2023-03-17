<?php
require_once('config.php');
$conn = new mysqli($hostName, $userName, $password, $databaseName);
// Verbindung überprüfen
if ($conn->connect_error) {
  die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

// ID der Mahlzeit aus dem Parameter holen
$id = $_GET["id"];

// SQL-Abfrage schreiben, um die Anzahl um eins zu erhöhen
$sql = "UPDATE speisen SET anzahl = anzahl + 1 WHERE id = ?";

// Abfrage vorbereiten und ausführen
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id); // i steht für integer (ganze Zahl)
$stmt->execute();

// Überprüfen ob Update erfolgreich war
if ($stmt->affected_rows > 0) {
  // Erfolgsmeldung anzeigen
  echo "Vielen Dank für Ihre Stimme!";
} else {
  // Fehlermeldung anzeigen
  echo "Es ist ein Fehler aufgetreten. Bitte versuchen Sie es später noch einmal.";
}

// Verbindung schließen
$stmt->close();
$conn->close();
?>
