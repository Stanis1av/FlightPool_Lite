<?php

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
		<nav class="nav">
			<ul class="navbar">
                <li class="nav-item">
                    <a class="nav-link" href="/">Главная</a>
                </li>
				<li class="nav-item">
					<a class="nav-link" href="/regist">Регистрация</a>
                </li>
			</ul>
		</nav>
	</header>

	
    <div class="container-big">
        <h1>Домашний экран</h1>
    <form action="/result_search.php" method="POST">
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

    <footer>
    	
    </footer>
</body>
</html>   

<!-- <p><?php echo row[0] ?></p> -->

<?php
// }
/* очищаем результирующий набор */
//     mysqli_free_result($result);
// } else {
// 	echo "<h2>Ничегоне найдено</h2>";
// }

// $db->close();
?>
