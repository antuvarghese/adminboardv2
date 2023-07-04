#!/bin/bash
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
   echo "Syntax: [-h|-u|-p|-l]"
   echo "options:"
   echo "-u     username"
   echo "-p     password"
   echo "-l     location"
   echo "-h     Help and exit"
   echo "username,password and path(location) is mandatory"
   echo
}

while getopts u:p:l:h flag
do
    case "${flag}" in
	u) username=${OPTARG};;
	p) password=${OPTARG};;
        l) location=${OPTARG};;
        h) # display Help
           Help
           exit;;
      #  \?) # incorrect option
      #      echo "Error: Invalid option"
      #      echo "Use -h to display the options"
      #      exit;;
    esac
done
echo "$username $password $location";

if [ -d $location ]; then
        echo >&2 "Path already exist"; exit 1;
fi


sudo useradd -m -d $location $username 
echo $username:$password | chpasswd


grep $username /etc/passwd | cut -d ":" -f1
