<div class="d-flex align-items-center mt-2">
    <input type="checkbox" class="form-check-input cursor-pointer me-2" name="" id="" required>
    <span>Saya yakin data diatas sudah benar</span>
</div>
<div class="d-flex justify-content-end mt-4 gap-2">
    @if (strpos(url()->current(), 'create'))
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop" type="button"><i
                class="fas fa-file-import"></i> Import</button>
    @endif
    <button type="reset" class="btn btn-danger"><i class="fas fa-power-off"></i> Reset
        form</button>
    <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Simpan
        data</button>
</div>

@if (strpos(url()->current(), 'create'))
    <!-- modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Import fakultas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning" role="alert">
                        <i class="fas fa-exclamation-triangle"></i> File yang di import harus berformat csv, xls, atau
                        xlsx.
                        <a href=""><u>Lihat contoh format</u></a>
                    </div>
                    <input type="file" name="fileInput"
                        accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </div>
    </div>
@endif
