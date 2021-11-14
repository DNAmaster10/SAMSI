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
echo "$script_dir" > $script_dir/data/location.txt
echo "Writen directory location to text file"
echo "Attempting to download index.php form GitHub"
curl https://raw.githubusercontent.com/DNAmaster10/SAMSI/main/index.php > $script_dir
if [ ! -f $script_dir/index.php ]; then
    echo "Could not establish a connection with github"
    exit 3
fi
curl https://raw.githubusercontent.com/DNAmaster10/SAMSI/main/adminPanelTemplate.txt > $script_dir/Templates
curl -P https://raw.githubusercontent.com/DNAmaster10/SAMSI/main/register.php > $script_dir/Pages
curl -P https://raw.githubusercontent.com/DNAmaster10/SAMSI/main/schoolRegComplete.php > $script_dir/Pages
echo "Found index page"
