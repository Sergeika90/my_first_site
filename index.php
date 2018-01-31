<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css">
		<title>Главная</title>
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
				
				<?php if(isset($_SESSION['logged_admin'])) {
					echo '<p>Добро пожаловать, <b>Администратор</b>.</p><br> <p><a href="users.php">Зарегистрированные пользователи</a></p><br>';
				} 
				?>

				<?php if(isset($_SESSION['logged_user'])) : ?>
				<p>Ваш email - <strong> <?php echo $_SESSION['logged_user']->email;?>!</strong></p><br>
				<p>Тут всякий текст, доступный авторизованному пользователю.</p><br>
				

				<?php else : ?>
				<p>Вы не авторизованы <hr></p>
				<p><a href="login.php">Авторизоваться</a></p>
				<a href="signup.php">Зарегистрироваться</a>
				<?php endif; ?>
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