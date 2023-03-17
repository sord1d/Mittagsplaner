<form action="eintragen.php" method="post" enctype="multipart/form-data">
  Name der Speise: <input type="text" name="name" required><br>
  Datum: <input type="date" name="datum" required><br>
  Anzahl: <input type="number" name="anzahl" min="0" required><br>
  Bild: <input type="file" name="bild" accept="image/*" required><br>
  <input type="submit" value="Speise einstellen">
</form>
