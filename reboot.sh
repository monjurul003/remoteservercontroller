#!/bin/bash

# where the server list sits
LAN_LIST="$HOME/lan-servers.txt"

# Function to check if the server responds to ping
function testServer() {
    if ping -c1 $ip>/dev/null 2>&1; then 
	return 0
    else 
	return 1
    fi
}

# get a list of IPs for the servers
function getServers() {
    cat $LAN_LIST  | egrep -v '^(#|\s*$)'  | perl -ple 's/\s+/ /g;' | cut -d' ' -f 2
}


	# check if I can now log in to the server with no password
	if ! ssh -o "NumberOfPasswordPrompts 0" root@$ip '/bin/true' >/dev/null 2>&1; then
	    # if I still can't then something is broken
	    echo "Failed to complete key exchange with $ip - skipping this server"
	    continue;
	fi
    fi

    # start to shutdown the server
    echo -n "Rebooting $(ssh root@$ip hostname)"

    # halt the remote server
    ssh root@$ip reboot
    count=0
    # wait until its down or 300 seconds have passed
    while testServer $ip; do 
        sleep 1; echo -n "." 
        count=$(( $count + 1 )) # count up to 300
        if [ "$count" -gt 300 ]; then # wait till 300s then ping the server
    	    if  testServer $ip; then # if its alive then its already rebooted
                echo "Rebooting done $ip"
	       fi
	fi
    done
    echo ""
done

