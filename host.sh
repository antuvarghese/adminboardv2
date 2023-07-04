#!/bin/bash
ip a | grep 135.181.197.28 | awk '{print $2}' | cut -f1 -d "/"
