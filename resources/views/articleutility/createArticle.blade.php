@extends('layout.default')
@section('content')
<h5>Create Article</h5>
<form action="" class="card p-2">
    <div class="row">
        <div class="col-6">
            <div class="mb-2">
                <label for="" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" placeholder="title of article">
            </div>
            <div class="mb-2">
                <label for="decriptions" class="form-label">Descriptions</label>
                <textarea name="descriptions" id="descriptions" cols="30" rows="15" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-6">
            <style>
                #imagePreview{
                    display: none;
                    width: 100%;
                    height: 100%;
                }
                #imGdiv{
                    width: 100%;
                    height: 500px;
                }
            </style>
            <label for="formFile" class="form-label">Upload photo</label>
            <input class="form-control" type="file" id="formFile" onchange="previewImage()">
            <div id="imGdiv" class="mb-2 p-2">
                <img src="" alt="" id="imagePreview">
            </div>
            <script>
                function previewImage(){
                    const fileInput = document.getElementById("formFile");
                    const filepreview = document.getElementById("imagePreview");
                    const file = fileInput.files[0];
                    if(file){
                        const reader = new FileReader();
                        reader.onload = function(e){
                            filepreview.src = e.target.result;
                            filepreview.style.display = "block";
                        };
                        reader.readAsDataURL(file);
                    }
                }
            </script>
        </div>
    </div>

</form>
@stop