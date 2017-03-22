<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<?php
$db = new SQLite3('/var/www/html/phpliteadmin/templog-db');

$result = $db->query('SELECT * FROM "SENSORDATA" WHERE 1');

$row = array();

$i = 0;

while($row = $result->fetchArray(SQLITE3_ASSOC)){

/*   if(!isset($res['ID'])) continue;
   $row[$i]['ID'] = $res['ID'];
   echo "<br>";
   $row[$i]['sensor'] = $res['SENSOR'];
   $row[$i]['temp'] = $res['TEMPERATURE'];
   $row[$i]['humi'] = $res['HUMIDITY'];
   $row[$i]['time'] = $res['TIMESTAMP'];

   $i++;
   print_r($row);
*/
$data[] = array(
'ID' => $row['ID'],
'SENSOR' => $row['SENSOR'],
'TEMPERATURE' => $row['TEMPERATURE'],
'HUMIDITY' => $row['HUMIDITY'],
'TIMESTAMP' => $row['TIMESTAMP']
);

}

echo json_encode($data);
//print_r($row);

?>

<div id="myfirstchart" style="height: 250px;"></div>

<script>
new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { year: '2008', value: 20 },
    { year: '2009', value: 10 },
    { year: '2010', value: 5 },
    { year: '2011', value: 5 },
    { year: '2012', value: 20 }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value']
});
</script>

