<h1>Autorising</h1>

<form method="post" action="registr.php">
<input type="text" name="login" placeholder="Логин"><br/><br/>
<input type="password" name="pass"> <br/>
<input type="hidden" name="token" value="<?=$token?>"> <br/>
<input type="submit" value="Войти">
</form>

<br>
<form method="post" action="index.php">
<input type="submit" value="IN HOME">
</form>
