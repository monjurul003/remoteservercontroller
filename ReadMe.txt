Remote server controller web interface.

********* File description *************
Index file: There is an index file (index.php) which calls the exec_shell.php file based on the selection of rebooting or shutdown. 

lan_servers.txt contains the server name and IP addresses seperated by space. There are two shell scripts one for shut down another for rebooting. I assumed, the server pc already have the super user priviledge to conduct shutdown and reboot operations.


********* How to launch *************

Put the folder in htdocs folder under xampp. Run the xampp server and then launch the index.php from browser. 

The idea is adopted from: https://geek.co.il/2009/07/20/script-day-shutting-down-multiple-servers-at-once


