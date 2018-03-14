<?php
/**
 * Created by PhpStorm.
 * User: ak
 * Date: 2/25/18
 * Time: 11:29 PM

 */

require_once ('PDO_link.php');


$date = new DateTime('2018-03-01 8:30:00');
$count = 9 * 60 / 30;
$arr = [];


$result = $pdo->query("CREATE TABLE IF NOT EXISTS times (id INT(5) NOT NULL AUTO_INCREMENT, time TIME ,  PRIMARY KEY (id), UNIQUE KEY (id))");
$result->execute();
$result->closeCursor();
/** @var int $i */
for($i=0; $i<$count; $i++) {
    echo 'Time '.$i.': '.$arr[$i].'Being Inserted..<br>';
    $arr[$i] = $date->add(new DateInterval("P0Y0DT0H30M"))->format('H:i');
    $insert = $pdo->prepare("INSERT INTO times 
                                    (time) 
                                    VALUES ('$arr[$i]');
                                    ");

    $insert->execute();
}echo ('<br><br><hr><br>all times inserted.');
