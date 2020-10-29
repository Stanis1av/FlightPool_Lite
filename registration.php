<?php

session_start();

// require_once 'index.php';
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
					<a class="nav-link" href="/registration.php">Регистрация</a>
                </li>
			</ul>
		</nav>
	</header>

<hr/>
    <div class="container-big">
    	<form action="vendor/registration.php" method="POST">
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
        	<button class="btn-reg" type="submit">Зарегистрироваться</button>
    	</form>
    </div>
    <hr/>
    </div>

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



