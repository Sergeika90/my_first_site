<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css">
		<title>Наша команда</title>
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
				
					<h2>Наша команда</h2>
						<div class="page-content-right-block"> 
 
							<div class="col"> <img alt="" src="images/pic02.jpg"> 
								<p class="about-block-name">Смирнов Сергей</p> 
								<p class="about-block-prof">Монтажник</p> 
							</div> 
							<div class="col"> <img alt="" src="images/pic03.jpg"> 
								<p class="about-block-name">Дарья <br>Хворостовская</p>
								<p class="about-block-prof">Менеджер</p> 
							</div> 
							<div class="col"> <img alt="" src="images/pic04.jpg"> 
							  <p class="about-block-name">Илья Курчатов</p> 
							  <p class="about-block-prof">Монтажник</p> 
							</div> 
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