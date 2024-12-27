<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/ismail306/cloudcore-task_management-with_APIs"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
</p>

## About Project

In this Task management system I developed only backend, I added "CloudCore Task API By Ismail Hossain.postman_collection.json" file inside public folder.
I used Passport for user Authentication. And added all request url and required data as JSON format for auth and Task CRUD, Filter in attached postman json file.
You can test all, just import attached "CloudCore Task API By Ismail Hossain.postman_collection.json" file in your Postman .

# Task Management System

This Task Management System backend is built using Laravel. Below are the details and instructions for testing and running the application.

## Features
- User Authentication using Laravel Passport
- Task CRUD operations
- Task filtering
- Dummy data seeding

## Getting Started

### 1. Import API Collection
To test the API, import the attached [CloudCore Task API by Ismail Hossain.postman_collection.json](public/CloudCore%20Task%20API%20By%20Ismail%20Hossain.postman_collection.json) into Postman.

### 2. Clone the repository:
    ```bash
    git clone <https://github.com/ismail306/cloudcore-task_management-with_APIs.git>
    cd cloudcore-task_management-with_APIs
    ```

### 3. Copy the example environment file and configure it:
    ```bash
    cp .env.example .env
    ```

### 4. Install dependencies:
    ```bash
    composer update
    ```

### 5. Configure the `.env` file:
    - Update database credentials to match your local setup:
        ```env
        DB_DATABASE=your_database_name
        DB_USERNAME=your_database_user
        DB_PASSWORD=your_database_password
        ```
### 6. Start the Laravel development server:
    ```bash
    php artisan serve
    ```
---

### 2. Database Setup

#### Option 1: Use Seeders
Run the seeders to insert dummy data for users, tasks, and the Passport personal access token:
```bash
php artisan db:seed
```

#### Option 2: Import SQL File

Alternatively, you can import the provided SQL file to set up the database:

- [task-management-db-ismail.sql](task-management-db-ismail.sql)


## Testing Instructions

1. Ensure the database is configured and populated with dummy data (via seeders or the SQL file).
2. Start the Laravel development server:
    ```bash
    php artisan serve
    ```
3. Import the attached Postman collection into Postman to test the APIs:
    - [CloudCore Task API by Ismail Hossain.postman_collection.json](public/CloudCore%20Task%20API%20By%20Ismail%20Hossain.postman_collection.json)
4. Use the endpoints and request payloads provided in the Postman collection to test Task CRUD operations and filtering.

---

## Authentication

The project uses Laravel Passport for secure user authentication. Below are the key points:

1. Use the Postman collection to authenticate and retrieve the access token. Include the token in the request headers as:
    ```
    Authorization: Bearer <your-access-token>
    ```
2. Refer to the Postman collection for details on:
    - Authentication endpoints
    - Request payloads
    - Header requirements

Once authenticated, you can access all the authenticated routes and perform CRUD operations on tasks.


## Probable Error
If you send a request for any operation from Postman without a bearer token, you may encounter the following error:

- ⚠️ **Error: Internal Server Error**  
  `Symfony\Component\Routing\Exception\RouteNotFoundException`  
  `Route [login] not defined.`

### Solution:
Set the bearer token properly in your request headers.  
_I will handle this more gracefully in future updates._

## Some Demo Images

### Register User
![Postman Demo 1](public/postManDemo1.jpg)

### Sort By due_date
![Postman Demo 2](public/postManDemo2.jpg)

### Tasks By Filter
![Postman Demo 3](public/postManDemo3.jpg)


