<?PHP
$sql = 'some query...';
$result = mysql_query($q);

if (! $result){
   throw new My_Db_Exception('Database error: ' . mysql_error());
}

while($row = mysql_fetch_assoc($result)){
  //handle rows.
}
