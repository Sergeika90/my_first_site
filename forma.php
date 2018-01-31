<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css">
		<title>Связь</title>
	</head>
	<body>
		<div class="wrapper">
			<?php 
			require "db.php";
			if(isset($_SESSION['logged_user'])) 
			require "header/header.php";
			else  
			require "header/header1.php";
			?>
			<div class="content">
				<div class="rightCol">
					<img src="images/pic01.jpg">
					<h3>Пусть ваш потолок станет вашим небом!</h3>
					</br>
					<div class="block">
						<h3>Контакты</h3>
						<p>Капитонов Сергей</p>
						<p>skat_newtown@mail.ru</p>
					</div>
				</div>
				<div class="main">
					
					<h2>Введите свои данные и текст сообщения</h2>
					<form>
						<div class="row">
							<label>Имя:</label>
							<input type="text">
						</div>
						<div class="row">
							<label>Почта:</label>
							<input type="text">
						</div>
						<div class="row">
							<label>Тема:</label>
							<input type="text">
						</div>
						<div class="row">
							<label>Сообщение:</label>
							<textarea></textarea>
						</div>
						<div class="row">
							<button type="submit">Отправить</button>
						</div>
					</form>
				</div>
			</div>
			<div class="footer">
				<a href="about.php" class="active">О нас</a>
				<a href="forma.php">Форма</a>
				<a href="team.php">Наша команда</a>
				<p>&copy;2017</p>
			</div>
		</div>
	</body>
</html>