<?php
header('Content-Type: text/html; charset=utf-8');

require_once("database.php");

define('DB_TYPE','mysql');
define('DB_HOST','127.0.0.1');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','test_table');
define('DB_DEBUG','test_table');

function main() {
	echo "<p><b>Настраиваем подключение к БД...</p></b>";
    $dblink = new database(
		DB_TYPE,
		DB_HOST,
		DB_USER,
		DB_PASS,
		DB_NAME,
		DB_DEBUG
	);
	echo "<p><b>Подключаемся к БД...</p></b>";
    $dblink->connect();
    
	echo "<p><b>Создаём новую запись и получаем её ID:</p></b>";
	$id = $dblink->query("INSERT INTO test_table (id, val1, val2) VALUES (NULL,'test1','test2')",true);
	echo "ID только что созданной записи \"".$id."\"<br>";
	
	echo "<p><b>Получаем количество всех записей в таблице:</p></b>";
    $num_item = $dblink->get_num("SELECT id FROM test_table");
    echo "Всего записей: ".$num_item."<br>";
    
    echo "<p><b>Получаем данные и только что созданной записи</p></b>";
    if ($data_item = $dblink->get_row("SELECT val1,val2 FROM test_table WHERE id='".$id."'"))
        echo "val1: ".$data_item->val1.", val2: ".$data_item->val2."<br>";
    
	echo "<p><b>Получаем все записи из таблицы:</p></b>";
    if ($data_item_for = $dblink->get_list("SELECT val1,val2 FROM test_table")) {
		echo "<ul>";
        foreach ($data_item_for as $data_item)
            echo "<li>val1: ".$data_item->val1.", val2: ".$data_item->val2."</li>";
		echo "</ul>";
	}
    
    echo "<p><b>Обновляем данные в только что созданной записи:</b></p>";
    if ($dblink->query("UPDATE test_table SET val1='1' WHERE id='".$id."'"))
        echo "write OK!<br>";
    
	echo "<p><b>Отключаемся от БД...</p></b>";
    $dblink->disconnect();
}
main();
?>
