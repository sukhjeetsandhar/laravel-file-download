<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        .btn {
            font-family: Arial;
            color: #ffffff;
            font-size: 20px;
            background: #3f88b8;
            padding: 10px 20px 10px 20px;
            text-decoration: none;
        }
        input[type="file"] {
            display: none !important;
        }
    </style>
</head>
<body>
    <h2>Upload File</h2>
    <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data" name="file-loader">
    {{ csrf_field() }}
       <div class="file-upload">
            <label for="upload-1" class="btn">Upload</label>
            <input type="file" name="file" id="upload-1">
            <a href="" id="download" class="file-name" target="_blank"></a>
        </div>
       <br>
       <button type="submit">submit</button>
       <button type="reset" id="reset">Cancel</button>
       
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>

    var form = document.forms.namedItem("file-loader");
    var data = new FormData(form);
        jQuery(function($) {
            $('input[type="file"]').change(function() {
                if ($(this).val()) {
                    var filename = $(this).val();
                    
                    $.ajax({
                        method: 'POST',
                        url: "temp/upload",
                        enctype: 'multipart/form-data',
                        data: new FormData(form),
                        success: function (res) {
                            console.log("Data Uploaded: " + res);
                            window.href = res;
                            download.attr('href', href);
                        },

                        cache: false,
                        contentType: false,
                        processData: false,
                    })

                    var name = filename.split('\\').pop();
                    download = $(this).closest('.file-upload').find('.file-name');
                    download.html(name);
                }
            });

            });

            $('#reset').click(function(){
                $.ajax({
                    method: "GET",
                    url: "temp/delete" 
                })
            })


    </script>
</body>
</html>