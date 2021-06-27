<?php
session_start();
//var_dump($_SESSION);
?>
<!DOCTYPE html>
<h1>Закрытая страница!</h1>

<h2>Приветствую на закрытой странице, её могут видеть только авторизированные пользователи!</h2>

<?php
if($_SESSION["CSRF"]){
echo '
<img width="500 px" src="/img/welcam.png" alt="welcom">
<br>
<img width="500 px" src="/img/vk.jpg" alt="vk">
';}
else{
    echo 'Изображение доступно только для пользователей авторизированных через VK.';
}
?>
<br> <br>
<form method="post" action="index.php">
<input type="submit" value="IN HOME">
</form>