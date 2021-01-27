# Mysql Fast Migration

## Depecration notes

This project is archived and will be no updated anymore, please check this other script (bash): https://github.com/ProtocolNebula/server-web-migration

## Description
This is a simple PHP script which let you backup a MySQL (big databases too) and/or the web files for move it to another server.
This is useful when you have to migrate a very big database and PHPMyAdmin fails or something or things such wordpress.
You can move directly vía ftp server-2-server **(in development)**.

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
**IMPORTANT:** I will make some changes, but I have no plans to continue this repo after this if I don't need it.
You can fork and make a merge request or ask me for some addon that you need.

- [ ] Exclude tables or their content
- [ ] Zip & Unzip SQL file
- [ ] Fix english text
- [ ] Make a files backup
- [ ] Transfer files via FTP (from any server to the other)

# License
This project is open-sourced software licensed under the [GPL license](http://www.gnu.org/copyleft/gpl.html) like "[ifsnop](https://github.com/ifsnop/mysqldump-php)" library included in this repo
