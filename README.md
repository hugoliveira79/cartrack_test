# cartrack_test

## scope
This is a possible solution for the Cartrack Tech challenge

## requirements
- XAMPP (or any other Apache,PHP), PostgresQL Server(9.5) 
- Postman

## usage
- Import de database backup file into your postgres server
- import the postman request colection
- import the postman enviroment
- In the postman enviroment set up the URL property to your own URL

## requests available

### List the users :
  - URL: http://[URL]/api.php?area=allUsers
  - Method: GET

### Get a detail of a user:
  - URL: http://[URL]/api.php?id=5 
  - Method: GET

### Insert a user : 
  - URL: http://[URL/api.php?area=insert
  - Method : POST
  
  - Request body:

```json
{
    "name" : "John Smith",
    "address" : "New York"
}

```

### Update a user : 
  - URL: http://[URL/api.php?area=update
  - Method : PUT
  
  - Request body:

```json
{
    "id":34,
    "name" : "John Smith",
    "address" : "Miami"
}

```

### Delete a user : 
  - URL: http://[URL/api.php?area=delete
  - Method : DELETE
  
  - Request body:

```json
{
    "id" : 33
}

```
