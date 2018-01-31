<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css">
		<script src="http://code.jquery.com/jquery.min.js"></script>
		<title>Регистрация</title>
		
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
					
					<?php


$data = $_POST;
if(isset($data['do_signup'])) {
	
	$errors = array();
	if(($data['email']) == '') {
		$errors[] = 'Введите email';
	}
	if(($data['password']) == '') {
		$errors[] = 'Введите пароль';
	}
	if(($data['password1']) == '') {
		$errors[] = 'Введите повторный пароль';
	}
	if(($data['password1']) != $data['password']) {
		$errors[] = 'Неверный повторный пароль';
	}
	if(($data['name']) == '') {
		$errors[] = 'Введите имя';
	}
	if(($data['surname']) == '') {
		$errors[] = 'Введите фамилию';
	}
	if( R::count('users', 'email = ?', array($data['email'])) > 0 ) {
		$errors[] = 'Пользователь с таким email уже зарегистрирован';
	}
	
	if(empty($errors)) {
		$user = R::dispense('users');
		$user->email = $data['email'];
		$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
		$user->name = $data['name'];
		$user->surname = $data['surname'];
		R::store($user);

		echo '<div style="color: green;"></a></div>';
	}else {
		echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
	}
	if($user)
	{
		if(password_verify($data['password'], $user->password)) 
		{
			if($data['email'] == 'admin@test.ru' AND $data['password'] == 'admintest') {
				$_SESSION['logged_admin'] = $user;
		echo '<p><b>Здравствуйте, Администратор. Можете посмотреть зарегистрированных пользователей <a href="users.php">здесь</a></b></p>';
	}
		$_SESSION['logged_user'] = $user;
		echo '<script type="text/javascript">
			
			$(function hideDiv(){
				$("#text").delay(3000).fadeOut(); 
			});
		
		</script>
		<div style="color: green;" id="text">Вы успешно зарегистрированы и авторизованы! Приветствуем Вас на нашем сайте!</div><br/><div>Можете перейти на <a href="index.php">главную</a> страницу</div>';
		
		
		
		} else 
		{
			$errors[] = 'Неверно введен пароль';
		}
	}
}
?>
					
					<?php if(isset($_SESSION['logged_user'])) :?>
					
					<?php else : ?>
					<form action="signup.php" method="POST" onsubmit="return valid(this)">
						<div class="row">
							<p>
							<p><strong>Ваш email</strong></p>
							<input type="email" name="email" value="<?php echo @$data['email'];?>">
							</p>
							<p>
							<p><strong>Ваш пароль</strong></p>
							<input type="password" name="password" value="<?php echo @$data['password'];?>">
							</p>
							<p>
							<p><strong>Подтвердите пароль</strong></p>
							<input type="password" name="password1" value="<?php echo @$data['password1'];?>">
							</p>
							<p>
							<p><strong>Ваше имя</strong></p>
							<input type="text" name="name" value="<?php echo @$data['name'];?>">
							</p>
							<p>
							<p><strong>Ваша фамилия</strong></p>
							<input type="text" name="surname" value="<?php echo @$data['surname'];?>">
							</p>
							<button type="submit" name="do_signup">Зарегистрироваться</button>
							
						</div>
					<?php endif; ?>
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
		<script type="text/javascript">
		function valid(form) {
		var fail = false;
		var password = form.password.value;
		var password1 = form.password1.value;
		if (password.length<7)
			fail = "Пароль должен быть не менее 7 символов";
		if (password1.length<7)
			fail = "Пароль должен быть не менее 7 символов";
		if (fail) {
		alert (fail);
		return false;
		} else {
			return true;
		}
		}
		</script>
	</body>
</html>