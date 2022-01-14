# SAMSI
An open source alternative to microsoft teams, incorporating features from iSAMS, such as a registration system.
Currently 0 security meassures are in place. This is just for testing purposes. Do NOT try and use as an actual website, and especially do not port forward any web servers hosting this. SQL injection is probably very possible as of now.

To use, (<strict>currently can only be installed on Linux</strike> can be installed on linux, but won't work due to directory paths not being current dir based. Will be ammended to work later.) run the bash script in the directory you want to install the site. Make sure you have git module installed, and you run the bash script as sudo.

You need to run re-install to install. <strike>Currently, running it will delete all old files, user profiles e.t.c. This is temporary for testing purposes, and we will write both an installer and an updater later on.</strike> No longer the case as we have migrated to SQL

Currently, you have to manually set up the databases with MySQLi, however we have plans to write an installer which will do this for you.
