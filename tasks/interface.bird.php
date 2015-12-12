<?php

/*
* Задача: написать работоспособный класс согласно интерфейсу bird
*/

interface bird {
	
	function setKind(string $type);
	function getKind();
	
	function getLocation();
	function setLocation(location $location);
	function flyTo(location $location);
	
	function setMelody(string $melody);
	
	function singMelody(); // вывод зависит от kind
	
	function killBird();
	function cloneBird(int $count);
}

// основа для класса location
/* 
abstract class location{
	private $x;
	private $y;
	private $z;
}
 */
?>
