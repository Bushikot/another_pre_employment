<?php
/**
 * На вход данному скрипту передаются неизвестные параметры
 * Задача: максимально оптимизировать код, чтобы при любых условиях он на 100% сохранил свою функциональность
 * Т.е. вывод скрипта до и после оптимизации должен быть одинаковым
 * Оптимизация подразумевает собой хороший PHP5 стиль, безопасность, подготовленность к highload и т.д.
 * В результате эти несколько строчек должны стать "идеальным" кодом с Вашей точки зрения
 */

if (!extension_loaded('PDO')) {
    throw new Exception('PDO extension not found');
}

$pdo = new PDO('sqlite::memory:');

//Some test data
//$_GET['user1'] = 'something';
//$_GET['user2'] = 'something else';
//$_GET['user3'] = 'a bit more';
//
//$pdo->exec("
//	CREATE TABLE users (
//		id INTEGER PRIMARY KEY,
//		name VARCHAR(20),
//		user VARCHAR(20)
//	);
//
//	INSERT INTO users (id, name, user)
//	VALUES (1, 'Васян', 'something'), (2, 'Федос', 'something else');
//");

$users = array(
    @$_GET['user1'],
    @$_GET['user2'],
    @$_GET['user3']
);

$users = array_filter($users);

if (!empty($users)) {
    $paramsBindings = str_repeat('?, ', count($users) - 1) . '?';

    $query = $pdo->prepare("SELECT name FROM users WHERE user IN ({$paramsBindings})");

    $query->execute($users);
    $foundUsers = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($foundUsers as $user) {
        print $user['name'] . "<br>";
    }
}
