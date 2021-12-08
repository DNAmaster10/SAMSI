i=2;
cd /var/www/html
sudo git clone https://github.com/DNAmaster10/SAMSI.git
while [ $i -le 2 ]
do
    sudo mkdir /var/www/temp
    cd /var/www/temp
    sudo git clone https://github.com/DNAmaster10/SAMSI.git
    echo "Deleting and redownloading"
    sudo rm -r /var/www/html
    sudo mkdir /var/www/html
    sudo chown www-data:www-data /var/www/html
    sudo chmod 770 /var/www/html
    echo "Finished installing"
    sudo cp -r /var/www/temp/SAMSI /var/www/html
    echo "Number: $i"
    sudo rm -r -r /var/www/temp
    echo -n "Press enter to update site"
    read result
done

exit 3
