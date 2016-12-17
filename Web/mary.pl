#!/usr/bin/perl
use List::MoreUtils qw(first_index);
use warnings;
use DBI;
use DBD::mysql;
use RRD::Simple;
use Data::Dumper qw(Dumper);
use RRD::Editor ();
use experimental 'smartmatch';

#use List::AllUtils qw(sum);

%conf=do "db.conf";
$tablename="metrics";
$connect=DBI->connect("DBI:mysql:".$conf{database}.";".$conf{host}.";".$conf{port},$conf{username},$conf{password});

open inPacket,"test_in.txt";
open outPacket,"test_out.txt";
my @inpacketraw = <inPacket>;
my @outpacket = <outPacket>;

my @rttMatch = ""; #Out packet data
my @rttValues = ""; # RTT Values 
my @inpacket = "";
my @sstMatch = "";
my @sttValues= "";
my @RRT="";
my @SST="";




# $sth = $connect -> prepare("SELECT * FROM metrics" );
#			$sth-> execute();
#			@write = $sth->fetchrow_array();
				
#print "THe time is $write[5] \n";
#@time = split (" ",$write[5]);
#print "The array time is $time[1]";



					#	$time = "60";
			    #     	if ( curtime() = $write[7] + $time )
					#	{
					#			$sth1 = $connect -> prepare("TRUNCATE metrics" );
					#			$sth1-> execute();
					
					#	} 




	foreach $a (@outpacket)
		{
		
			my @values = split(',', $a);
	
			if (!$values[0]~~@rttMatch)
				{
			$red1 = join (">",$values[4],$values[6]);
			$red2 = join (">",$values[5],$values[7]);
			#print $red1."\n";

					push (@rttMatch , "$values[1]","$values[2]",);
					push (@sstMatch , "$values[1]","$values[0]","$values[2]"); # Store Data length 
					push (@ipso , "$values[1]","$red1","$red2");
					#push (@ipdo, "$values[1]","$values[6]","$values[7]");		
				
				}
		}
#print Dumper @ipdo;
	foreach $n (@inpacketraw)
		{
			my @value = split(',', $n);
			if (!$value[0]~~@inpacket)
				{
					push (@inpacket , "$value[0]","$value[2]");
#					push (@ipi,"$value[0]","$value[4]","$value[5]")			 
				}			
		}

my $count =scalar(@inpacket);
		
		for($l=1 ;  $l<$count ; $l=$l+2)
		{ 
			$y=$inpacket[$l];			 
			my $x=$y+1; #Data length to be added
			#print $y."\n";	
				
								
			for (my $k=0; $k <scalar(@rttMatch); $k++ )
				{
					if ($x eq $rttMatch[$k])
						{	
										
							my $elle=$k+1; 
						 $rt=$rttMatch[$elle];
						 $rr=$inpacket[$l+1];
							$mary=$rt-$rr;
					if($mary>0){
						if ($mary <3){
						 
							#print $mary."\n";
						push (@RTT,"$mary");
							}	
						}
					}
			}
			for (my $hed=0 ; $hed<scalar(@sstMatch); $hed++)
						{
						if ($x eq $sstMatch[$hed])
									{
							#print $sstMatch[$hed+1]."\n";
							$hell=$sstMatch[$hed+1]+1;
							#print $hell."\n";
						for(my $me=0 ; $me<scalar(@sstMatch); $me++){
							if($hell eq $sstMatch[$me])
									{
									#print $sstMatch[$me];
									$done=$sstMatch[$me+2]-$rr;
									if ($done>0)
										{
									if($done<1000){
									#print "SST = $done"."\n";
									push(@SST,"$done");
										}									
										}
									}
									}
								}

							}
			
	for (my $kick=0 ; $kick<scalar(@ipso); $kick++)
						{
							if ($x eq $ipso[$kick])
									{ $outips= $ipso[$kick+1];
										$outipd=$ipso[$kick+2];
						
										push(@ipslast, "$outips");
										push(@ipdlast, "$outipd");
									}
						}
					 
									
}

for($pl=0;$pl<scalar(@RTT);$pl++)

	 {				
					  $query_insert = "INSERT INTO $tablename (rrt,sst,ips,ipd) VALUES ('$RTT[$pl]','$SST[$pl]','$ipslast[$pl]','$ipdlast[$pl]')";
				    $query = $connect->prepare($query_insert);
				    $query->execute();
			

	}


#-------------------------------------------------------------------------------------------------

	$queAVG = "SELECT * FROM `data`";
        $queryAVG = $connect->prepare($queAVG);
        $queryAVG->execute();

while (@rowAVG=$queryAVG->fetchrow_array())
{

	push(@AVGDA , "$rowAVG[0]");
}
#print Dumper @AVGDA;
foreach $avgs (@AVGDA)
	{
		$DATAR=$avgs+$DATAR;
	}
$DATAR = $DATAR/scalar(@AVGDA);

my $iphone=0;

foreach $we(@RTT)
	{
		$iphone=$we+$iphone;
	}
$iphone = $iphone/scalar(@RTT);
		
my $samsung=0;

foreach $tv (@SST)
	{
		$samsung=$tv+$samsung;
	}
$samsung = $samsung/scalar(@SST);


print "$DATAR-- $iphone-- $samsung ";
if ($DATAR eq "" || $iphone eq ""|| $samsung eq "")
{

}else{
$med= "Average";
   $insert = "INSERT INTO $med (averageRRT,averageSST,averageDRATE) VALUES ('$iphone','$samsung','$DATAR')";
        $que = $connect->prepare($insert);
        $que->execute();

#-----------------------------------------------------------------------------------------------------------
my $cur_time   = time() ;
    my $rrd = RRD::Editor->new();

    if (! -e "new2.rrd")
        {                   
         
	  $rrd->create("DS:sst:GAUGE:600:U:U DS:rtt:GAUGE:600:U:U DS:data:GAUGE:600:U:U RRA:AVERAGE:0.5:1:288");
$rrd->save("new2.rrd");
        }
		$rrd->open("new2.rrd");
       	$x3="N:"."$samsung".":"."$iphone".":"."$DATAR";
		$rrd->update("$x3");


}

 @inpacketraw ="";
 @outpacket = "";

close (inPacket);
close (outPacket);
system ("perl backend.pl");

