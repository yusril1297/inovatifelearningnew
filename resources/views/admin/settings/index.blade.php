@extends('layouts.admin')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-6">
        <div class="d-flex justify-content-between align-items-center bg-white rounded-xl shadow-lg p-4 flex flex-col mb-1 ">
            <h1 class="mb-3" style="font-family: 'Oswald', sans-serif;">Edit Category</h1>
        </div>

        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body bg-white rounded-xl shadow-lg p-4">
                <div class="form-group">
                    <label for="title">Judul CORS</label>
                    <textarea name="name_cors" id="title" class="form-control">{{ $data->name_cors ?? 'Default Name' }}</textarea>
                    @error('name_cors')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="foto">Logo</label>
                    <img src="{{ asset($data->path_logo ?? 'uploads/default-logo.png') }}" class="preview"
                        style="width: 100px;">
                    <div class="custom-file">
                        <input type="file" accept=".png, .jpg, .jpeg" name="logo" onchange="previewImg()"
                            class="form-control">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    @error('logo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
        </form>
    </div>
    </div>

    <script>
        function previewImg() {
            const foto = document.querySelector('#inputFoto')
            const preview = document.querySelector('.preview')
            preview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(foto.files[0]);

            oFReader.onload = function(oFREvent) {
                preview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection