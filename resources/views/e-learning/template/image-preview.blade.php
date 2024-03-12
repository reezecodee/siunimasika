<div class="col-md-4">
    <div class="text-center mb-4">
        <img src="{{ $image ? '/img/logo-'. strtolower(explode(' ', $title)[1]) .'/' . $image : '/img/example.png' }}" class="w-50 mb-2" id="preview"
            alt="" srcset="">
        <div id="file-name" class="mb-2"></div>
        <div class="d-flex justify-content-center">
            <div style="display: none" class="btn btn-danger" id="cancel-btn"><i class="fas fa-times"></i>
                Batalkan</div>
        </div>
    </div>
    <label for="picture" class="mb-1">Logo {{ strtolower(explode(' ', $title)[1]) }}</label>
    <input type="file" accept="image/jpg, image/jpeg, image/png" name="picture" value="" id="picture"
        class="form form-control @error('picture') is-invalid @enderror">
    @error('picture')
        <div id="validationServer03Feedback" class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
