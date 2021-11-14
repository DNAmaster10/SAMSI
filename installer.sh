echo "This is the installer for samsi. It will install the samsi webapp to this installers current location. Are you sure you wish to continue? y/n"
read user_input
if !["$user_input" == "y"]; then
    echo "Exiting"
    exit 3
fi
echo "Selected yes"
echo "Finding script path"
script_dir=$( cd "$( dirname "$0" )" && pwd )
echo "Script path found at" $script_dir
echo "Trying to create Data folder"
if [ ! -d $script_dir/Data ]; then
    mkdir $script_dir/Data
else
    echo "An instance of samsi already exists, would you like to overwrite it or exit? y/n"
    read user_input
    if !["$user_input" == "y"]; then
        echo "Exiting"
        exit 3
    else
        echo "skipping"
    fi
fi
echo "Data folder created"
echo "Attempting to create pages directory"
if [ ! -d $script_dir/Pages ]; then
    mkdir $script_dir/Pages
else
    echo "Pages directory already exists, skipping"
fi
echo "Attempting to create templates directory"
if [ ! -d $script_dir/Templates ]; then
    mkdir $script_dir/Templates
else
    echo "Templates directory already exists, skipping"
fi
echo "Attempting to write location to text file for later use"
echo "$script_dir" > $script_dir/Data/location.txt
echo "Writen directory location to text file"
echo "Attempting to download index.php form GitHub"
curl --get https://raw.githubusercontent.com/DNAmaster10/SAMSI/main/index.php > /var/www/html/index.php
if [ ! -f $script_dir/index.php ]; then
    echo "Could not establish a connection with github"
    exit 3
fi
curl --get https://raw.githubusercontent.com/DNAmaster10/SAMSI/main/adminPanelTemplate.txt > /var/www/html/Templates/adminPanelTemplate.txt
curl --get https://raw.githubusercontent.com/DNAmaster10/SAMSI/main/register.php > /var/www/html/Pages/register.php
curl --get https://raw.githubusercontent.com/DNAmaster10/SAMSI/main/schoolRegComplete.php > /var/www/html/Pages/schoolRegComplete.php
echo "Found index page"
