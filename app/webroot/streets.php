<?php

exit('1');

$lines = file('d:/streets.txt');

$db = new mysqli('murder', 'root', '', 'nikolaos');

foreach($lines as $line) {
	$str = trim($line);
	if(!empty($str))
		$db->query("INSERT INTO `nikolaos`.`streets`(`id`,`title`) VALUES ( NULL,'{$str}');")
}