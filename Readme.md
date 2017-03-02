# Mysql Fast Migration

## Description
This is a simple PHP script which let you backup a MySQL (big databases too) and move the .sql file to another server.
This is useful when you have to migrate a very big database and PHPMyAdmin fails or something.

# Configurations
This script have all configuration in "config.php", is self descriptive, so I recommend you to read!

# How to Use

**NOTE:** You can use it LOCALLY or on other computer or even opposite server if you have remote access to MySQL connection and a correct PHP configuration / php script.

## Doing a backup
1. Upload all files (```restore.php``` is optional) to the OLD server (which can be accessed via http)
2. Edit ```config.php``` with the DB data
3. Execute: ```http://yourhost/pathtoscript/backup.php```
4. If backup is make successfully you will see a success message
5. Download the file **dump.sql** via HTTP or FTP (or how you like)
6. Delete or block the script

## Restoring the backup
1. Upload all files (```backup.php``` is optional) including **dump.sql** to the NEW server (which can be accessed via http)
2. Edit ```config.php``` with the DB data of the new server
3. Execute: ```http://yourhost/pathtoscript/restore.php```
4. If the backup is restored successfully you will see a success message
5. Delete or block the script

# TODO
**IMPORTANT:** I have no plans to continue this repo if I don't need it or somewhere request to me
You can fork and make a merge request.

- [ ] Exclude tables
- [ ] Zip & Unzip SQL file
- [ ] Fix english text
- [ ] Make a files backup

# License
This project is open-sourced software licensed under the [GPL license](http://www.gnu.org/copyleft/gpl.html) like "[ifsnop](https://github.com/ifsnop/mysqldump-php)" library included in this repo