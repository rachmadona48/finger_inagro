

        
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Log Absensi</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li class="active">
                        <strong>Log Absensi</strong>
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
	                        <h5>Log Absensi</h5>
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
                            <div class="">
                                <button onclick="tarik_data();" class="btn btn-outline btn-primary btn-xs pull-right" title="Tarik data absen dari mesin">Tarik Absen</button>
                                <button onclick="push_api();" class="btn btn-outline btn-danger btn-xs " title="Kirim data ke corporate">Kirim Ke Corporate</button>
                            </div>
	                        <div>
			                    <table class="table table-striped table-bordered table-hover dataTables-example" id="table_log_absen" width="100%">
				                    <thead>
				                    <tr>
				                        <th width="5%">No</th>
				                        <th width="50%">Nama Karyawan</th>
				                        <th width="45%">Waktu</th>
				                    </tr>
				                    </thead>
			                    </table>
	                        </div>

	                    </div>
	                </div>
	            </div>
            </div>
            
        </div>

        <!-- modal proses -->
        <div class="modal inmodal" id="modalExcPenglain"  role="dialog"  aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content animated fadeIn">
                <div class="modal-header">
                    
                    <h4 class="modal-title">Proses Eksekusi sedang berlangsung</h4>
                    <!-- <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small> -->
                </div>
                <div class="modal-body">
                    <div class="spiner-example">
                        <div class="sk-spinner sk-spinner-three-bounce animated fadeInDown">
                            <div class="sk-bounce1"></div>
                            <div class="sk-bounce2"></div>
                            <div class="sk-bounce3"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-white" data-dismiss="modal">Close</button> -->
                    <!-- <button type="button" class="btn btn-primary" onclick="javascript:closeModal();">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- modal proses -->
        



    <!-- Mainly scripts -->
    <script src="<?php echo base_url()?>asset/js/jquery-2.1.1.js"></script>
    

    <style>

    </style>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
            
        	tbl_log_absen()

        });

        function tbl_log_absen() {
            var dataTable = $('#table_log_absen').DataTable( {
                    
                    "responsive": true,
                    "processing": true,
                    "serverSide": true,
                    "scrollX": false,
                    // "PaginationType": "full_numbers",
                    "language": {
                            "processing": "<div></div><div></div><div></div>"
                        },
                    "ajax":{
                        url :"<?php echo site_url('absensi/log_absensi')?>", // json datasource
                        type: "post",  // method  , by default get
                        beforeSend: function(){
                            // $("#editable_processing").css("display","none");
                        },
                        error: function(){  // error handling
                            $(".table_log_absen-error").html("");
                            $("#table_log_absen").append('<tbody class="table_log_absen-error"><tr><th colspan="3"><center>Tidak Ada Data</center></th></tr></tbody>');
                            $("#table_log_absen_processing").css("display","none");
                            
                        }

                    }
                } );

            $('#table_log_absen input').unbind();
            $('#table_log_absen input').bind('keyup', function(e) {
            if(e.keyCode == 13) {
                oTable.fnFilter(this.value);
            }
            });

        }

        function tarik_data(){
            $.ajax({
                url : '<?php echo site_url("absensi/get_log_absen"); ?>',
                type : 'post',
                dataType : "JSON",
                beforeSend : function(){
                    // swal("Gagal", "Data sudah ada", "error");
                    $('#modalExcPenglain').modal('show');
                },
                success : function(data){
                    
                    // alert('tes')
                    if(data.respon == 'sukses'){
                        // tbl_log_absen();
                        location.reload();
                        $('#modalExcPenglain').modal('hide');
                    }else if(data.respon == 'ada'){
                        alert('Proses gagal')
                        $('#modalExcPenglain').modal('hide');
                        // swal("Gagal", "Data sudah ada", "error");
                    }
                },
                error : function (jqXHR, textStatus, errorThrown){
                   $('#modalExcPenglain').modal('hide');
                },
                complete : function(){
                    
                }
            });
        }

        function push_api(){
            $.ajax({
                url : '<?php echo site_url("absensi/kirim_data"); ?>',
                type : 'post',
                dataType : "JSON",
                beforeSend : function(){
                    // swal("Gagal", "Data sudah ada", "error");
                    $('#modalExcPenglain').modal('show');
                },
                success : function(data){
                    
                    // alert('tes')
                    if(data.respon == 'sukses'){
                        // tbl_log_absen();
                        // location.reload();
                        alert('kirim data berhasil')
                        $('#modalExcPenglain').modal('hide');
                    }else if(data.respon == 'ada'){
                        alert('Proses gagal')
                        $('#modalExcPenglain').modal('hide');
                        // swal("Gagal", "Data sudah ada", "error");
                    }
                },
                error : function (jqXHR, textStatus, errorThrown){
                   $('#modalExcPenglain').modal('hide');
                },
                complete : function(){
                    
                }
            });
        }
        </script>
</body>

</html>
