<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// $this->load->library('format_uang');
		$this->load->model(array('model_absensi'));
        // $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        
	}
	
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('data_karyawan');
		$this->load->view('template/footer');

		// $this->load->view('awal');
	}

	public function master_karyawan()
	{		
		$this->model_absensi->data_karyawan();  
	}

	public function log()
	{
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('log_absen');
		$this->load->view('template/footer');

		// $this->load->view('awal');
	}

	public function log_absensi()
	{		
		$this->model_absensi->data_log_absen();  
	}

	public function get_log_absen(){

		date_default_timezone_set('Asia/Jakarta');
        $date  = date('Y-m-d');
        $first_date = strtotime($date);
        $backdate= strtotime('-1 day', $first_date);
        $date_1 = date('Y-m-d', $backdate);

		$IP="192.168.10.91";
		$Key="0";
		if($IP=="") $IP="192.168.10.91";
		if($Key=="") $Key="0";

		    $Connect = fsockopen($IP, "80", $errno, $errstr, 1);
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

		    }else echo "Koneksi Gagal";
		  
		  
		    $buffer=$this->Parse_Data($buffer,"<GetAttLogResponse>","</GetAttLogResponse>");
		    $buffer=explode("\r\n",$buffer);
		    for($a=0;$a<count($buffer);$a++){
		        $data=$this->Parse_Data($buffer[$a],"<Row>","</Row>");
		      
		        $pin=$this->Parse_Data($data,"<PIN>","</PIN>");
		        $datetime=$this->Parse_Data($data,"<DateTime>","</DateTime>");
		        $status=$this->Parse_Data($data,"<Status>","</Status>");

		        if(substr($datetime,0,10)==$date_1){
		            // echo $data.' | '.$pin.' | '.$datetime.' | '.$status.' | '.substr($datetime,0,10);
		            $this->model_absensi->insert_log_absen($pin,$datetime); 
		        }
		        
		        // echo '<br/>';
		      
		    }
		$return = array('respon' => 'sukses');
        echo json_encode($return);
	}

	public function Parse_Data($data,$p1,$p2) {
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

	public function kirim_data(){
		date_default_timezone_set('Asia/Jakarta');
        $date  = date('Y-m-d');
        $first_date = strtotime($date);
        $backdate= strtotime('-1 day', $first_date);
        $date_1 = date('Y-m-d', $backdate);

        $get_data = $this->model_absensi->get_log_masuk($date_1);

        foreach ($get_data as $key) {
        	$data_kirim = json_encode($key);

        	// echo $data_kirim;
        	$kirim = $this->kirim_data_masuk($data_kirim);
        }
        
        // $data_kirim = json_encode($get_data);
        // $kirim = $this->kirim_data_masuk($data_kirim);

        $return = array('respon' => 'sukses');
        echo json_encode($return);
	}

	public function kirim_data_masuk($data_kirim){
		echo $data_kirim;
		echo '<br>tes api<br>';
		echo 'tes 8';

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_PORT => "8855",
		  CURLOPT_URL => "http://api.liramedika.com:8855/hris/v1/attendance/insertFingerprint",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 500,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "$data_kirim",
		  // CURLOPT_POSTFIELDS => "[{\"USERID\":\"34\",\"CHECKTIME\":\"2019-05-16 08:03:19\",\"CHECKTYPE\":\"I\",\"IDCOMPANY\":\"9\"}]",
		  CURLOPT_HTTPHEADER => array(
		    "Accept: */*",
		    "Cache-Control: no-cache",
		    "Connection: keep-alive",
		    "Content-Type: application/json",
		    "Host: api.liramedika.com:8855",
		    "Postman-Token: 1e7b9548-b4b6-4352-b1b7-33c81725016f,77c88dc9-dcec-4ffd-8d7b-e6ca947d92f6",
		    "User-Agent: PostmanRuntime/7.13.0",
		    "accept-encoding: gzip, deflate",
		    "appid: DZEA7E79O3",
		    "cache-control: no-cache",
		    "content-length: 83",
		    "cookie: XSRF-TOKEN=eyJpdiI6IjkyRWw4eFBhT1YyYm5YMENKU21VRWc9PSIsInZhbHVlIjoiSnpYMUxCYlhxUDdWR0xrYm52R3dzcE4rdEFcL1ZBNFEwVnFsM04rc0VXalMycm1QV2VrRTRLQ2ZkS0VtTTlVK0QiLCJtYWMiOiIyM2FmOGRkMWE4ZjM2ZTQ2NGI1OWQxZmVlYzYwYzU0M2E2MWNhNDM3NDgxOWJlOGY2NThmOGJlOTM5Mjk1MjQ5In0%3D; laravel_session=eyJpdiI6Ijg1S2NZdzVzcmpDa2FUdmo3TE9Yemc9PSIsInZhbHVlIjoibVwvY1RzXC9RRFlsNEhZOXRSXC9vVlJhXC9HZXFKekNtZXhkMnJMUnNURE9UeE9JbGNrQjlSSHJhTGFEMFwvRFZPVGdHIiwibWFjIjoiNWQzMTFiMWUzNTFmNmYwN2RiMGEyN2YxMTM1MDdjOTBjOGRlMGIzNmViYTg5M2U1MTU3ZDNkNWE0MDk1YWZiOCJ9",
		    "idcompany: 9",
		    "secret: FrOymp6bYz4huFqd2UygaE0HbLdCNbpYXzD1X5JF9dC09691dm"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
		}
		
		// exit();

		return $response;
	}



}
