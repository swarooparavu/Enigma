#!/usr/bin/perl
use warnings;
use DBI;
use DBD::mysql;
use RRD::Simple;
use Data::Dumper qw(Dumper);
#use Mail::Sender;
use experimental 'smartmatch'; 
open datarate,"tcp.txt";
%conf=do "db.conf";
$tablename="data";
$connect=DBI->connect("DBI:mysql:".$conf{database}.";".$conf{host}.";".$conf{port},$conf{username},$conf{password});

my @fun = <datarate>;
my $zero= 0;



	foreach $a (@fun)
		{
		
			my @values = split(' ', $a);
	
					
					$mes= join ("," , $values[0],$values[2]);
					push (@size , "$values[8]","$values[10]","$mes");
							
				
				
		}
#print Dumper @size;
for ($mac=0;$mac<scalar(@size);$mac=$mac+3)
{
 
$mix=$size[$mac];


$di=$size[$mac+1];
$dep=$size[$mac+2];
#print $dep."\n";
@dig=split(',', $dep);
$prob1=$dig[0];
$prob2=$dig[1];
 if ($di >0){
$data = $mix/$di;

							
	$insert = "INSERT INTO data (data_rate,ips,ipd) VALUES ('$data','$prob1','$prob2')";
        $que = $connect->prepare($insert);
        $que->execute();

push (@dataAvg ,"$data" );


#print "this is $data \n";
}
}
#$AVG="";
#print Dumper @dataAvg;

system ("perl mary.pl");




