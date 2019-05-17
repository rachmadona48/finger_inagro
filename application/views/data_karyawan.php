
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Master Karyawan</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li class="active">
                        <strong>Master Karyawan</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
	                <div class="ibox float-e-margins">
	                    <div class="ibox-title">
	                        <h5>Master Karyawan</h5>
	                        <div class="ibox-tools">
	                            <a class="collapse-link">
	                                <i class="fa fa-chevron-up"></i>
	                            </a>
	                            <a class="close-link">
	                                <i class="fa fa-times"></i>
	                            </a>
	                        </div>
	                    </div>
	                    <div class="ibox-content">
                            
	                        <div>
			                    <table class="table table-striped table-bordered table-hover dataTables-example" id="table_master_karyawan" width="100%">
				                    <thead>
				                    <tr>
				                        <th width="5%">No</th>
				                        <th width="30%">Id Mesin</th>
				                        <th width="35%">Nama</th>
                                        <th width="30%">Nik</th>
				                    </tr>
				                    </thead>
			                    </table>
	                        </div>

	                    </div>
	                </div>
	            </div>
            </div>
            
        </div>
        



    <!-- Mainly scripts -->
    <script src="<?php echo base_url()?>asset/js/jquery-2.1.1.js"></script>
    

    <style>

    </style>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
            
        	tbl_master_karyawan()

        });

        function tbl_master_karyawan() {
            var dataTable = $('#table_master_karyawan').DataTable( {
                    // dom: 'Bfrtip',
                    // buttons: [
                    //     'copyHtml5',
                    //     'excelHtml5',
                    //     'csvHtml5',
                    //     'pdfHtml5'
                    // ],
                    
                    "responsive": true,
                    "processing": true,
                    "serverSide": true,
                    "PaginationType": "full_numbers",
                    "language": {
                            "processing": "<div></div><div></div><div></div>"
                        },
                    "ajax":{
                        url :"<?php echo site_url('absensi/master_karyawan')?>", // json datasource
                        type: "post",  // method  , by default get
                        beforeSend: function(){
                            // $("#editable_processing").css("display","none");
                        },
                        error: function(){  // error handling
                            $(".table_master_karyawan-error").html("");
                            $("#table_master_karyawan").append('<tbody class="table_master_karyawan-error"><tr><th colspan="3"><center>Tidak Ada Data</center></th></tr></tbody>');
                            $("#table_master_karyawan_processing").css("display","none");
                            
                        }

                    }
                } );

        }
    </script>

</body>

</html>
