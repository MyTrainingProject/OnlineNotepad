<?php

require 'database/QueryBuilder.php';

$db = new QueryBuilder();
$db->delete('tasks', $_GET['id']);
?>