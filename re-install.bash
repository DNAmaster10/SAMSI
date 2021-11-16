echo "Deleting and redownloading"
rm -rfd /var/www/html/*
wget -P https://raw.githubusercontent.com/DNAmaster10/SAMSI/main/installer.sh /var/www/html/installer.sh
sh /var/www/html/installer.sh
sudo chown -R www-data:www-data /var/www/html
sudo chmod -R 770 /var/www/html
echo "Finished installing"
exit 3
