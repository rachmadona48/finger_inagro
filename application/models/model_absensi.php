<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_absensi extends CI_Model {
	 
	


	public function __construct()
	{
		parent::__construct();

	}

	public function data_karyawan()
	{
		$requestData = $this->input->post();	

		$columns = array( 
			0 => 'id',
			1 => 'id',
			2 => 'id_mesin',
			3 => 'nama',
			4 => 'nik' 
		);	

		$sesi = $this->session->userdata('login');
		$tsesi = $sesi['BadanID'];
		$sql = "SELECT id,id_mesin,nama,nik
				from master_karyawan";

		$query = $this->db->query($sql);

		$totalData = $query->num_rows();

		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

		$sesi = $this->session->userdata('login');
		$tsesi = $sesi['BadanID'];
		$sql = "SELECT id,id_mesin,nama,nik
				from master_karyawan
				WHERE 1 = 1";

		// getting records as per search parameters
		if( !empty($requestData['search']['value']) ){   
			$sql.=" AND ( lower(id_mesin) LIKE lower('%".$requestData['search']['value']."%')  OR lower(nama) LIKE lower('%".$requestData['search']['value']."%')  )";
		}
		
		$query= $this->db->query($sql);
		$totalFiltered = $query->num_rows();	
		
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['length']." OFFSET ".$requestData['start']." ";  // adding length
		
		$query= $this->db->query($sql);
		
		$data = array();
		$no = $_POST['start']+1;	

		foreach($query->result() as $row){
			
			$nestedData=array(); 

			$nestedData[] = $no;			
			$nestedData[] = $row->id_mesin;
			$nestedData[] = $row->nama;
			$nestedData[] = $row->nik;		
			
			$data[] = $nestedData;
			$no++;
		}	

		$json_data = array(
					"draw"            => intval( $requestData['draw'] ),   
					"recordsTotal"    => intval( $totalData ),  
					"recordsFiltered" => intval( $totalFiltered ), 
					"data"            => $data   
					);

		echo json_encode($json_data); 
	}

	public function data_log_absen()
	{
		$requestData = $this->input->post();	

		$columns = array( 
			0 => 'id',
			1 => 'nama',
			2 => 'tgl_jam'
		);

			

		$sesi = $this->session->userdata('login');
		$tsesi = $sesi['BadanID'];
		$sql = "SELECT la.id,mk.nama,la.tgl_jam
				FROM log_absensi la
				LEFT JOIN master_karyawan mk on la.id_mesin=mk.id_mesin";

		$query = $this->db->query($sql);

		$totalData = $query->num_rows();

		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

		$sesi = $this->session->userdata('login');
		$tsesi = $sesi['BadanID'];
		$sql = "SELECT la.id,mk.nama,la.tgl_jam
				FROM log_absensi la
				LEFT JOIN master_karyawan mk on la.id_mesin=mk.id_mesin
				WHERE 1 = 1";

		// getting records as per search parameters
		if( !empty($requestData['search']['value']) ){   
			$sql.=" AND ( lower(nama) LIKE lower('%".$requestData['search']['value']."%')  OR lower(tgl_jam) LIKE lower('%".$requestData['search']['value']."%')  )";
		}
		
		$query= $this->db->query($sql);
		$totalFiltered = $query->num_rows();	
		
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['length']." OFFSET ".$requestData['start']." ";  // adding length
		
		$query= $this->db->query($sql);
		
		$data = array();
		$no = $_POST['start']+1;		

		foreach($query->result() as $row){
			
			$nestedData=array(); 

			$nestedData[] = $no;			
			$nestedData[] = $row->nama;
			$nestedData[] = $row->tgl_jam;	
			
			$data[] = $nestedData;
			$no++;
		}	

		$json_data = array(
					"draw"            => intval( $requestData['draw'] ),   
					"recordsTotal"    => intval( $totalData ),  
					"recordsFiltered" => intval( $totalFiltered ), 
					"data"            => $data   
					);

		echo json_encode($json_data); 
	}

	public function insert_log_absen($pin,$datetime){
		$sql_cek= "SELECT count(*) as jml from log_absensi WHERE id_mesin = ".$pin." and tgl_jam = '".$datetime."'"; 
		$cek = $this->db->query($sql_cek)->row();

		if($cek->jml <= 0){
			// insert log
			$sql = "INSERT INTO log_absensi(id_mesin,tgl_jam)
					VALUE(".$pin.",'".$datetime."')";
			$this->db->query($sql);
		
		}

		return True;
	}

	public function get_log_masuk($date_1){
		$sql="SELECT dt.id_mesin as USERID,
					dt.jam_masuk as CHECKTIME,
					'I' as CHECKTYPE,
					'9' as IDCOMPANY
				from
				(
					SELECT mk.id,mk.id_mesin,mk.nama,mk.nik,
					(
						SELECT tgl_jam
						FROM log_absensi 
						WHERE id_mesin = mk.id_mesin and tgl_jam LIKE '".$date_1."%'
						ORDER BY tgl_jam ASC LIMIT 1
					)as jam_masuk
					from master_karyawan mk
					WHERE mk.nik is not NULL
				)dt
				WHERE dt.jam_masuk is not NULL and dt.id_mesin in (591,598)  ";
		// echo $sql;exit();
		return $this->db->query($sql)->result();
	}

	public function get_masuk($id_mesin,$date_1){
		$sql="SELECT id,id_mesin,tgl_jam
				from log_absensi WHERE id_mesin = ".$id_mesin." and tgl_jam like '".$date_1."%' 
				ORDER BY id asc LIMIT 1";
		return $this->db->query($sql)->row();
	}


}
?>