<?php

$dbconn = pg_connect("host=localhost port=5433 dbname=users_db user=postgres password=123");

if(!$dbconn){
	echo json_encode($message["message"]="DB error");
}




