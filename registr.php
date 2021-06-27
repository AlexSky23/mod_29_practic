<?php
session_start();
include 'logger.php';
	if($_POST["token"] == $_SESSION["CSRF"])
	{
if((isset($_POST["login"])) && (isset($_POST["pass"])))
{
    $localhost = '127.0.0.1:3305';
    $my_user = 'root';
    $my_password = 'root';
    $my_db = 'security';
    
	$link = mysqli_connect($localhost, $my_user, $my_password, $my_db);
$result = mysqli_query($link, "SELECT * FROM users WHERE LOGIN='". $_POST["login"]. "' 
AND PASSWORD='". $_POST["pass"]. "'");

//Внимание, в реальных проектах необходимо обезопасить 
//содержимое POST, прежде чем отправлять его в запрос

if(mysqli_num_rows($result) >0)
{
	// логин и пароль нашли
	//$_SESSION["isauth"] = true;
	echo 'log and pass OK! действия разрешены!';
	$_SESSION['user'] = 1;
	var_dump($_SESSION);
}
else
{
	//Отображаем сообщение, что логин и пароль не найдены
echo 'log and pass LOSS!';
$log->warning('Предупреждение! log and pass LOSS!');
}

}
	}
	else{
		echo 'no token!!!';
	}
?>

<br>
<form method="post" action="index.php">
<input type="submit" value="IN HOME">
</form>