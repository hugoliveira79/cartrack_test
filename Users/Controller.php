<?php
		require_once('Users.php');

		function getAllUsers(){
			$query="select * from users";
			$result = pg_query($query);

			$data = [];

			while ($record = pg_fetch_assoc($result)) {
				$user = new User($record['id_user'],$record['name_user'], $record['address_user'] );
				array_push($data, $user);
			}

			return $data;

		}

		function getUserById($id){
			$query="select * from users where id_user= $id";
			$result = pg_query($query);

			if (pg_num_rows($result) == 0) {
				return "non-existing user";
			} else if (pg_num_rows($result) == 1) {
				$record = pg_fetch_assoc($result);
				$user = new User($record['id_user'],$record['name_user'], $record['address_user'] );

				return $user;
			} else {
				return "ups! something went wrong";
			}

		}

?>