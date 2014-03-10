<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once 'excel_reader2.php';
$data = new Spreadsheet_Excel_Reader("example.xls"); ?>
<html>
<body> 
<?php
  $temp=$data->dump(true,true); //echo $temp;
  preg_match_all('/<nobr>(.*?)<\/nobr>/s', $temp, $m); print_r($m[1][10]);
  $size = count($m[1]);
  $fp = fopen('data.csv', 'w+');
  $i=0;
  while($i<$size)
  {
    fwrite($fp, $m[1][$i].";".$m[1][$i+1].";"."\n"); $i=$i+2;
  }
?>
</body>
</html>
