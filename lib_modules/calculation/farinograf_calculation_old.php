<?php
include $_SERVER['DOCUMENT_ROOT'].'/old_connection.php';
	$strSQL = "SELECT * FROM farinograf_averaged";
      $rs = mysql_query($strSQL);
      $arr = array();
	$previous = 0;
	while($rows = mysql_fetch_assoc($rs))
		{
		if(($rows['value'] - $previous) =< ($previous*0.2))
			{
			break;
			}
		else
			{
        $previous = $rows['value'];
			}
}
echo $rows['value'];

?>

