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
echo "Attempting to write location to text file for later use"
echo "Writen directory location to text file"
echo "Attempting to download index.html form GitHub"
wget -P $script_dir/Pages https://github.com/DNAmaster10/SAMSI/blob/b94b52fd9da5e0f2a112275f672450235a9e1a9b/index.html
fi
