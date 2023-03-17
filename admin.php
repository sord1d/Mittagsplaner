<!-- HTML Formular mit Bootstrap Klassen -->
<?php require_once('header.php'); ?>

<?php
  session_start();
if (isset($_SESSION["mealadded"])) {
  ?>
  <div class = "successMSG">
    Die Speise wurde erfolgreich hinzugefügt.
  <?php unset($_SESSION["mealadded"])?>
  </div>
  <?php }?>


<form action="eintragen.php" method="post" enctype="multipart/form-data" class="container bg-dark text-center text-white addmeal">
  <!-- Name der Speise -->
  <div class="form-group">
    <label for="name">Name der Speise:</label>
    <input type="text" name="name" id="name" class="form-control bg-dark text-white" required>
  </div>
  <!-- Datum -->
  <div class="form-group">
    <label for="datum">Datum:</label>
    <input type="date" name="datum" id="datum" class="form-control bg-dark text-white" required>
  </div>
  <!-- Anzahl -->
  <div class="form-group">
    <label for="anzahl">Anzahl:</label>
    <input type="number" name="anzahl" id="anzahl" min="0" max="0" default ="0" class="form-control bg-dark text-white" required>
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
