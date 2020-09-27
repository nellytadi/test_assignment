# Documentation

To set up project 
redirect to api directory and run 
```
composer install 
```
next redirect to web directory and run 
```
yarn install
```
The app is set to run tests using sqlite Database, so please make sure you have that installed.
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
<env name="TEST_DB_CONNECTION" value="testing"/>
```

All tests can be executed using 
```composer test```
