
<?php
// include("config.php");
$IP="192.168.10.91";
$Key="0";
if($IP=="") $IP="192.168.10.91";
if($Key=="") $Key="0";

// echo 'gggggggg';
    $Connect = fsockopen($IP, "80", $errno, $errstr, 1);
    // echo $Connect.' ff';
    if($Connect){
        
        $soap_request="<GetAttLog>
                            <ArgComKey xsi:type=\"xsd:integer\">".$Key."</ArgComKey>
                            <Arg><PIN xsi:type=\"xsd:integer\">All</PIN></Arg>
                        </GetAttLog>";
      
      

        $newLine="\r\n";
        fputs($Connect, "POST /iWsService HTTP/1.0".$newLine);
        fputs($Connect, "Content-Type: text/xml".$newLine);
        fputs($Connect, "Content-Length: ".strlen($soap_request).$newLine.$newLine);
        fputs($Connect, $soap_request.$newLine);
        $buffer="";
        while($Response=fgets($Connect, 1024)){
            $buffer=$buffer.$Response;
        }

        // printf($buffer);

        // echo 'konek';exit();
    }else echo "Koneksi Gagal";
  
  
    $buffer=Parse_Data($buffer,"<GetAttLogResponse>","</GetAttLogResponse>");
    $buffer=explode("\r\n",$buffer);
    for($a=0;$a<count($buffer);$a++){
        $data=Parse_Data($buffer[$a],"<Row>","</Row>");
      
        $pin=Parse_Data($data,"<PIN>","</PIN>");
        $datetime=Parse_Data($data,"<DateTime>","</DateTime>");
        $status=Parse_Data($data,"<Status>","</Status>");

        if(substr($datetime,0,10)=='2019-05-15'){
            echo $data.' | '.$pin.' | '.$datetime.' | '.$status.' | '.substr($datetime,0,10);
        }
        
        echo '<br/>';
      
    }
echo "<script>alert('Sudah Selesai'); </script>";

function Parse_Data($data,$p1,$p2) {
  $data = " ".$data;
  $hasil = "";
  $awal = strpos($data,$p1);
  if ($awal != "") {
    $akhir = strpos(strstr($data,$p1),$p2);
    if ($akhir != ""){
      $hasil=substr($data,$awal+strlen($p1),$akhir-strlen($p1));
    }
  }
  return $hasil;  
}
?>