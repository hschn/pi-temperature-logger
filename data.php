<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<?php
$db = new SQLite3('/var/www/html/phpliteadmin/templog-db');

$result = $db->query('SELECT * FROM "SENSORDATA" WHERE 1');
//$result = $db->query('SELECT * FROM "SENSORDATA" WHERE TIMESTAMP >= datetime('now','-2 days')');

//$row = array();

while($row = $result->fetchArray(SQLITE3_ASSOC)){

$data[] = array(
'TEMPERATURE' => $row['TEMPERATURE'],
'TIMESTAMP' => $row['TIMESTAMP'],
'HUMIDITY' => $row['HUMIDITY']
);

}

//echo json_encode($data);

?>

<div id="myfirstchart" style="height: 250px;"></div>

<script>
new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: <?php echo json_encode($data);?>,
  // The name of the data record attribute that contains x-values.
  xkey: 'TIMESTAMP',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['TEMPERATURE','HUMIDITY'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Temperatur','Luftfeuchtigkeit']
});
</script>

