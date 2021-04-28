<?php
		class User{
			private $id;
			private $name;
			private $address;

			public function __construct($id=null, $name, $address){
				$this->id = $id;
				$this->name = $name;
				$this->address= $address;

			}


			public function getId(){
				return $this->id;
			}

			public function getName(){
				return $this->name;
			}

			public function getAddress(){
				return $this->address;
			}

			public function setId($val){
				$this->id = $val;
			}

			public function setName($val){
				$this->name = $val;
			}

			public function setAddress($val){
				$this->address = $val;
			}

			public function save(){
				$query = "insert into users (name_user, address_user) values ('$this->name', '$this->address')";
				$result = pg_query($query);

				if ($result == false) {    
				    return pg_last_error() ;
				} else {
				    return "user inserted";
				}
			}

			public function delete(){
				$query = "delete from users where id_user= $this->id";
				$result = pg_query($query);
				
				if ($result == false) {    
				    return pg_last_error() ;
				} else {
				    return "user deleted";
				}
			}

			public function update(){

				$query = "update users set name_user='$this->name' , address_user='$this->address' where id_user= $this->id";
				$result = pg_query($query);
				
				if ($result == false) {    
				    return pg_last_error() ;
				} else {
				    return "user updated";
				}
			}
		}
?>