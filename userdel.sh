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
   echo "-h     Help and exit"
   echo
}

while getopts u:p:l:h flag
do
    case "${flag}" in
	u) username=${OPTARG};;
        h) # display Help
           Help
           exit;;
        \?) # incorrect option
            echo "Error: Invalid option"
            echo "Use -h to display the options"
            exit;;
    esac
done

userdel -r $username 


