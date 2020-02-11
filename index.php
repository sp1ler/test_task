<?php
//кодировка
header("Content-Type: text/html; charset=utf-8");
//получаем html страницы
$page = file_get_contents('https://ria.ru/20200210/1564501788.html');
//регулярные выражения для заголовка, даты, текста
$header_regexp = '|<div\s+?class=.?article__+header.*?<h1[^>]+>(.*?)<\/h1>|';
$date_regexp = '|<div\s+?class=.?article__+info-date.*?<a[^>]+>(.*?)<\/a>|';
$text_regexp = '|<div\s+?class\s*?=\s*?"article__text">(.+?)</div>|';
//глобальный поиск по шаблону
preg_match_all($header_regexp, $page, $match_header);
preg_match_all($date_regexp, $page, $match_date);
preg_match_all($text_regexp, $page, $match_text);
//вывод
echo strip_tags($match_header[1][0]);
	echo '<br>';
echo strip_tags($match_date[1][0]);
	echo '<br>';
foreach ($match_text[0] as $value) {
	echo strip_tags($value);
}

?>

<style>
	body {
		width:600px;
		font-size: 16px;
		font-family: arial;
    	line-height: 26px; 
	}
</style>