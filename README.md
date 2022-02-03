# SAMSi
An open source alternative to microsoft teams.

Currently a couple of security measures are in place. This is just for testing purposes. Do NOT try and use as an actual website, and especially do not port forward any web servers hosting this. SQL injection is probably very possible as of now.

To use, (currently can only works on Linux, as directory paths start with /var) run the bash script (re-install.bash) in /var/www. Make sure you have the git module installed, and you run the bash script as sudo.

Running re-install will no longer destroy user data, as we have migrated to SQL.

Currently, you have to manually set up the databases with MySQLi, however we have plans to write an installer which will do this for you.

To update the site, run re-install.

Our site depends on: apache2, php, MySQLi, php-MySQL, and bash
