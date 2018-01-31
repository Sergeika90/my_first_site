<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css">
		<title>Профиль</title>
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
					
			

				<?php if(isset($_SESSION['logged_user'])) : ?>
				
				<p>Редактировать профиль <strong> <?php echo $_SESSION['logged_user']->email;?></strong></p><br>
				

				<?php
				
				$data = $_POST;
				
				if(isset($data['do_newpassword'])) {
					
					$errors = array();
					if(($data['oldpassword']) == '') {
					$errors[] = 'Введите текущий пароль';
					}
					if(($data['newpassword']) == '') {
					$errors[] = 'Введите новый пароль';
					}
					if(($data['newpassword']) == $data['oldpassword']) {
					$errors[] = 'Новый пароль не должен повторять старый пароль';
					}
					if(empty($errors)) {
						$user = R::findOne('users', 'id = ?', [$_SESSION['logged_user']['id']]); 
						
						if(password_verify($data['oldpassword'], $user->password)) {
							$user->password = password_hash($data['newpassword'], PASSWORD_DEFAULT);
						R::store($user);
						echo '<div style="color: green;">Ваш пароль успешно изменен</div><hr>';
						}
					}else {
						echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
					}
				}
				?>

					<form action="profile.php" method="POST">
						<div class="row">
							<p>
							<p><strong>Введите текущий пароль</strong></p>
							<input type="password" name="oldpassword">
							</p>
							<p>
							<p><strong>Введите новый пароль</strong></p>
							<input type="password" name="newpassword">
							</p>
							<button type="submit" name="do_newpassword">Изменить</button>
						</div>
					</form>

				<?php else : ?>
				<p>Вы не авторизованы <hr></p>
				<p><a href="login.php">Авторизоваться</a></p>
				
				<?php endif; ?>

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