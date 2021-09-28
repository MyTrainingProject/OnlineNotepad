<?php

require 'database/QueryBuilder.php';

$db = new QueryBuilder();
$db->deleteTask($_GET['id']);
?>