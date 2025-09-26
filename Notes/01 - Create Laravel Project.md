# Create Laravel Project

[Laravel Oficial documentation for reference](https://laravel.com/docs/11.x#creating-a-laravel-project)

## Requirements

The following software packages must be installed in the system.

- [PHP](https://php.net/)
- [Composer](https://getcomposer.org/)
- [Node and npm](https://nodejs.org/)

## Create project

On a terminal run the command

```powershell
composer create-project laravel/laravel my_app
```

Will create a new laravel installation in the my_app folder. Replace my_app with . to create the project in the
current directory (it must be empty!).

## Adjust PHP settings

```powershell
> php -i | findstr php.ini
Configuration File (php.ini) Path =>  
Loaded Configuration File => D:\bin\php\php-8.0.14\php.ini
>
```
Open the file and adjust the settings, specifically:

- Extensions directory
- Post size
- Post file size
- Extensions:
  - PDO MySQL (or the database being used)
  - OpenSSL
  - MBString
  - Intl
  - fileinfo
  - curl
  - zip
