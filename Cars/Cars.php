<?php
	class Car{
		private $id;
		private $model_name;
		private $model_type;
		private $model_brand;
		private $model_year;
		private $model_date_added;
		private $model_date_modified;

		public function __construct($id=null,$model_name,$model_type, $model_brand,$model_year, $model_date_added=null, $model_date_modified=null ){
			$this->id = $id;
			$this->model_name = $model_name;
		 	$this->model_type = $model_type;
		 	$this->model_brand = $model_brand ;
		 	$this->model_year = $model_year ;
		 	$this->model_date_added = $model_date_added ;
		 	$this->model_date_modified = $model_date_modified ;

		}

		//GETTERS
		public function getId() { return $this->id; }
		public function getModelName() { return $this->model_name; }
		public function getModelType() { return $this->model_type; }
		public function getModelBrand() { return $this->model_brand; }
		public function getModelYear() { return $this->model_year; }
		public function getModelDateAdded() { return $this->model_date_added; }
		public function getModelDateModified() { return $this->model_date_modified; }

		//SETTERS
		public function setId($val) { $this->id = $val; }
		public function setModelName($val) { $this->model_name = $val; }
		public function setModelType($val) { $this->model_type = $val; }
		public function setModelBrand($val) { $this->model_brand = $val; }
		public function setModelYear($val) { $this->model_year = $val; }
		public function setModelModelDateAdded($val) { $this->model_date_added = $val; }
		public function setModelModelDateModified($val) { $this->model_date_modified = $val; }

		/**
		 * insert into DB
		 *
		 * @return string
		 */
		public function save(){
			$query = "insert into cars (model_name, model_type, model_brand,model_year,model_date_added ) values ('$this->model_name', '$this->model_type','$this->model_brand', '$this->model_year', '$this->model_date_added' )";

			$result = pg_query($query);

			if ($result == false) {    
			    return pg_last_error() ;
			} else {
			    return "car inserted";
			}
		}

		/**
		 * deletes from DB
		 *
		 * @return string
		 */
		public function delete(){
			$query = "delete from cars where id= $this->id";
			$result = pg_query($query);
			
			if ($result == false) {    
			    return pg_last_error() ;
			} else {
			    return "car deleted";
			}
		}

		/**
		 * update in DB
		 *
		 * @return string
		 */
		public function update(){

			$query = "update cars set model_name='$this->model_name' , model_type='$this->model_type', model_brand='$this->model_brand',  model_year='$this->model_year' , model_date_modified='$this->model_date_modified' where id= $this->id";
			$result = pg_query($query);
			
			if ($result == false) {    
			    return pg_last_error() ;
			} else {
			    return "car updated";
			}
		}

	}
?>