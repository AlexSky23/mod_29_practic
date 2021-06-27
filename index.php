<?php
session_start();
//var_dump($_SESSION);
if(!$_SESSION){
$_SESSION['user'] = 0;
}
echo '<br>';
//var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Security</title>
      </head>
      <body>
<h1>Index</h1>
<br>
<form method="POST" name="Registr" action="auth.php">

    <input type="submit" value="Registr">
</form>
<br>
<form method="POST" name="Autorising" action="Autorising.php">

    <input type="submit" value="Autorising">
</form>

<br>
<form method="post" action="a_off.php">
<input type="submit" value="Autorising OFF">
</form>
<br>

<?php
if($_SESSION['user'] == 0 || !$_SESSION){
echo "<button disabled> Доступ к закрытой странице </button>";
}
else{
  echo '<form method="post" action="close.php">
  <input type="submit" value="Доступ к закрытой странице">
  </form>';
}
?>

      </body>
    </html>
