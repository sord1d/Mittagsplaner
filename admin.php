<!-- HTML Formular mit Bootstrap Klassen -->
<?php require_once('header.php'); ?>

<form action="eintragen.php" method="post" enctype="multipart/form-data" class="container bg-dark text-center text-white">
  <!-- Name der Speise -->
  <div class="form-group">
    <label for="name">Name der Speise:</label>
    <input type="text" name="name" id="name" class="form-control" required>
  </div>
  <!-- Datum -->
  <div class="form-group">
    <label for="datum">Datum:</label>
    <input type="date" name="datum" id="datum" class="form-control" required>
  </div>
  <!-- Anzahl -->
  <div class="form-group">
    <label for="anzahl">Anzahl:</label>
    <input type="number" name="anzahl" id="anzahl" min="0" class="form-control" required>
  </div>
  <!-- Bild -->
  <div class="form-group">
    <label for="bild">Bild:</label>
    <input type="file" name ="bild"id ="bild"class ="form-control-file accept ="image/* "required >
   </div >
   <!-- Submit Button -->
   <button type ="submit "value ="Speise einstellen "class ="btn btn-primary ">Speise einstellen</button >
</form >
<?php require_once('footer.php'); ?>
