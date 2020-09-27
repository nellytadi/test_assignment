# Documentation

To set up this project, 
redirect to api directory and run 
```
composer install 
```
next, redirect to web directory and run 
```
yarn install
```
The application is set to run tests using sqlite Database, so please make sure you have that installed.
Then add this your .env file
```
TEST_DB_CONNECTION=sqlite
TEST_DB_HOST=null
TEST_DB_PORT=null
TEST_DB_DATABASE=database/test.sqlite
TEST_DB_USERNAME=null
TEST_DB_PASSWORD=null

```

Ensure you have this configuration in your phpunit.xml file
```
<php>
    ....
    <env name="TEST_DB_CONNECTION" value="testing"/>
</php
```
Finally, create a **test.sqlite** file within your database directory.

All tests can be executed using 
```composer test```
