# SAMSI
A rip off teams made with friends

How to use:
Currently only works with GNU/Linux, and only to the directory /var/www/html and installs using a bash script. When i have time, i'll create a batch installer for Windows, and update all code to operatre from the current directory instead.

Make sure your web server has PhP, as that is what the backend of this site is made with. We've built the side for Apache, but i don't see why it wouldn't work on another web server.

The installer requires the wget and curl modules to function. I plan to change it to either only curl, or only wget when i decide which one i like best. It's looking likely that i'll use curl instead.

To install, drag installer.sh into your pages folder, and run with sh installer.sh /path_to_installer. If this does not work, then try run the installer with Sudo.

I'll write an update script to update your site when i get a chance, but this will require a large ammount of changes to be made to already existing code.
