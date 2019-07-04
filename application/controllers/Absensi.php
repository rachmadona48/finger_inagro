<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// $this->load->library('format_uang');
		$this->load->model(array('model_absensi'));
		$this->load->helper('file');
        // $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        
	}
	
	public function index()
	{
		// echo base_url();exit();
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

        echo $date.' | '.$date_1;

		$IP="10.161.100.3";
		$Key="0";
		if($IP=="") $IP="10.161.100.3";
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
        echo $date.' | '.$date_1.'<br/>';

        // Jam masuk
        $get_data_masuk = $this->model_absensi->get_log_masuk($date_1);
        // $data_masuk = json_encode($get_data_masuk);
        // $masuk = $this->send_to_corporate($data_masuk,'I',$date_1);
        foreach ($get_data_masuk as $masuk) {
        	$data_masuk = json_encode($masuk);
        	// echo $data_masuk.' - '.$masuk->USERID;
        	$masuk = $this->send_to_corporate($data_masuk,'I',$date_1,$masuk->USERID);
        }

        // exit();
        

        // Jam pulang
        $get_data_pulang = $this->model_absensi->get_log_pulang($date_1);
        // $data_pulang = json_encode($get_data_pulang);
        // $pulang = $this->send_to_corporate($data_pulang,'O',$date_1);
        foreach ($get_data_pulang as $pulang) {
        	$data_pulang = json_encode($pulang);
        	// echo $data_masuk.' - '.$masuk->USERID;
        	$pulang = $this->send_to_corporate($data_pulang,'O',$date_1,$pulang->USERID);
        }

        $return = array('respon' => 'sukses');
        echo json_encode($return);
	}

	public function send_to_corporate($data_kirim,$CHECKTYPE,$date_1,$id_mesin){
		$url = 'http://api.liramedika.com:8855/hris/v1/attendance/insertFingerprint';
		$appid = 'DZEA7E79O3';
		$secret = 'FrOymp6bYz4huFqd2UygaE0HbLdCNbpYXzD1X5JF9dC09691dm';
		$idcompany= '9';

		// echo $data_kirim;exit();

		//hit lira api
        $api_guzzle = new \GuzzleHttp\Client();
        $data = [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencode',
                'appid' => $appid,
                'secret' => $secret,
                'idcompany' => $idcompany,
            ],
            'body' => $data_kirim
        ];
        
        // echo '<pre>';
        // print_r($params);
        // echo '</pre>';

        try {
            $respon = $api_guzzle->request('POST', $url, $data);
            $body = $respon->getBody();
            $output = json_decode($body);

            $pesan = $output->status.' '.$output->message;
            print_r($output);

        }
        catch(\GuzzleHttp\Exception\BadResponseException $e) {
            $pesan = 'Gagal';
        }

        // print_r($output);
        $msg = $pesan.' : '.$date_1.'('.$CHECKTYPE.')';
        $log = $this->model_absensi->log_push_api($msg,$id_mesin,$CHECKTYPE);

  //       $fp = fopen('file_api.txt', 'w');
		// fwrite($fp, $pesan.' : '.$date_1.'('.$CHECKTYPE.')'. "\n");
		// fclose($fp);

        return True;
	}

	



}
