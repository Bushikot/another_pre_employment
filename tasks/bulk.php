<?php
/*
* На вход данному скрипту передаются неизвестные параметры
* Задача: максимально оптимизировать код, чтобы при любых условиях он на 100% сохранил свою функциональность
* Т.е. вывод скрипта до и после оптимизации должен быть одинаковым
* Оптимизация подразумевает собой хороший PHP5 стиль, безопасность, подготовленность к highload и т.д.
* В результате эти несколько строчек должны стать "идеальным" кодом с Вашей точки зрения
*/



// подключение к БД опущено
	
	$field = 'name';
$user1 = $HTTP_GET_VARS['user1'];$result = mysql_query('SELECT * FROM users WHERE user='.$user1);
$user1_data = mysql_fetch_assoc($result);
	$user2 = $HTTP_GET_VARS['user2'];$result = mysql_query('SELECT * FROM users WHERE user='.$user2);
	$user2_data = mysql_fetch_assoc($result);
		$user3 = $HTTP_GET_VARS['user3'];$result = mysql_query('SELECT * FROM users WHERE user='.$user3);
		$user3_data = mysql_fetch_assoc($result);
$users = array();
	$users[] = $user1_data;
	$users[] = $user2_data;
	$users[] = $user3_data;
	
$i = 0;
do{print($users[$i]["$field"]."<br>");$i++;}while
($i<3);

?>
