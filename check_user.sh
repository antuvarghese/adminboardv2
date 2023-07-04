#!/bin/bash

# Get the username from command-line argument
username="$1"

# Check if the username is provided
if [ -z "$username" ]; then
    echo "Please provide a username as an argument."
    exit 1
fi

# Check if the user exists
if id "$username" >/dev/null 2>&1; then
    echo "User '$username' exists."
else
    echo "User '$username' does not exist."
fi
