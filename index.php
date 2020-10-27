<?php

$from_where = $_POST['from_where'];
$to_where = $_POST['to_where'];
$departing = $_POST['departing'];
$returning = $_POST['returning'];
$passengers = $_POST['passengers'];

$id_f = $id;
$plane = $pl;
$arrival = $arrival;
$price = $price;
$flight_time = $x;

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "import";

$db = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($db->connect_error) {
	echo "Нет подключения к БД. Ошибка".mysqli_connect_error();
	exit;
}

function clean($value = "") {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);
    
    return $value;
}

function check_length($value = "", $min, $max) {
    $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
    return !$result;
}

$from_where = clean($from_where);
$to_where = clean($to_where);
$departing = clean($departing);
$returning = clean($returning);
$passengers = clean($passengers);

if(!empty($from_where) && !empty($to_where) && !empty($departing) && !empty($returning) && !empty($passengers)) {

    // $email_validate = filter_var($departing, FILTER_VALIDATE_EMAIL); 

    // if(check_length($from_where, 2, 25) && check_length($to_where, 2, 50) && check_length($departing, 2, 1000) && check_length($returning, 2, 1000) && check_length($returning, 2, 1000)) {
    //     echo "Спасибо за сообщение";
    // } else { // добавили сообщение
    //     echo "Введенные данные некорректны";
    // }
} else { // добавили сообщение
    echo "Заполните пустые поля";
}

$my_data = $db->query("SELECT * FROM flights WHERE ");

$db->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Airport</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="/styles/style.css">
</head>
<body>
	<header>
		<nav class="navbar-nav">
			<ul class="nav-ul">
				<a class="nav-a" href="/">Главная</a>
			</ul>
			<ul class="nav-ul">
				<a class="nav-a" href="/">Регистрация</a>
			</ul>
			<ul class="nav-ul">
				<a class="nav-a" href="/">Результаты поиска</a>
			</ul>
		</nav>
	</header>

	<h1>Домашний экран</h1>
    <div class="conatiner">
    <form action="flights.php" method="POST">
        <div class="container">
        	<label class="ff-label">Откуда (From where) – город или аэропорт вылета</label>
        	<select class="select-prim" name="from_where">
        		<option value="Самара">Самара</option>
        		<option value="Ростов">Ростов</option>
        		<option value="Саратов">Саратов</option>
        		<option value="Перьм">Перьм</option>
        	</select>
        </div>
        <div class="container">
        	<label class="ff-label">Куда (To  where) – город или аэропорт прилета</label>
        	<select class="select-prim" name="to_where">
        		<option value="Самара">Самара</option>
        		<option value="Ростов">Ростов</option>
        		<option value="Саратов">Саратов</option>
        		<option value="Перьм">Перьм</option>
        	</select>
        </div>
        <div class="container">
        	<label class="ff-label">Туда (Departing) – дата вылета</label>
        	<input class="input-prim" type="datetime-local" name="departing">
        </div>
        <div class="container">
        	<label class="ff-label">Обратно (Returning) – дата возвращения обратно</label>
        	<input class="input-prim" type="datetime-local" name="returning">
        </div>
        <br/>
        <div class="container">
        	<label class="ff-label">Количество пассажиров (Passengers) – от 1 до 8</label>
        	<input name="passengers" type="range" min="1" max="8" list="tickmarks">

			<datalist id="tickmarks">
			  <option value="1">
			  <option value="2">
			  <option value="3">
			  <option value="4">
			  <option value="5">
			  <option value="6">
			  <option value="7">
			  <option value="8">
			  
			</datalist>
        </div>
        <br/>
        <div class="container">
        	<button class="btn-primary" type="submit">Найти</button>
        </div>
    </form>
    </div>
    <hr/>
    <div>
    	<form action="" method="POST">
    	<h1>Экран с найденными рейсами</h1>
    	<h4>на данном экране пользователю должен предоставляться список найденных рейсов в зависимости от указанных данных, а также город отправления и прибытия.</h4>
       
    		<div class="container">
        		<label class="ff-label">Номер рейса (Flight)</label>
        		<input class="input-prim" type="text" name="" placeholder="">
        	</div>
        	<div class="container">
        		<label class="ff-label">Самолет (Aircraft)</label>
        		<input class="input-prim" type="text" name="" placeholder="">
        	</div>
        	<div class="container">
        		<label class="ff-label">Дата и время отправления (Date and time of departure)</label>
        		<input class="input-prim" type="text" name="" placeholder="">
        	</div>
        	<div class="container">
        		<label class="ff-label">Время прибытия (Arrival time)</label>
        		<input class="input-prim" type="text" name="" placeholder="">
        	</div>
        	<div class="container">
        		<label class="ff-label">Время в полете (Flight time)</label>
        		<input class="input-prim" type="text" name="" placeholder="">
        	</div>
        	<div class="container">
        		<label class="ff-label">Общую цену, учитывая количество пассажиров (Cost)</label>
        		<input class="input-prim" type="text" name="" placeholder="">
        	</div>
        	<br/>
        	<button class="btn-primary" type="submit">Выбрать</button>
    	</form>
    </div>
    <hr/>
    <div class="container">
    	<form action="" method="POST">
    	<h1>Зарегистрироваться</h1>
       
    		<div class="container">
        		<label class="ff-label">Введите своё имя</label>
        		<input class="input-prim" type="text" name="" placeholder="">
        	</div>
        	<div class="container">
        		<label class="ff-label">Придумайте пароль</label>
        		<input class="input-prim" type="text" name="" placeholder="">
        	</div>
        	<div class="container">
        		<label class="ff-label">Повторите пароль</label>
        		<input class="input-prim" type="text" name="" placeholder="">
        	</div>
    		<br/>
        	<button class="btn-primary" type="submit">Зарегистрироваться</button>
    	</form>
    </div>
    <hr/>
    <footer>
    	
    </footer>
</body>
</html>
    