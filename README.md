# Contact App
An application built with laravel  focusing on some features of laravel i.e. 
* Soft Deletion
* Scheduled Jobs
* Sending mails using mailtrap.io
* Modifying Stubs
* Observers
* Custom Request Classes 
* Seeders
* Factories
## Steps to install the project in docker

**Run the following command in the shell of the contactapp-php container**

Build & Run all the images in detached (background) mode. 
```
 docker compose up -d
```

`If an error appeared related to autoload class, run these commands respectively.  `

1.  Due to some errors in  vendor dependencies, running any artisan commands can cause a failure. [--no-scripts]  flag to prevent artisan from executing before it was included & skips running any post-update scripts defined in the composer.json file.
This command will update the dependencies of the PHP application, as specified in the composer.json file.

 ```
docker-compose exec php composer update --no-scripts
```


2.  update the dependencies in an optimized way by combining all of the class maps and files maps into a single optimized file, which can be loaded more quickly than the separate maps.

```
 docker-compose exec php composer dump-autoload -o 
```

3.  Migrating up the tables of the schema
```
docker-compose exec php php artisan migrate
```

4.  Serve your application in localhost
``` 
 docker-compose exec php php artisan serve
```
