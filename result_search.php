<?php

session_start();

require_once 'index.php';

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
?>


<hr/>
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