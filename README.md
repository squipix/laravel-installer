# Squipix Laravel Web Installer

Laravel Web installer checks for the following things and install the application in one go.

1. Check For Server Requirements.
2. Check For Folders Permissions.
3. Ability to set database information.
4. Migrate The Database.
5. Seed The Tables.

## Note:
You need to have `.env` to the root

This installed can check if your application has ***general_settings*** or ***settings*** table in your database.

If you need this please set **check_settings_table** to **true** in `config/installer.php`. 

## Installation
Require this package with composer:
```
composer require squipix/laravel-installer
```


After updating composer, add the ServiceProvider to the providers array in `config/app.php`.

```
'providers' => [
    Squipix\LaravelInstaller\Providers\LaravelInstallerServiceProvider::class,
];
```

## Usage

Before using this package you need to run :
```bash
php artisan vendor:publish --provider="Squipix\LaravelInstaller\Providers\LaravelInstallerServiceProvider"
```

You will notice additional files and folders appear in your project :
 
 - `config/installer.php` : Set the requirements along with the folders permissions for your application to run, by default the array contains the default requirements for a basic Laravel app.
 - `public/installer/assets` : This folder contains a css folder and inside it you will find a `main.css` file, this file is responsible for the styling of your installer, you can overide the default styling and add your own.
 - `resources/views/vendor/installer` : Contains the HTML code for your installer.
 - `resources/lang/en/installer_messages.php` : This file holds all the messages/text.

## Installing your application
- **Install:** If your application is not installed it will, go to the `/install` url, the you should follow the instructions.


## Credits
[RachidLaasri Installer](https://github.com/RachidLaasri/LaravelInstaller)