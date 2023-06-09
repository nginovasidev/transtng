<style>
    .select2-container {
        width: 100% !important;
    }
</style>
<div>
    <div class="page-hero page-container " id="page-hero">
        <div class="padding d-flex">
            <div class="page-title">
                <h2 class="text-md text-highlight"><?= $page_title ?></h2>
            </div>
            <div class="flex"></div>
        </div>
    </div>
    <div class="page-content page-container" id="page-content">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-pills card-header-pills no-border" id="tab">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab-data" role="tab" aria-controls="tab-data" aria-selected="false">Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab-form" role="tab" aria-controls="tab-form" aria-selected="false">Form</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="padding">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="tab-data" role="tabpanel" aria-labelledby="tab-data">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <th><span>#</span></th>
                                            <th><span>IMEI</span></th>
                                            <th><span>Kode Alat</span></th>
                                            <th><span>No SIM Card</span></th>
                                            <th><span>Actions</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-form" role="tabpanel" aria-labelledby="tab-form">
                            <form data-plugin="parsley" data-option="{}" id="form">
                                <input type="hidden" class="form-control" id="id" name="id" value="" required>
                                <?= csrf_field(); ?>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="jenis" class="col-form-label">IMEI Number</label>
                                        <input class="form-control" type="text" placeholder="Device IMEI Number " id="jenis" name="jenis" required />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="imei" class="col-form-label">Imei</label>
                                        <input class="form-control ro" type="text" placeholder="Imei alat" id="imei" name="imei" required="" />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="nomorBus" class="col-form-label">Nomor Bus</label>
                                        <input class="form-control" type="text" placeholder="Nomor bus alat" id="nomorBus" name="nomorBus" required="" />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="noTelp" class="col-form-label">Nomor Telp</label>
                                        <input class="form-control" type="text" placeholder="Nomor telepon alat" id="noTelp" name="noTelp" required="" />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bnimid" class="col-form-label">BNI MID</label>
                                        <input class="form-control" type="text" id="bnimid" name="bnimid" />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bnitid" class="col-form-label">BNI TID</label>
                                        <input class="form-control" type="text" id="bnitid" name="bnitid" />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bnitid" class="col-form-label">BNI Marry Code</label>
                                        <input class="form-control" type="text" id="marrycode" name="marrycode" />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="brimid" class="col-form-label">BRI MID</label>
                                        <input class="form-control" type="text" id="brimid" name="brimid" />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="britid" class="col-form-label">BRI TID</label>
                                        <input class="form-control" type="text" id="britid" name="britid" />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="briprocode" class="col-form-label">BRI Procode</label>
                                        <input class="form-control ro" type="text" id="briprocode" name="briprocode" />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="mandirimid" class="col-form-label">Mandiri MID</label>
                                        <input class="form-control ro" type="text" id="mandirimid" name="mandirimid" />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="mandiritid" class="col-form-label">Mandiri TID</label>
                                        <input class="form-control ro" type="text" id="mandiritid" name="mandiritid" />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="mandiriPinCode" class="col-form-label">Mandiri PIN Code</label>
                                        <input class="form-control ro" type="text" id="mandiriPinCode" name="mandiriPinCode" />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="mandiriSamOperator" class="col-form-label">Mandiri SAM Operator</label>
                                        <input class="form-control ro" type="text" id="mandiriSamOperator" name="mandiriSamOperator" />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="mandiriSamUid" class="col-form-label">Mandiri SAM UID</label>
                                        <input class="form-control ro" type="text" id="mandiriSamUid" name="mandiriSamUid" />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="mandiriSamUid" class="col-form-label">BCA MID</label>
                                        <input class="form-control ro" type="text" id="bcamid" name="bcamid" />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="mandiriSamUid" class="col-form-label">BCA TID</label>
                                        <input class="form-control ro" type="text" id="bcatid" name="bcatid" />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="kmtSamId" class="col-form-label">KMT SAM ID</label>
                                        <input class="form-control ro" type="text" id="kmtSamId" name="kmtSamId" />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="kmtSamConfig" class="col-form-label">KMT SAM CONFIG</label>
                                        <input class="form-control ro" type="text" id="kmtSamConfig" name="kmtSamConfig" />
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    const auth_insert = '<?= $rules->i ?>';
    const auth_edit = '<?= $rules->e ?>';
    const auth_delete = '<?= $rules->d ?>';
    const auth_otorisasi = '<?= $rules->o ?>';

    const url = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) ?>';
    const url_ajax = '<?= base_url() . "/" . uri_segment(0) . "/ajax" ?>';

    var dataStart = 0;
    var coreEvents;

    const select2Array = [{
        id: 'nama_tenant',
        url: '/getTenant',
        placeholder: 'Pilih Tenant',
        params: null
    }];

    $(document).ready(function() {
        coreEvents = new CoreEvents();
        coreEvents.url = url;
        coreEvents.ajax = url_ajax;
        coreEvents.csrf = {
            "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
        };
        coreEvents.tableColumn = datatableColumn();

        coreEvents.insertHandler = {
            placeholder: 'Berhasil menyimpan jenis user',
            afterAction: function(result) {
                $('#tab-data').addClass('active show');
                $('#tab-form').removeClass('active show');
                coreEvents.table.ajax.reload();
            }
        }

        coreEvents.editHandler = {
            placeholder: '',
            afterAction: function(result) {}
        }

        coreEvents.deleteHandler = {
            placeholder: 'Berhasil menghapus jenis user',
            afterAction: function() {}
        }

        coreEvents.resetHandler = {
            action: function() {
                // reset form
                $('#form')[0].reset();
                $('#form').parsley().reset();
            }
        }

        select2Array.forEach(function(x) {
            select2Init('#' + x.id, x.url, x.placeholder, x.params);
        });

        $('#nama_tenant').on('change', function() {
            var id = $(this).val();
            console.log(id);
        });

        coreEvents.load();
    });

    function select2Init(id, url, placeholder, parameter) {
        $(id).select2({
            id: function(e) {
                return e.id
            },
            placeholder: placeholder,
            multiple: false,
            ajax: {
                url: url_ajax + url,
                dataType: 'json',
                quietMillis: 500,
                delay: 500,
                data: function(param) {
                    var def_param = {
                        keyword: param.term, //search term
                        perpage: 5, // page size
                        page: param.page || 0, // page number
                    };

                    return Object.assign({}, def_param, parameter);
                },
                processResults: function(data, params) {
                    params.page = params.page || 0

                    return {
                        results: data.rows,
                        pagination: {
                            more: false
                        }
                    }
                }
            },
            templateResult: function(data) {
                return data.text;
            },
            templateSelection: function(data) {
                if (data.id === '') {
                    return placeholder;
                }

                return data.text;
            },
            escapeMarkup: function(m) {
                return m;
            }
        });
    }

    // function datatableColumn() {
    //     let columns = [{
    //             data: "id",
    //             orderable: false,
    //             width: 100,
    //             render: function(a, type, data, index) {
    //                 return dataStart + index.row + 1
    //             }
    //         },
    //         {
    //             data: "jenis",
    //             orderable: true
    //         },
    //         {
    //             data: "tarif",
    //             orderable: true
    //         },
    //         {
    //             data: "id",
    //             orderable: false,
    //             width: 100,
    //             render: function(a, type, data, index) {
    //                 let button = ''

    //                 if (auth_edit == "1") {
    //                     button += '<button class="btn btn-sm btn-outline-primary edit" data-id="' + data.id + '" title="Edit">\
    //                                 <i class="fa fa-edit"></i></button>';
    //                 }

    //                 if (auth_delete == "1") {
    //                     button += '<button class="btn btn-sm btn-outline-danger delete" data-id="' + data.id + '" title="Delete">\
    //                                     <i class="fa fa-trash-o"></i></button></div>';
    //                 }

    //                 button += (button == '') ? "<b>Tidak ada aksi</b>" : ""

    //                 return button;
    //             }
    //         }
    //     ];

    //     return columns;
    // }
</script>