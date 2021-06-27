<?php

session_start();
$localhost = '127.0.0.1:3305';
$my_user = 'root';
$my_password = 'root';
$my_db = 'security';

$log = $_POST["login"];
$pas = $_POST["pass"];
//echo $log."<br>";
//echo $pas."<br>";

$db = new PDO("mysql:host=$localhost;dbname=$my_db",$my_user,$my_password);
$stmt = $db->query("SELECT * FROM users WHERE LOGIN = '$log'");
$result = $stmt->FETCH(PDO::FETCH_LAZY);
//var_dump("REZULT ".$result->USER_ID);
//var_dump("REZULT ".$result[0]);
//$row = $result->FETCH(PDO::FETCH_LAZY);
//    echo 'Category name: '.$row->LOGIN;
include 'logger.php';
if($result[0] == 0 || $result[0] == ""){
$token = hash('gost-crypto', random_int(0,999999));
//$_SESSION["CSRF"] = $token;

if (!empty($log) & !empty($pas)){
	//$pt = $pas.$token;
    $stmt = $db->prepare("INSERT INTO users (LOGIN, PASSWORD) VALUES (:name, :pass)");
$stmt->bindParam(':name', $log);
$stmt->bindParam(':pass', $pas);

$stmt->execute();

if ($stmt) {
	echo 'Данные успешно добавлены в таблицу';
	$_SESSION['user'] = 1;
  } else {
	echo 'Произошла ошибка:';
	$log->error('Ошибка данные в БД не добавлены!');
		}
}
else{
echo "Вы не ввели логин или пароль!";
$log->warning('Предупреждение! Вы не ввели логин или пароль!');
}
}
else{
	echo "<h3>Такой пользователь уже зарегистрирован, пройдите Авторизацию!</h3>";
	$log->warning('Предупреждение! Такой пользователь уже зарегистрирован, пройдите Авторизацию!');
	};
	//echo $token."<br>";
?>