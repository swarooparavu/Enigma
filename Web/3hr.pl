#!/usr/bin/perl

use DBI;
use DBD::mysql;
use RRD::Simple;
use Data::Dumper qw(Dumper);


%conf=do "db.conf";
$tablename="metrics";
$connect=DBI->connect("DBI:mysql:".$conf{database}.";".$conf{host}.";".$conf{port},$conf{username},$conf{password});

#---------------------------------------------------
$queAVG = "SELECT * FROM `Average`";
        $queryAVG = $connect->prepare($queAVG);
        $queryAVG->execute();

while (@rowAVG=$queryAVG->fetchrow_array())
{

	push(@AVGDA , "$rowAVG[2]");
	push(@AVGrt , "$rowAVG[0]");
	push(@AVGst , "$rowAVG[1]");

}
print Dumper @AVGDA;
foreach $avgd (@AVGDA)
	{
		$DATAR=$avgd+$DATAR;
	}
$DATAR = $DATAR/scalar(@AVGDA);

foreach $avgr (@AVGrt)
	{
		$ART=$avgr+$ART;
	}
$ART = $ART/scalar(@AVGrt);

foreach $avgs (@AVGst)
	{
		$AST=$avgs+$AST;
	}
$AST = $AST/scalar(@AVGst);



my $cur_time   = time() ;
    my $rrd = RRD::Simple->new(file => "holiday.rrd",cf => [ qw(AVERAGE) ],default_dstype => "GAUGE",on_missing_ds => "add");

    if (! -e "holiday.rrd")
        {                   
            $rrd->create("holiday.rrd","hour",rtt=>"GAUGE",sst=>"GAUGE",data=>"GAUGE");
        }

        $rrd->update("holiday.rrd",
		rtt=>$ART,
		sst=>$AST,
		data=>$DATAR
	);

 $query_insert = "INSERT INTO 3hrs (RTT,SST,DATAR) VALUES ('$ART','$AST','$DATAR')";
				    $query = $connect->prepare($query_insert);
				    $query->execute();
	$flush = $connect->prepare("TRUNCATE TABLE metrics");
	$flush->execute();		






