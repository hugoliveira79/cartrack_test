# Cartrack tech challenge

## scope
This is a possible solution for the Cartrack Tech challenge

## requirements
- XAMPP (or any other Apache,PHP), PostgresQL Server(9.5) 
- Postman

## usage
- import the postman request colection
- import the postman enviroment
- In the postman enviroment set up the URL property to your own URL

## requests available

### List the cars :
  - URL: http://[URL]/api.php?area=allCars
  - Method: GET

### Get a detail of a car:
  - URL: http://[URL]/api.php?area=detail&id=5 
  - Method: GET

### Insert a car : 
  - URL: http://[URL]/api.php?area=insert
  - Method : POST
  
  - Request body:

```json
{
    "model" : "Senna",
    "type" : "Race",
    "brand" : "McLaren",
    "year" : "1992"
}
```

### Update a car : 
  - URL: http://[URL]/api.php?area=update
  - Method : PUT
  
  - Request body:

```json
{
    "id": 32,
    "model" : "Senna2",
    "type" : "Racing",
    "brand" : "McLarens",
    "year" : "1993"
}

```

### Delete a car : 
  - URL: http://[URL]/api.php?area=delete
  - Method : DELETE
  
  - Request body:

```json
{
    "id" : 33
}

```
