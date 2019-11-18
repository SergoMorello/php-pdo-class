<?php 
require_once("inc_config.php");
require_once("inc_database.php");

function main() {
    $dblink = new database();
    $dblink->connect();
    
    $num_item = $dblink->get_num("SELECT id FROM test_table"); //get and show num items in table
    echo "num my items in table: ".$num_item."\r\n";
    
    $id_to_get = 77;
    if ($data_item = $dblink->get_row("SELECT val1,val2 FROM test_table WHERE id='".$id_to_get."'")) {
        echo "my data val1: ".$data_item["val1"]." AND my data val2: ".$data_item["val2"]."\r\n"; //get data
    }
    
    if ($data_item_for = $dblink->get_list("SELECT val1,val2 FROM test_table")) { 
        foreach ($data_item_for as $data_item) {
            echo "my data val1: ".$data_item["val1"]." AND my data val2: ".$data_item["val2"]."\r\n"; //get data in the foreach
        }
    }
    
    $id_to_query = "77";
    if ($dblink->query("UPDATE test_table SET val1='1' WHERE id='".$id_to_query."'")) //query to DB
        echo "write OK!\r\n";
    
    $dblink->disconnect();
}
main();
?>
