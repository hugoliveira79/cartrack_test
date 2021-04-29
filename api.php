<?php

	require_once('config.php');
	require_once('Cars/Controller.php');

	if(isset($_GET['area'])){
		switch ($_GET['area']) {
			//REQUEST FOR DETAIL OF A USER
			//Example for request: http://[URL]/api.php?area=detail&id=5
			case 'detail':{
				$car = getCarById($_GET['id']);

				if (!is_object($car) ){
						$message['message'] = "car not found";
						echo json_encode($message);
					} else {
    					echo str_replace('\\u0000', "",json_encode((array)$car));
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

						$user = getCarById($data->id);
							
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

						$car = getCarById($data->id);

						if (!is_object($car) ){
							$message['message'] = "car not found";
						} else {

							if (isset($data->model)) {
								$car->setModelName($data->model);
							}

							if (isset($data->type)) {
								$car->setModelType($data->type);
							}


							if (isset($data->brand)) {
								$car->setModelBrand($data->brand);
							}

							if (isset($data->year)) {
								$car->setModelYear($data->year);
							}

							$car->setModelModelDateModified(date('Y-m-d h:i:s'));

							$result = $car->update();
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

						$car = new Car(null,$data->model,$data->type, $data->brand, $data->year, date('Y-m-d h:i:s'), null);
						$result = $car->save();
						$message['message'] =$result;
					}
					
				} else {
					$message['message'] = "wrong request type or params missing";
				}

    			echo json_encode($message);

			} break;

			// REQUEST FOR GETTING ALL USERS
			//Example for request: http://[URL/api.php?area=allCars
			case 'allCars' : {
				$users = getAllCars();

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

