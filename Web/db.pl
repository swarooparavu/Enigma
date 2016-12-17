use DBI;
use DBD::mysql;

$host = "localhost";
$database = "ENIGMA";
$tablename = "customers";
$user = "root";
$pwd = "ubuntu";
$connect = DBI->connect("DBI:mysql:$database:$host", $user, $pwd);

#open(FILE, '/home/');
my @array=(1,2,3);
my $var=(9,8,7);
#while ($i = <FILE>) {
 #   if ($i =~ /(id|name|http)/) {
  #      if ($i =~ s/("|:|,|name|id|url)//g) {
   #         ($key) = $i;
    #        push(@array, $var);
     #   }
  #  }
#}
close(FILE);

$n=@array;
$n=($n/=3);
$count = 0;

for ($x = 0; $x < $n; $x++)  {
    while ($count <= 3) {
        $nid = pop(@array);
        $nombre = pop(@array);
        $dir = pop(@array);

        $query_insert = "INSERT INTO $tablename (customer_id, revanth, tv) 
        VALUES ('$nid', '$nombre', '$dir')";
        $query = $connect->prepare($query_insert);
        $query->execute();

    $count++;
    }
}
