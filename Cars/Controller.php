<?php
		require_once('Cars.php');

		/**
		 * Gets all Cars by Id from DB
		 *
		 * @return array
		 */
		function getAllCars(){
			$query="select * from cars";
			$result = pg_query($query);

			$data = [];

			while ($record = pg_fetch_assoc($result)) {
				$car = new Car($record['id'],$record['model_name'], $record['model_type'], $record['model_brand'],  $record['model_year'], $record['model_date_added'],   $record['model_date_modified'] );
				array_push($data, $car);
			}

			return $data;

		}

		/**
		 * Gets Car by Id from DB
		 *
		 * @return Car || string
		 */
		function getCarById($id){
			$query="select * from cars where id = $id";

			$result = pg_query($query);

			if (pg_num_rows($result) == 0) {
				return "non-existing car";
			} else if (pg_num_rows($result) == 1) {
				$record = pg_fetch_assoc($result);
				$car = new Car($record['id'],$record['model_name'], $record['model_type'], $record['model_brand'],  $record['model_year'], $record['model_date_added'],   $record['model_date_modified'] );

				return $car;
			} else {
				return "ups! something went wrong";
			}

		}

?>