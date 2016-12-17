README FILE

TCP EVALUATION IN SEMI-LIVE STREAMS , by
Team ENIGMA
2015-06-02.

INTRODUCTION:
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
A tool to measure the TCP performance of the data streams by evaluatiing various parametrics such as Round Trip Time (RTT), Socket Setup Time (STT) and the Data Rate per Stream. 
The tool obtains the data/stream to be evaluated from a consumer via a DPMI (Distributed Passive Measurement Infrastructure).
A WebGUI is provided through which the user can interact with the tool. The user has the option of adding or removing details regarding the various streams that are to be evaluated.
A RESTful API is also provided whereby the user can share the obtained/evaluated data from the tool with any third party data source if necessary.


REQUIREMENTS: 
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
•DPMI setup 
•MySQL server 
•MySQL Database 
•Libcap_utils
•RRD tool 
•APACHE 
•PHP
•Crontab
•phpmyadmin 
•SSH 
•SNMP
•Tshark
•PERL MODULES

*For detailed individual installation steps, refer Installation Document.

REQUIRED PERL MODULES:
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
a)DBI Module 
b)DBD::MySql 
c)RRD::Simple 
d)Data::Dumper  
e)Net::SNMP 
f)Mail::Sender 
g)List::MoreUtils 
h)Experimental 
i)Net::SSH::Perl 
j)Net::SCP::Expect
k)RRD::Editor 
              
*For detailed module installation steps, refer Installation Document.

PREREQUISITES FOR TRAPS:
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
In the folder /etc/snmp/ open the file "snmptrapd.conf", add the following lines 
 
 snmpTrapdAddr udp:50162  disableAuthorization yes  authCommunity log,execute,net public 
 traphandle 1.3.6.1.4.1.41717.10.* /usr/bin/perl /path/to/et2536vaga/project/web/backend.pl 
 
Open the file snmpd in /etc/default/. Edit the line 
 
 	 	TRAPDRUN=no to TRAPDRUN=yes 
 
Restart the snmp server by using  
 
 	 	sudo service snmpd restart 



SYSTEM REQUIREMENTS:
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
•Ubuntu 14.04 Operating System
-700 MHz processor (Intel Celeron or better)
-512 MiB RAM (system memory)
-5 GB Hard-drive space (USB stick, memory card or external drive)
-VGA 1024x768 screen resolution
-Internet access


INSTALLATION INSTRUCTIONS:
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
•Save the project tool in a folder.
•Open the linux terminal.
•Connect to the consumer of DPMI. 
•Install tshark and sshpass in localhost and the consumer. 
                                   
      Run the following command in terminals:
                        sudo apt-get install tshark
                        sudo apt-get install sshpass 


•Change the default location of apache-server using following commands,

                        sudo nano /etc/apache2/sites-available/000-default.conf
 
Change the following line as choice of user:
 
                            /home/Ubuntu/ 
Type the command,
                   sudo nano /etc/apache2/apache2.conf 

The working path is seen as: 

                           /home/Ubuntu/ 

Then restart the apache server using the following command: 

                    sudo service apache2 restart 

•The user must clear the browsing history after restarting the apache server. 
 
•After extracting the files from the tar file, the project2 folder from the file should be moved to the working directory according to the choice of the user  
    
                   /home/ubuntu/ 

•The user must do the following: 

        1.Open a web server 
	2.Type localhost in the addressbar and open project 2 
	3.Then open Web folder 
	4.Open 1.php file 
	5.The login page appears.
        6.Username is "root" and password is "enigma"
        7.Now enter the consumer details (Sample details are given below)

IP address: 10.1.0.17                                         #IP address of the consumer 
Username: ats                                                 #username of the consumer
Link1 : 01::71                                                #Streams of TCP traffic
Link2 : 01::72
Source path : /home/ats                                       #Working directory path in consumer 
Destination path : /home/Ubuntu/                              #Path where the project folder is saved. Here in this case, Ubuntu is the home folder.

Press "Submit" after entering these details. 

•Now open the terminal and enter the following commands for the code to run,
         cd Project2/Web/                                    #Here my project2 folder is at Home and the parent perl script is in Web folder.
           perl head.pl

•Now open the web browser, log in and view the metrics and their graphs by selecting their respective clickable icons.
•Set the threshold limit. The normal and critical warnings are seen on the screen. Trap and email notifications are received by the user.

