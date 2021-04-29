<?php

	require_once('config.php');
	require_once('Users/Controller.php');

	if(isset($_GET['area'])){
		switch ($_GET['area']) {
			//REQUEST FOR DETAIL OF A USER
			//Example for request: http://[URL]/api.php?area=detail&id=5
			case 'detail':{
				$user = getUserById($_GET['id']);

				if (!is_object($user) ){
						$message['message'] = "user not found";
						echo json_encode($message);
					} else {
    					echo str_replace('\\u0000', "",json_encode((array)$user));
					}

			}break;

			//REQUEST FOR DELETEING A USER - MUST USE TYPE DELETE ON REQUEST 
			//Example for request: http://[URL]/api.php?area=delete
			case 'delete': {

				if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_POST)) {
					$json = file_get_contents('php://input');
					$data = json_decode($json);


					if (empty($data)) {
						$message['message'] = "params missing";

					} else {

						$user = getUserById($data->id);
							
						if (!is_object($user) ){
							$message['message'] = "user not found";
						} else {
							$result = $user->delete();
							$message['message'] = $result;
						}
					}

				} else {
					$message['message'] = "wrong request type or params missing";
				}

	    		
	    		echo json_encode($message);

			} break;

			// REQUEST FOR UPDATING A USER
			// Example for request: http://[URL]/api.php?area=update
			case 'update': {

				if ($_SERVER['REQUEST_METHOD'] === 'PUT' && isset($_POST)) {
					$json = file_get_contents('php://input');
					$data = json_decode($json);

					if (!isset($data->id)) {
						$message['message'] = "No id present in body";
					} else {

						$user = getUserById($data->id);

						if (!is_object($user) ){
							$message['message'] = "user not found";
						} else {

							if (isset($data->name)) {
								$user->setName($data->name);
							}

							if (isset($data->address)) {
								$user->setAddress($data->address);
							}

							$result = $user->update();
							$message['message'] = $result;
						}

					}

				} else {
					$message['message'] = "wrong request type or params missing";
				}

	    		echo json_encode($message);

			} break;

			//REQUEST FOR INSERTING A USER
			//Example for request: http://[URL]/api.php?area=insert
			case 'insert': {

				if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST)) {

					$json = file_get_contents('php://input');
					$data = json_decode($json);

					if (empty($data)) {
						$message['message'] = "params missing";

					} else {
						$user = new User(null,$data->name,$data->address );
						$result = $user->save();
						$message['message'] =$result;
					}
					
				} else {
					$message['message'] = "wrong request type or params missing";
				}

    			echo json_encode($message);

			} break;

			// REQUEST FOR GETTING ALL USERS
			//Example for request: http://[URL/api.php?area=allUsers
			case 'allUsers' : {
				$users = getAllUsers();

				for ($i=0; $i<count($users);$i++){
					$users[$i]= json_decode(str_replace('\\u0000', "",json_encode((array)$users[$i])));

				}


				echo json_encode($users);

			} break;
			
			default: {
				$message['message'] = "Something went wrong";

				
			} break;
		}

	} else {
		$message = "No parameters found";
	}

