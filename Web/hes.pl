#!/usr/bin/perl
#use strict;
use DBI;
use DBD::mysql;

%conf=do "db.conf";
$tablename="metrics";
$connect=DBI->connect("DBI:mysql:".$conf{database}.";".$conf{host}.";".$conf{port},$conf{username},$conf{password});

$queCRD = "SELECT * FROM `credentials`";
        $queryCRD = $connect->prepare($queCRD);
        $queryCRD->execute();

while (@rowCRD=$queryCRD->fetchrow_array())
{

	push(@CRD , "$rowCRD[0]");
	push(@CRD , "$rowCRD[1]");
	push(@CRD , "$rowCRD[2]");
	push(@CRD , "$rowCRD[3]");
	push(@CRD , "$rowCRD[4]");
	push(@CRD , "$rowCRD[5]");
	push(@CRD , "$rowCRD[6]");
}
#print Dumper @CRD;
$r='enigmanagios@194.47.151.86';
$CMD1="sshpass -p 'enigmanagios' ssh $r";
system ($CMD1);
 my @cmd = "sshpass -p '$CRD[3]' ssh $CRD[2]$CRD[1]";
push (@cmd , "bash");
push (@cmd ,"echo $CRD[3] | sudo -S capdump --packets=10000 -i eth2 -tcp -o test.cap 01::72 01::71");
push (@cmd , "cap2pcap -o test.pcap test.cap"); 
push (@cmd , "tshark -r test.pcap 'tcp.flags==0x02' -o tcp.relative_sequence_numbers:FALSE -T fields -e tcp.seq -e tcp.ack -e frame.time_epoch -e tcp.len -e ip.addr -e tcp.srcport -e tcp.dstport -E separator=',' > test_in.txt");
push (@cmd , "tshark -r test.pcap 'tcp.flags==0x12 or tcp.flags==0x10' -o tcp.relative_sequence_numbers:FALSE -T fields -e tcp.seq -e tcp.ack -e frame.time_epoch -e tcp.len -e ip.addr -e tcp.srcport -e tcp.dstport -E separator=',' > test_out.txt");
push (@cmd,"tshark -r test.pcap -q -z conv,tcp > tcp.txt") ;
push (@cmd ,"exit");
push (@cmd ,"exit");
push (@cmd ,"sshpass -p '$CRD[3]' scp '$CRD[2]$CRD[1]:/home/atslab/{test_in.txt,test_out.txt,tcp.txt}'");
push (@cmd ,"exit");
push (@cmd ,"sshpass -p 'enigmanagios' scp 'enigmanagios@194.47.151.86:/home/enigmanagios/{test_in.txt,test_out.txt,tcp.txt}'");
foreach $a (@cmd) {

system("$a");
sleep 15;
};
#system("perl mary.pl");
exit;
