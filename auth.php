<h1>Registr</h1>

<form method="post" action="registr1.php">
<input type="text" name="login" placeholder="Логин"><br/><br/>
<input type="password" name="pass"> <br/>
<input type="hidden" name="token" value="<?=$token?>"> <br/>
<input type="submit" value="Войти">
</form>

<br>
<form method="post" action="vk.php">
<input type="submit" value="Autorising VK">
</form>