<?php
// Formulardaten empfangen und validieren
if (isset($_POST["name"]) && isset($_POST["datum"]) && isset($_POST["anzahl"]) && isset($_FILES["bild"])) {
  // Name, Datum und Anzahl auslesen
  $name = $_POST["name"];
  $datum = $_POST["datum"];
  $anzahl = $_POST["anzahl"];

  // Bild auslesen und überprüfen
  $bild = $_FILES["bild"];
  if ($bild["error"] == 0) { // Kein Fehler beim Hochladen
    if (getimagesize($bild["tmp_name"])) { // Gültige Bilddatei
      // Bild in einen Ordner auf dem Server hochladen
      $ordner = "bilder/"; // Zielordner für Bilder
      $dateiname = basename($bild["name"]); // Originaler Dateiname des Bildes
      $ziel = $ordner . $dateiname; // Vollständiger Pfad zum Zielort des Bildes

      // Überprüfen ob Dateiname schon existiert
      if (!file_exists($ziel)) {
        // Versuchen das Bild zu verschieben
        if (move_uploaded_file($bild["tmp_name"], $ziel)) {
          // Erfolgsmeldung anzeigen
          echo "Bild erfolgreich hochgeladen.<br>";
        } else {
          // Fehlermeldung anzeigen und abbrechen
          die("Fehler beim Verschieben des Bildes.<br>");
        }
      } else {
        // Fehlermeldung anzeigen und abbrechen
        die("Dateiname schon vorhanden.<br>");
      }
    } else {
      // Fehlermeldung anzeigen und abbrechen
      die("Keine gültige Bilddatei.<br>");
    }
  } else {
    // Fehlermeldung anzeigen und abbrechen
    die("Fehler beim Hochladen des Bildes.<br>");
  }

  // Verbindung zur Datenbank herstellen
require_once('config.php');
$conn = new mysqli($hostName, $userName, $password, $databaseName);
// Verbindung überprüfen
if ($conn->connect_error) {
die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

// SQL-Abfrage schreiben um einen neuen Eintrag in die Tabelle speisen einzufügen
$sql = "INSERT INTO speisen (name, bild, datum, anzahl) VALUES (?, ?, ?, ?)";

// Abfrage vorbereiten und ausführen
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $name, $ziel, $datum, $anzahl); // s steht für string (Zeichenkette), i steht für integer (ganze Zahl)
$stmt->execute();

// Überprüfen ob Einfügen erfolgreich war
if ($stmt->affected_rows > 0) {
  // Erfolgsmeldung anzeigen
  session_start();
      $_SESSION["mealadded"] = "true";
      header('Location: admin.php');
} else {
  // Fehlermeldung anzeigen
  echo "Fehler beim Einstellen der Speise.<br>";
}

// Verbindung schließen
$stmt->close();
$conn->close();
}

?>
