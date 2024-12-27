<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/ismail306/cloudcore-task_management-with_APIs"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
</p>

## About Project

In this Task management system I developed only backend, I added "CludeCore Task API By Ismail Hossain.postman_collection.json" file in this project root folder and mail also.
I used Passport for user Authentication. And added all provable request for auth and TASH CRUD, Filter in attached postman json file.
you can check all just import attached "CludeCore Task API By Ismail Hossain.postman_collection.json" file in your Postman .

Please Follow Steps:

- If you got ,{"status":"Error","message":"Personal access client not found. Please create one.","data":null}
please run "php artisan passport:client --personal".


Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Provable Error
- Error: Internal Server Error
       Symfony\Component\Routing\Exception\RouteNotFoundException
       Route [login] not defined.
- Solution: set bearer token properly

