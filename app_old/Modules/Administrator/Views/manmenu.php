<div>
    <div class="page-hero page-container " id="page-hero">
        <div class="padding d-flex">
            <div class="page-title">
                <h2 class="text-md text-highlight"><?=$page_title?></h2>
            </div>
            <div class="flex"></div>
        </div>
    </div>
    <div class="page-content page-container" id="page-content">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-pills card-header-pills no-border" id="tab">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab-form" role="tab" aria-controls="tab-form" aria-selected="false">Form</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab-data" role="tab" aria-controls="tab-data" aria-selected="false">Data</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="padding">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="tab-form" role="tabpanel" aria-labelledby="tab-form">
                            <form data-plugin="parsley" data-option="{}" id="form">
                                <input type="hidden" class="form-control" id="id" name="id" value="" required>
                                <?=csrf_field();?>
                                <div class="form-group">
                                    <label>Modul</label>
                                    <select class="form-control" id="module_id" name="module_id" required>
                                        <option></option>
                                        <?php
                                            foreach ($modules as $module) {
                                                echo '<option value="'.$module->id.'">'.$module->module_name.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Parent Menu</label>
                                    <select class="form-control" id="menu_id" name="menu_id"></select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Menu</label>
                                    <input type="text" class="form-control" id="menu_name" name="menu_name" required autocomplete="off" placeholder="Tentukan nama menu">
                                </div>
                                <div class="form-group">
                                    <label>Url Menu</label>
                                    <input type="text" class="form-control" id="menu_url" name="menu_url" required autocomplete="off" placeholder="Tentukan nama modul">
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                        <div class="tab-pane fade" id="tab-data" role="tabpanel" aria-labelledby="tab-data">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <th><span>#</span></th>
                                            <th><span>Nama Modul</span></th>
                                            <th><span>Nama Menu</span></th>
                                            <th><span>Url Menu</span></th>
                                            <th><span>Parent Menu</span></th>
                                            <th class="column-2action"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    const auth_insert = '<?=$rules->i?>';
    const auth_edit = '<?=$rules->e?>';
    const auth_delete = '<?=$rules->d?>';
    const auth_otorisasi = '<?=$rules->o?>';

    const url_insert = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)."_save"?>';
    const url_edit = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)."_edit"?>';
    const url_delete = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)."_delete"?>';
    const url_load = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)."_load"?>';
    const url_ajax = '<?=base_url()."/".uri_segment(0)."/ajax"?>';

    var dataStart = 0;
    var table;

    $(document).ready(function(){
        // $('#datatable')

        $(document).on('submit', '#form', function(e){
            e.preventDefault();
            let $this = $(this);

            Swal.fire({
                title: "Simpan data ?",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Simpan",
                cancelButtonText: "Batal",
                reverseButtons: true
            }).then(function(result) {
                if(result.value) {
                    Swal.fire({
                        title: "",
                        icon: "info",
                        text: "Proses menyimpan data, mohon ditunggu...",
                        didOpen: function() {
                            Swal.showLoading()
                        }
                    });

                    $.ajax({
                        url     : url_insert,
                        type    : 'post',
                        data    : $this.serialize(),
                        dataType: 'json',
                        success: function(result){
                            Swal.close();
                            if(result.success){
                                Swal.fire('Sukses','Berhasil menyimpan menu', 'success');
                                $('#form').trigger("reset");
                                table.ajax.reload();
                            }else{
                                Swal.fire('Error',result.message, 'error');
                            }
                        },
                        error: function(){
                            Swal.close();
                            Swal.fire('Error','Terjadi kesalahan pada server', 'error');
                        }
                    });
                }
            });
        }).on('reset', '#form', function(){
            $('#id').val('');
            $('#menu_id').data('select2').destroy();
            $('#menu_id').html('');
            $('#menu_id').select2({ placeholder : "Pilih modul terlebih dahulu" });
            $('#module_id').val(null).trigger('change');
        });

        table = $('#datatable').DataTable({
            "serverSide": true,
            "processing": true,
            "ordering" : true,
            "paging": true,
            "searching": { "regex": true },
            "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
            "pageLength": 10,
            "searchDelay" : 500,
            "ajax": {
                "type": "POST",
                "url": url_load,
                "dataType": "json",
                "data": function (data) {
                    console.log(data);
                    // Grab form values containing user options
                    dataStart = data.start;
                    let form = {};
                    Object.keys(data).forEach(function(key) {
                        form[key] = data[key] || "";
                    });

                    // Add options used by Datatables
                    let info = { 
                        "start": data.start || 0, 
                        "length": data.length, 
                        "draw": 1,  
                        "<?=csrf_token()?>": "<?=csrf_hash()?>"
                    };

                    $.extend(form, info);

                    return form;
                },
                "complete": function(response) {
                    console.log(response);
                    feather.replace();
                }
            },
            "columns" : datatableColumn()
        }).on('init.dt', function(){
            $(this).css('width','100%');
        });

        $(document).on('click', '.edit', function(){
            let $this = $(this);

            Swal.fire({
                title: "",
                icon: "info",
                text: "Proses mengambil data, mohon ditunggu...",
                didOpen: function() {
                    Swal.showLoading()
                }
            });

            $.ajax({
                url     : url_edit,
                type    : 'post',
                data    : {
                    id : $this.data('id'),
                    "<?=csrf_token()?>": "<?=csrf_hash()?>"
                },
                dataType: 'json',
                success: function(result){
                    Swal.close();
                    if(result.success){
                        $('ul#tab li a').first().trigger('click');

                        for(key in result.data){
                            $('#'+key).val(result.data[key]);
                        }

                        setTimeout(function() {
                            $('#module_id').val(result.data.module_id).trigger('change');

                            getListMenu(result.data.module_id,function(){
                                $('#menu_id').val(result.data.menu_id).trigger('change');
                            });
                        },500)
                    }else{
                        Swal.fire('Error',result.message, 'error');
                    }
                },
                error: function(){
                    Swal.close();
                    Swal.fire('Error','Terjadi kesalahan pada server', 'error');
                }
            });
        }).on('click', '.delete', function(){
            let $this = $(this);

            Swal.fire({
                title: "Hapus data ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Hapus",
                confirmButtonColor: '#d33',
                cancelButtonText: "Batal",
                reverseButtons: true
            }).then(function(result) {
                if(result.value) {
                    $.ajax({
                        url     : url_delete,
                        type    : 'post',
                        data    : {
                            id : $this.data('id'),
                            "<?=csrf_token()?>": "<?=csrf_hash()?>"
                        },
                        dataType: 'json',
                        success: function(result){
                            Swal.close();
                            if(result.success){
                                Swal.fire('Sukses','Berhasil menghapus menu', 'success');
                                table.ajax.reload();
                            }else{
                                Swal.fire('Error',result.message, 'error');
                            }
                        },
                        error: function(){
                            Swal.close();
                            Swal.fire('Error','Terjadi kesalahan pada server', 'error');
                        }
                    });
                }
            })
        });

        $('#module_id').select2({
            placeholder : "Pilih modul"
        }).on('select2:select', function (e) {
            getListMenu(e.params.data.id,function(){});
        });

        $('#menu_id').select2({
            placeholder : "Pilih modul terlebih dahulu"
        });
    });

   function getListMenu(id,completion) {
        $('#menu_id').data('select2').destroy();

        $.get({
            url : url_ajax + "/menu_select_get/" +id,
            dataType : 'html',
            success: function(result){
                $('#menu_id').html(result);
                $('#menu_id').select2();
                completion();
            }
        })
    }

    function datatableColumn(){
        let columns = [
                {
                    data: "id", orderable: false, width: 100,
                    render: function (a, type, data, index) {
                        return dataStart + index.row + 1
                    }
                },
                {data: "module_name", orderable: true},
                {data: "menu_name", orderable: true},
                {data: "menu_url", orderable: true},
                {data: "menu_parent", orderable: true, 
                    render: function (a, type, data, index) {
                        return data.menu_parent || '';
                    }
                },
                {
                    data: "id", orderable: false,
                    render: function (a, type, data, index) {
                        let button = ""

                        if(auth_edit == "1"){
                            button += '<button class="btn btn-wave btn-icon-datatable btn-rounded mb-2 light-blue text-white edit" data-id="'+data.id+'">\
                                    <i data-feather="edit-3"></i>\
                                </button>';
                        }

                        if(auth_delete == "1"){
                            button += '<button class="btn btn-wave btn-icon-datatable btn-rounded mb-2 red text-white delete" data-id="'+data.id+'">\
                                        <i data-feather="trash-2"></i>\
                                    </button>';
                        }

                        button += (button == "") ? "<b>Tidak ada aksi</b>" : ""

                        return button;
                    }
                }
            ];

        return columns;
    }
</script>