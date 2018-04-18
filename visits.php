<?php
require_once 'idiorm.php';

ORM::configure('mysql:host=localhost;dbname=user');
ORM::configure('username', 'root');
ORM::configure('password', '');

session_start();
$visiteZi = ORM::forTable('visits')->raw_query('SELECT visit_date, count(*) as no FROM visits group by visit_date')->find_array();
echo json_encode($visiteZi);
?>

