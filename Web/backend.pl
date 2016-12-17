#!/usr/bin/perl -w
use DBI;
use Net::SNMP;
use 5.010001;
use Mail::Sender;
$rttStatus= "";
$sstStatus= "";
$drsStatus= "";

%conf=do "db.conf";

$connect=DBI->connect("DBI:mysql:".$conf{database}.";".$conf{host}.";".$conf{port},$conf{username},$conf{password});


	$query_select = "SELECT * FROM `notifications`";
        $query = $connect->prepare($query_select);
        $query->execute();

@row=$query->fetchrow_array();

	$thresholdRTT=$row[1];
	$thresholdSST=$row[3];
	$thresholdDRS=$row[5];
	
$res = "SELECT * FROM Average";
$query1 = $connect->prepare($res);
$query1->execute();

@row1=$query1->fetchrow_array();

	$avgRTT = $row1[0];
	$avgSST = $row1[1];
	$avgDRS = $row1[2];

if($avgRTT>$thresholdRTT)
	{
		
	$rtt="1"; $rttStatus= " RTT threshold exceeded " ;
	}


if($avgSST>$thresholdSST)
	{
		$sst="1"; $sstStatus= " SST threshold exceeded " ;
	}


if($avgDRS>$thresholdDRS)
	{
		$drs="1"; $drsStatus= " Data Rate threshold exceeded " ;
	}

if ($rtt == "1" || $sst == "1"  || $drs=="1")

{


	$query_select = "SELECT * FROM `notifications`";
        $query = $connect->prepare($query_select);
        $query->execute();

@row=$query->fetchrow_array();
$email=$row[7];
print "this is $email.\n";


    my $sender = new Mail::Sender {
            auth => 'LOGIN',
            authid => 'nata15@student.bth.se',
            authpwd => 'pXpbPB_f',
            smtp => 'smtp.office365.com',
            port => 587,
            from => 'nata15@student.bth.se',
            to => $email,
            subject => 'WARNING!! WARNING!!',
            msg => 'THRESHOLD EXCEEDED',
            
    };
    #my $result =  $sender->MailFile({
    my $result =  $sender->MailMsg({
            msg => $sender->{msg},
            #file => $sender->{file},
    });
    
    print "$sender->{error_msg}\n>>>End.\n";
    

#--------------------------------------------------------------------------------------------
print "hostname $row[8] Community  $row[11] Port $row[10]"; 


	$sessionA = Net::SNMP->session(Hostname => $row[8],Community => $row[11],Port => $row[10]); 
			   $error_message = $sessionA->error();
			print "The error message is $error_message\n";	
	
								  $basha = "$row[9]";
									$trap = "$rttStatus $sstStatus $drsStatus";
								
								 @oids = ($basha,OCTET_STRING, $trap);
  							 $resultA = $sessionA->trap(-varbindlist  => \@oids);

							$sessionA->close;	
#-----------------------------------------------------------------------------------------------
print "End of the session"; 
}
system ("rm -rf test_in.txt test_out.txt tcp.txt");
system ("perl head.pl");
