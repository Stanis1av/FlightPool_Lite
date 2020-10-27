<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "import";

$db = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($db->connect_error) {
	echo "Нет подключения к БД. Ошибка".mysqli_connect_error();
	exit;
}

$my_data = $db->query("SELECT * FROM flights");

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
        	<select class="select-prim" name="">
        		<option value="Самара">Самара</option>
        		<option value="Ростов">Ростов</option>
        		<option value="Саратов">Саратов</option>
        		<option value="Перьм">Перьм</option>
        	</select>
        </div>
        <div class="container">
        	<label class="ff-label">Куда (To  where) – город или аэропорт прилета</label>
        	<select class="select-prim" name="">
        		<option value="Самара">Самара</option>
        		<option value="Ростов">Ростов</option>
        		<option value="Саратов">Саратов</option>
        		<option value="Перьм">Перьм</option>
        	</select>
        </div>
        <div class="container">
        	<label class="ff-label">Туда (Departing) – дата вылета</label>
        	<input class="input-prim" type="datetime-local" name="">
        </div>
        <div class="container">
        	<label class="ff-label">Обратно (Returning) – дата возвращения обратно</label>
        	<input class="input-prim" type="datetime-local" name="">
        </div>
        <br/>
        <div class="container">
        	<label class="ff-label">Количество пассажиров (Passengers) – от 1 до 8</label>
        	<input type="range" min="1" max="8" list="tickmarks">

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
    