
# API Deployment
From '/CES/ces-api/' run the following: <br />
composer update --no-scripts<br />
npm install<br />
php artisan serve --port=8000<br />
<br/>
DB is preseeded but if you wish to reseed it run:<br />
php artisan db:seed<br />

# UI Deployment
API defaults to run at http://localhost:8000<br />
If the port or hostname needs to be changed edit the config file at /CES/ces-ui/config.json<br />
<br />
From '/CES/ces-ui/' run the following:<br />
npm install<br />
npm start<br />

# API Docs
CES API.postman_collection.json contains the API docs as well as use examples<br />
