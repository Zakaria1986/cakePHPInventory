# cakePHPInventory

## References:

### Install the cake php:

* https://book.cakephp.org/5/en/quickstart.html

### Cake php folder structure:

* https://book.cakephp.org/5/en/intro/cakephp-folder-structure.html

### Standard follow when coding:

* https://book.cakephp.org/5/en/intro/conventions.html

### Folder structure and writing codes:

* https://book.cakephp.org/5/en/tutorials-and-examples/cms/articles-controller.html

### HTML Helper: 

* https://book.cakephp.org/5/en/views/helpers/html.html

### Git example: 

* https://github.com/HarkiratGhotra/cake/blob/e99dae73cc5f0c127a24f179b7cf8bb6656fab2e/src/Controller/ArticlesController.php

## Installation: 

* Install composer: 

* Install cakephp 5 run: php composer.phar create-project --prefer-dist cakephp/app:5 . 
    - Note. (.) at the end will download the files in the current folder same as the composer files. 

## How to Access the CakePHP Application in cms

1. Start the CakePHP Development Server: **bin/cake server** 
2. Access the Application: Open your browser and go to:http://localhost:8765
3. Stop the server: control+c

## File structure of cake php

cakephpinventory/
├── cms/
│   ├── bin/
│   ├── config/
│   ├── src/
│   ├── templates/
│   ├── vendor/      # Excluded by .gitignore
│   ├── composer.json
│   ├── composer.lock
│   ├── ...
├── composer.phar    # Excluded by .gitignore
├── .gitignore
└── README.md

## Creating database through migration: 

[](https://book.cakephp.org/5/en/quickstart.html?utm_source=chatgpt.com)

* Install migration:  bin/cake bake migration Initial
* This command generates a migration file in: config/Migrations directory:
* Command generates a migration file in the config/Migrations directory:

### Create migration command table: 

* Run: **bin/cake bake migration [CreateProductTable]** 
    - Note: change name and remove the box brackets. 
* Then run this command to create the migration in the database and in the config file: **bin/cake migrations migrate** 

### Seed a table: 

* Seed the product table by running: **bin/cake bake seed Products** 
    - note: This will create a folder then a file with the product with necessary code
    - [https://book.cakephp.org/migrations/4/en/seeding.html](https://book.cakephp.org/migrations/4/en/seeding.html)
    

### CakePHP coding convention guide to follow:

 - [https://book.cakephp.org/5/en/intro/conventions.html](https://book.cakephp.org/5/en/intro/conventions.html)

### Create Module table/entity object, following command does it both 

* Run: bin/cake bake model Products 
    - Note: replace word 'Products' with what ever table/entity object your are trying to create 
