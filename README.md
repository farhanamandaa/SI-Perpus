# SI-Perpus

## Requirement
```
PHP >= 7.1.3
Composer
MYSQL
```

### Instalation
* Clone this repository
* cd SI-Perpus
* [sudo] chmod -R 755 app/storage
* run composer install
* create new .env file and setting
* run php artisan migrate
* run php artisan db:seed --class=RoleSeeder
* run php artisan serve
