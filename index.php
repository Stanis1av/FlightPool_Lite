

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
    <form action="" method="POST">
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
        	<input class="input-prim" type="date" name="departing">
        </div>
        <div class="container">
        	<label class="ff-label">Обратно (Returning) – дата возвращения обратно</label>
        	<input class="input-prim" type="date" name="returning">
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


<?php

$from_where = $_POST['from_where'];
$to_where = $_POST['to_where'];
$departing = $_POST['departing'];
$returning = $_POST['returning'];
$passengers = $_POST['passengers'];

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "import";

$db = new mysqli($db_host, $db_user, $db_pass, $db_name);
mysqli_set_charset($db, "utf8");

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

if(!empty($from_where) && !empty($to_where) && !empty($departing)) {

} else { // добавили сообщение
    echo "Заполните пустые поля";
}

$sql = "SELECT * FROM flights WHERE departure='".$departing."' && from_where='".$from_where."' && to_where='".$to_where."'";

if ($result = mysqli_query($db, $sql)) {

    /* выборка данных и помещение их в массив */
    while ($row = mysqli_fetch_row($result)) {
    $summ = $row[8] * $passengers;
?><hr/>
    	<div>
    	<h1>Экран с найденными рейсами</h1>
  		<br/>

  		<div class="."find_cont".">
    	<label>Номер рейса: <b><?php echo $row[0]; ?></b></label><br/>
		<label>Самолет: <b><?php echo $row[1]; ?></b></label><br/>
		<label>Дата и время отправления: <b><?php echo $row[5]; ?></b></label><br/>
		<label>Время прибытия: <b><?php echo $row[6]; ?></b></label><br/>
		<label>Время в полёте: <b><?php echo $row[7]; ?></b></label><br/>
		<label>Общую цену, учитывая количество пассажиров: <b><?php echo $summ; ?></b></label><br/>
		</div>
		</div>
	<?php
    }

    /* очищаем результирующий набор */
    mysqli_free_result($result);
} else {
	echo "<h2>Ничегоне найдено</h2>";
}

$db->close();

?> 

<hr/>
    <div class="container">
    	<form action="" method="POST">
    	<h1>Зарегистрироваться</h1>
       
    		<div class="container">
        		<label class="ff-label">Введите своё имя</label>
        		<input class="input-prim" type="text" name="username" placeholder="" value="">
        	</div>
        	<div class="container">
        		<label class="ff-label">Придумайте пароль</label>
        		<input class="input-prim" type="text" name="pass" placeholder="Введите пароль" value="">
        	</div>
        	<div class="container">
        		<label class="ff-label">Повторите пароль</label>
        		<input class="input-prim" type="text" name="pass2" placeholder="Повторите пароль" value="">
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

<?php

// $username = $_POST['username'];
// $pass = $_POST['pass'];
// $pass2 = $_POST['pass2'];

// $username = clean($username);
// $pass = clean($pass);
// $pass2 = clean($pass2);

// if(!empty($username) && !empty($pass) && !empty($pass1)) {

// } else { // добавили сообщение
//     echo "Заполните пустые поля";
// }

// $reg = "INSERT INTO `users`(`id`, `username`, `password`) VALUES ('".$username."','".$password."')";

// if ($result1 = mysqli_query($db, $reg)) {

//     /* выборка данных и помещение их в массив */
//     while ($row = mysqli_fetch_row($result1)) {
?>

<!-- <p><?php echo row[0] ?></p> -->

<?php
// }
// /* очищаем результирующий набор */
//     mysqli_free_result($result);
// } else {
// 	echo "<h2>Ничегоне найдено</h2>";
// }

// $db->close();
?>
