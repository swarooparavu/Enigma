#!/usr/bin/perl -w
use DBI;
use DBD::mysql;
use Net::SSH::Perl;
use Net::SCP::Expect;
%conf=do "db.conf";

$connect=DBI->connect("DBI:mysql:".$conf{database}.";".$conf{host}.";".$conf{port},$conf{username},$conf{password});


	$query_select = "SELECT * FROM `credentials`";
        $query = $connect->prepare($query_select);
        $query->execute();

@CRD=$query->fetchrow_array();


my $hostname = $CRD[1];
my $username = $CRD[2];
my $password = $CRD[3];
my $intr =$CRD[4];
my $link1 =$CRD[5];
my $link2 =$CRD[6];
my $SCRpath =$CRD[7];
my $DEST =$CRD[8];

#my $cmd = 'ls';
$r=join('@',$username,$hostname);
#print $r."\n";
#print $password."\n";
my $ssh = Net::SSH::Perl->new("$hostname", debug=>0);
$ssh->login("$username","$password");

#my @cmd="sudo capdump --packets=20000 -i eth2 -tcp -o test.cap 01::72 01::71";
my @cmd = "echo $password | sudo -S capdump --packets=10000 -i eth2 -tcp -o test.cap $link1 $link2";
push (@cmd , "cap2pcap -o test.pcap test.cap"); 
push (@cmd , "tshark -r test.pcap 'tcp.flags==0x02' -o tcp.relative_sequence_numbers:FALSE -T fields -e tcp.seq -e tcp.ack -e frame.time_epoch -e tcp.len -e ip.addr -e tcp.srcport -e tcp.dstport -E separator=',' > test_in.txt");
push (@cmd , "tshark -r test.pcap 'tcp.flags==0x12 or tcp.flags==0x10' -o tcp.relative_sequence_numbers:FALSE -T fields -e tcp.seq -e tcp.ack -e frame.time_epoch -e tcp.len -e ip.addr -e tcp.srcport -e tcp.dstport -E separator=',' > test_out.txt");
push (@cmd,"tshark -r test.pcap -q -z conv,tcp > tcp.txt") ;
foreach $a (@cmd){
$ssh->cmd($a);

}
print "$r:$SCRpath . \n";
system ("sshpass -p '$password' scp $r:$SCRpath/test_in.txt .");
system ("sshpass -p '$password' scp $r:$SCRpath/test_out.txt .");
system ("sshpass -p '$password' scp $r:$SCRpath/tcp.txt .");
system ("perl darma.pl");
