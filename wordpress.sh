[ $# -eq 0 ] && 
{ 
   echo "To see the available options use below command"
   echo "Usage: $0 -h"
   exit 1
   }


Help()
{
   # Display Help
   echo "Below are the list of arguments."
   echo
   echo "Syntax: [-h|d]"
   echo "options:"
   echo "-d     Domain name."
   echo "-h     Help and exit."
   echo
}

while getopts u:p:d:h flag
do
    case "${flag}" in
        d) domain=${OPTARG};;
        h) # display Help
           Help
           exit;;
        \?) # incorrect option
            echo "Error: Invalid option"
            echo "Use -h to display the options"
            exit;;
    esac
done
echo "domain: $domain";

random=$(openssl rand -base64 5 | tr -dc 'a-zA-Z' | cut -c 1-5)
username=$(echo "$domain" | awk -F'[_.]' '{print $1}')
username=$(echo $username'-'$random)
echo $username
password=$(openssl rand -base64 15 | tr -dc 'a-zA-Z' | cut -c 1-15)
useradd -m $username
echo $username:$password | chpasswd

if [ -d "/home/$username/$domain/public" ]; then
   mv /home/$username/$domain/public /home/$username/$domain/public_mv.old
fi

mkdir -p /home/$username/$domain

root=/home/$username/$domain
#echo $root
cd $root
wget https://wordpress.org/latest.tar.gz
tar -zxvf latest.tar.gz
mv wordpress public
chown -R $username:$username $root/public
