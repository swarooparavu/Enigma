<!DOCTYPE html>
<html>
<body>

<?php


 $opts_d = array( "--start", "-1h", "--vertical-label=Round Trip Time",
		         "DEF:bps1=new2.rrd:rtt:AVERAGE",
		
		         "LINE1:bps1#FF0000:In traffic\\r",
			 
			 "--dynamic-labels",
			 "--title=hourly rttgraph",
	  		 "--color=BACK#CCCCCC",      
		    	 "--color=CANVAS#CCFFFF",    
		    	 "--color=SHADEB#9999CC",
		         "COMMENT:\\n",
		         "GPRINT:bps1:LAST:Last In \: %6.2lf %Sseconds",
		         "COMMENT:  ", 
			
			 "GPRINT:bps1:MAX:Maximum In \: %6.2lf %Sseconds",
		         "COMMENT:  ",
			 
			 "GPRINT:bps1:MIN:Minimum In \: %6.2lf %Sseconds",
			 "COMMENT:  ",
			 
			 "GPRINT:bps1:AVERAGE:Average In \: %6.2lf %Sseconds",
		         "COMMENT:  ",                  
		         
		       );

	  $ret_d = rrd_graph("RTThour.png", $opts_d);

 $opts_w = array( "--start", "-1d", "--vertical-label=Round Trip Time",
		         "DEF:bps1=new2.rrd:rtt:AVERAGE",
		
		         "LINE1:bps1#FF0000:In traffic\\r",
			 
			 "--dynamic-labels",
			 "--title=daily rttgraph",
	  		 "--color=BACK#CCCCCC",      
		    	 "--color=CANVAS#CCFFFF",    
		    	 "--color=SHADEB#9999CC",
		         "COMMENT:\\n",
		         "GPRINT:bps1:LAST:Last In \: %6.2lf %Sseconds",
		         "COMMENT:  ", 
			
			 "GPRINT:bps1:MAX:Maximum In \: %6.2lf %Sseconds",
		         "COMMENT:  ",
			 
			 "GPRINT:bps1:MIN:Minimum In \: %6.2lf %Sseconds",
			 "COMMENT:  ",
			 
			 "GPRINT:bps1:AVERAGE:Average In \: %6.2lf %Sseconds",
		         "COMMENT:  ",                  
		         
		       );

	  $ret_w = rrd_graph("RTTday.png", $opts_w); 
	  
	  
	  
	  $opts_m = array( "--start", "-1w", "--vertical-label=Round Trip Time",
		         "DEF:bps1=new2.rrd:rtt:AVERAGE",
		
		         "LINE1:bps1#FF0000:In traffic\\r",
			 
			 "--dynamic-labels",
			 "--title=weekly rttgraph",
	  		 "--color=BACK#CCCCCC",      
		    	 "--color=CANVAS#CCFFFF",    
		    	 "--color=SHADEB#9999CC",
		         "COMMENT:\\n",
		         "GPRINT:bps1:LAST:Last In \: %6.2lf %Sseconds",
		         "COMMENT:  ", 
			
			 "GPRINT:bps1:MAX:Maximum In \: %6.2lf %Sseconds",
		         "COMMENT:  ",
			 

			 "GPRINT:bps1:MIN:Minimum In \: %6.2lf %Sseconds",
			 "COMMENT:  ",
			 
			 "GPRINT:bps1:AVERAGE:Average In \: %6.2lf %Sseconds",
		         "COMMENT:  ",                  
		         
		       );

	  $ret_m = rrd_graph("RTTweek.png", $opts_m); 
	  
	  $opts_y = array( "--start", "-1m", "--vertical-label=Round Trip Time",
		         "DEF:bps1=new2.rrd:rtt:AVERAGE",
		
		         "LINE1:bps1#FF0000:In traffic\\r",
			 
			 "--dynamic-labels",
			 "--title=monthly  rttgraph",
	  		 "--color=BACK#CCCCCC",      
		    	 "--color=CANVAS#CCFFFF",    
		    	 "--color=SHADEB#9999CC",
		         "COMMENT:\\n",
		         "GPRINT:bps1:LAST:Last In \: %6.2lf %Sseconds",
		         "COMMENT:  ", 
			
			 "GPRINT:bps1:MAX:Maximum In \: %6.2lf %Sseconds",
		         "COMMENT:  ",
			 
			 "GPRINT:bps1:MIN:Minimum In \: %6.2lf %Sseconds",
			 "COMMENT:  ",
			 
			 "GPRINT:bps1:AVERAGE:Average In \: %6.2lf %Sseconds",
		         "COMMENT:  ",                  
		         
		       );

	  $ret_y = rrd_graph("RTTmonth.png", $opts_y);

 $opts_hsst = array( "--start", "-1h", "--vertical-label=Socket Setup Time",
		         "DEF:bps1=new2.rrd:sst:AVERAGE",
		
		         "LINE1:bps1#FF0000:In traffic\\r",
			 
			 "--dynamic-labels",
			 "--title=hourly sstgraph",
	  		 "--color=BACK#CCCCCC",      
		    	 "--color=CANVAS#CCFFFF",    
		    	 "--color=SHADEB#9999CC",
		         "COMMENT:\\n",
		         "GPRINT:bps1:LAST:Last In \: %6.2lf %Sseconds",
		         "COMMENT:  ", 
			
			 "GPRINT:bps1:MAX:Maximum In \: %6.2lf %Sseconds",
		         "COMMENT:  ",
			 
			 "GPRINT:bps1:MIN:Minimum In \: %6.2lf %Sseconds",
			 "COMMENT:  ",
			 
			 "GPRINT:bps1:AVERAGE:Average In \: %6.2lf %Sseconds",
		         "COMMENT:  ",                  
		         
		       );

	  $ret_hsst = rrd_graph("SSThour.png", $opts_hsst);

$opts_dsst = array( "--start", "-1d", "--vertical-label=Socket Setup Time",
		         "DEF:bps1=new2.rrd:sst:AVERAGE",
		
		         "LINE1:bps1#FF0000:In traffic\\r",
			 
			 "--dynamic-labels",
			 "--title=daily sstgraph",
	  		 "--color=BACK#CCCCCC",      
		    	 "--color=CANVAS#CCFFFF",    
		    	 "--color=SHADEB#9999CC",
		         "COMMENT:\\n",
		         "GPRINT:bps1:LAST:Last In \: %6.2lf %Sseconds",
		         "COMMENT:  ", 
			
			 "GPRINT:bps1:MAX:Maximum In \: %6.2lf %Sseconds",
		         "COMMENT:  ",
			 
			 "GPRINT:bps1:MIN:Minimum In \: %6.2lf %Sseconds",
			 "COMMENT:  ",
			 
			 "GPRINT:bps1:AVERAGE:Average In \: %6.2lf %Sseconds",
		         "COMMENT:  ",                  
		         
		       );

	  $ret_dsst = rrd_graph("SSTdaily.png", $opts_dsst);

$opts_wsst = array( "--start", "-1w", "--vertical-label=Socket Setup Time",
		         "DEF:bps1=new2.rrd:sst:AVERAGE",
		
		         "LINE1:bps1#FF0000:In traffic\\r",
			 
			 "--dynamic-labels",
			 "--title=weekly sstgraph",
	  		 "--color=BACK#CCCCCC",      
		    	 "--color=CANVAS#CCFFFF",    
		    	 "--color=SHADEB#9999CC",
		         "COMMENT:\\n",
		         "GPRINT:bps1:LAST:Last In \: %6.2lf %Sseconds",
		         "COMMENT:  ", 
			
			 "GPRINT:bps1:MAX:Maximum In \: %6.2lf %Sseconds",
		         "COMMENT:  ",
			 
			 "GPRINT:bps1:MIN:Minimum In \: %6.2lf %Sseconds",
			 "COMMENT:  ",
			 
			 "GPRINT:bps1:AVERAGE:Average In \: %6.2lf %Sseconds",
		         "COMMENT:  ",                  
		         
		       );

	  $ret_wsst = rrd_graph("SSTweek.png", $opts_wsst);

$opts_msst = array( "--start", "-1m", "--vertical-label=Socket Setup Time",
		         "DEF:bps1=new2.rrd:sst:AVERAGE",
		
		         "LINE1:bps1#FF0000:In traffic\\r",
			 
			 "--dynamic-labels",
			 "--title=monthly sstgraph",
	  		 "--color=BACK#CCCCCC",      
		    	 "--color=CANVAS#CCFFFF",    
		    	 "--color=SHADEB#9999CC",
		         "COMMENT:\\n",
		         "GPRINT:bps1:LAST:Last In \: %6.2lf %Sseconds",
		         "COMMENT:  ", 
			
			 "GPRINT:bps1:MAX:Maximum In \: %6.2lf %Sseconds",
		         "COMMENT:  ",
			 
			 "GPRINT:bps1:MIN:Minimum In \: %6.2lf %Sseconds",
			 "COMMENT:  ",
			 
			 "GPRINT:bps1:AVERAGE:Average In \: %6.2lf %Sseconds",
		         "COMMENT:  ",                  
		         
		       );

	  $ret_msst = rrd_graph("SSTmonth.png", $opts_msst);

$opts_hDRATE = array( "--start", "-1h", "--vertical-label=Datarate per stream",
		         "DEF:bps1=new2.rrd:data:AVERAGE",
		
		         "LINE1:bps1#FF0000:In traffic\\r",
			 
			 "--dynamic-labels",
			 "--title=hourly DRATEgraph",
	  		 "--color=BACK#CCCCCC",      
		    	 "--color=CANVAS#CCFFFF",    
		    	 "--color=SHADEB#9999CC",
		         "COMMENT:\\n",
		         "GPRINT:bps1:LAST:Last In \: %6.2lf KBps",
		         "COMMENT:  ", 
			
			 "GPRINT:bps1:MAX:Maximum In \: %6.2lf KBps",
		         "COMMENT:  ",
			 
			 "GPRINT:bps1:MIN:Minimum In \: %6.2lf KBps",
			 "COMMENT:  ",
			 
			 "GPRINT:bps1:AVERAGE:Average In \: %6.2lf KBps",
		         "COMMENT:  ",                  
		         
		       );

	  $ret_hDRATE = rrd_graph("DRATEhour.png", $opts_hDRATE);

$opts_dDRATE = array( "--start", "-1d", "--vertical-label=Datarate per stream",
		         "DEF:bps1=new2.rrd:data:AVERAGE",
		
		         "LINE1:bps1#FF0000:In traffic\\r",
			 
			 "--dynamic-labels",
			 "--title=daily DRATEgraph",
	  		 "--color=BACK#CCCCCC",      
		    	 "--color=CANVAS#CCFFFF",    
		    	 "--color=SHADEB#9999CC",
		         "COMMENT:\\n",
		         "GPRINT:bps1:LAST:Last In \: %6.2lf KBps",
		         "COMMENT:  ", 
			
			 "GPRINT:bps1:MAX:Maximum In \: %6.2lf KBps",
		         "COMMENT:  ",
			 
			 "GPRINT:bps1:MIN:Minimum In \: %6.2lf KBps",
			 "COMMENT:  ",
			 
			 "GPRINT:bps1:AVERAGE:Average In \: %6.2lf KBps",
		         "COMMENT:  ",                  
		         
		       );

	  $ret_dDRATE = rrd_graph("DRATEday.png", $opts_dDRATE);

$opts_wDRATE = array( "--start", "-1w", "--vertical-label=Datarate per stream",
		         "DEF:bps1=new2.rrd:data:AVERAGE",
		
		         "LINE1:bps1#FF0000:In traffic\\r",
			 
			 "--dynamic-labels",
			 "--title=weekly DRATEgraph",
	  		 "--color=BACK#CCCCCC",      
		    	 "--color=CANVAS#CCFFFF",    
		    	 "--color=SHADEB#9999CC",
		         "COMMENT:\\n",
		         "GPRINT:bps1:LAST:Last In \: %6.2lf KBps",
		         "COMMENT:  ", 
			
			 "GPRINT:bps1:MAX:Maximum In \: %6.2lf KBps",
		         "COMMENT:  ",
			 
			 "GPRINT:bps1:MIN:Minimum In \: %6.2lf KBps",
			 "COMMENT:  ",
			 
			 "GPRINT:bps1:AVERAGE:Average In \: %6.2lf KBps",
		         "COMMENT:  ",                  
		         
		       );

	  $ret_wDRATE = rrd_graph("DRATEweek.png", $opts_wDRATE);

$opts_mDRATE = array( "--start", "-1m", "--vertical-label=Data rate per stream",
		         "DEF:bps1=new2.rrd:data:AVERAGE",
		
		         "LINE1:bps1#FF0000:In traffic\\r",
			 
			 "--dynamic-labels",
			 "--title=monthly DRATEgraph",
	  		 "--color=BACK#CCCCCC",      
		    	 "--color=CANVAS#CCFFFF",    
		    	 "--color=SHADEB#9999CC",
		         "COMMENT:\\n",
		         "GPRINT:bps1:LAST:Last In \: %6.2lf KBps",
		         "COMMENT:  ", 
			
			 "GPRINT:bps1:MAX:Maximum In \: %6.2lf KBps",
		         "COMMENT:  ",
			 
			 "GPRINT:bps1:MIN:Minimum In \: %6.2lf KBps",
			 "COMMENT:  ",
			 
			 "GPRINT:bps1:AVERAGE:Average In \: %6.2lf KBps",
		         "COMMENT:  ",                  
		         
		       );

	  $ret_mDRATE = rrd_graph("DRATEmonth.png", $opts_mDRATE);

header("Refresh:5");

?>

<img src="RTThour.png" alt="RTThour" style="width:304px;height:228px;">
<img src="RTTday.png" alt="RTTday" style="width:304px;height:228px;">
<img src="RTTweek.png" alt="RTTweek" style="width:304px;height:228px;">
<img src="RTTmonth.png" alt="RTTmonth" style="width:304px;height:228px;">
<img src="SSThour.png" alt="SSThour" style="width:304px;height:228px;">
<img src="SSTdaily.png" alt="SSTday" style="width:304px;height:228px;">
<img src="SSTweek.png" alt="SSTweek" style="width:304px;height:228px;">
<img src="SSTmonth.png" alt="SSTmonth" style="width:304px;height:228px;">
<img src="DRATEhour.png" alt="DRATEhour" style="width:304px;height:228px;">
<img src="DRATEday.png" alt="DRATEday" style="width:304px;height:228px;">
<img src="DRATEweek.png" alt="DRATEweek" style="width:304px;height:228px;">
<img src="DRATEmonth.png" alt="DRATEmonth" style="width:304px;height:228px;">



</body>
</html>



