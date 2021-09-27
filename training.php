<?php
//echo rtrim("asdasdf,", ",");

$data = [
    "title" => "hello world",
    "content" => "asasdfdsf 10"
];

var_dump(implode(",", array_keys($data))); //implode(separator, array):array
//rtrim(string $string, string $characters = " \n\r\t\v\0"): string

"SELECT * FROM tasks";
"INSERT INTO tasks(title, content) VALUES('asdas', 'asdas')";
"UPDATE tasks SET title='asdsd' WHERE id=5";
"DELETE FROM tasks WHERE id=5";
