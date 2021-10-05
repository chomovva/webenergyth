<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<!DOCTYPE html>
<html lang="ru">
	<?php get_template_part( 'parts/head' ); ?>
	<body class="home">
		<div class="wrapper" id="wrapper">
			<div class="wrapper__item wrapper__item--mobilenav mobilenav" id="mobilenav">
				<button class="close" data-mobilenav="toggle">
					<snan class="sr-only">Закрыть меню</snan>
				</button>
				<div class="text-center"><a class="custom-logo-link" href="#"><img class="custom-logo" src="./userfiles/logo.png" alt="QA blog"></a></div>
				<ul class="menu mb-3 pb-3">
					<li class="menu-item"><a href="#">Главная</a></li>
					<li class="menu-item"><a href="#">Обо мне</a></li>
					<li class="menu-item"><a href="#">Блог</a></li>
					<li class="menu-item"><a href="#">Контакты</a></li>
				</ul>
				<!--
				Форма поиска (searchform.php)
				
				-->
				<form class="searchform form" role="search" method="get" action="#"> 
					<input class="form-control" type="text" value="" name="s" placeholder="Поиск по сайту">
					<button class="searchsubmit" type="submit"><span class="sr-only">Найти</span></button>
				</form>
				<aside class="mt-3 pt-3 pb-3">
					<div class="widget mb-3">
						<h3 class="widget__title title">Заголовок</h3>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat.
						</p>
					</div>
					<div class="widget mb-3">
						<h3 class="widget__title title">Заголовок</h3>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat.
						</p>
					</div>
				</aside>
			</div>
			<header class="wrapper__item wrapper__item--header header" id="header">
				<div class="container"><a class="custom-logo-link" href="home.html"><img class="custom-logo" src="./userfiles/logo.png" alt="Логотип сайта"></a>
					<ul class="menu">
						<li><a href="home.html">Главная</a></li>
						<li><a href="singular.html">Об авторе</a></li>
						<li><a href="archive.html">Блог</a></li>
						<li><a href="404.html">Контакты</a></li>
					</ul>
					<button class="burger" id="burger" data-mobilenav="toggle"><span class="bar bar1"></span><span class="bar bar2"></span><span class="bar bar3"></span><span class="sr-only">Меню</span></button>
				</div>
			</header>
			<main class="wrapper__item wrapper__item--main main" id="main">