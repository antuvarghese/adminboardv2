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
   echo "Syntax: ./user_mgmt.sh [add|check|delete] [-h|-u|-p|-l]"
   echo "options:"
   echo "add"
   echo "     -u     username"
   echo "     -p     password"
   echo "     -l     location"
   echo "     -h     Help and exit"
   echo "username,password is mandatory and location is optional"
   echo 
   echo "check"
   echo "     -u     username"
   echo 
   echo "delete"
   echo "     -u     username"
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
    esac
done
echo "$username $password $location";

# Function to add a user
add_user() {

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
    # Check if the username is provided
    if [ -z "$username" ] | [ -z "$password" ]; then
        echo "Invalid action. Usage: ./user_mgmt.sh add -u [username] -p [password] -l [path]"
        return 1
    fi

    # Check if the user already exists
    if id "$username" >/dev/null 2>&1; then
        echo "user '$username' already exists."
        return 1
    fi

    # Add the user

    if [ -z "$location" ]; then
        sudo useradd $username 
        echo $username:$password | chpasswd
        echo "user '$username' created"


    else
        sudo useradd -m -d $location $username 
        echo $username:$password | chpasswd
        echo "user '$username' created"

    fi
}

# Function to check the user exists

check_user() {
while getopts u:h flag
do
    case "${flag}" in
	    u) username=${OPTARG};;
        h) # display Help
           Help
           exit;;
   
    esac
done

# Check if the username is provided
if [ -z "$username" ]; then
    echo "Invalid action. Usage: ./user_mgmt.sh check -u [username]"
    exit 1
fi

# Check if the user exists
if id "$username" >/dev/null 2>&1; then
    echo "user '$username' exists."
else
    echo "user '$username' does not exist."
fi

}

# Function to delete a user
delete_user() {
while getopts u:h flag
do
    case "${flag}" in
	    u) username=${OPTARG};;
        h) # display Help
           Help
           exit;;
   
    esac
done
    # Check if the username is provided
    if [ -z "$username" ]; then
        echo "Invalid action. Usage: ./user_mgmt.sh delete -u [username]"
        return 1
    fi

    # Check if the user exists
    if ! id "$username" >/dev/null 2>&1; then
        echo "User '$username' does not exist."
        return 1
    fi

    # Delete the user
    sudo userdel -r $username 
    echo "User '$username' deleted successfully."
}

# Check the action argument
if [ "$1" == "add" ]; then
    shift
    add_user "$@"
elif [ "$1" == "check" ]; then
    shift
    check_user "$@"
elif [ "$1" == "delete" ]; then
    shift
    delete_user "$@"
else
    Help
    exit 1
fi
