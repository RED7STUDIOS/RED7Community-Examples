# Profiles API Example
This API example contains the use of the profile system.

## Installing
You can install this just on a standalone web server (Apache, Nginx, IIS even the in-built PHP web-server).

## Configuration
The configuration file is located under the `assets` folder, it is called `config.php`.

### API URL ($API_URL)
This is the API URL of where the website's API is hosted. When we have test sites you can set it to one of those.

### API Key ($API_KEY)
The API Key is the key that unlocks the API, so that you can use all of the features. The API will not work without a valid key.

### Enable Document Root ($ENABLE_DOCUMENT_ROOT)
Enables `$_SERVER["DOCUMENT_ROOT"]` in all PHP references, instead of the paths (not using absolute paths).

### Storage URL ($STORAGE_URL)
The Storage URL is where the content for the item models are stored, usually the website's JSDelivr web address.