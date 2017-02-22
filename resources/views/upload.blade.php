<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h2>Upload File</h2>
    <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}

       <label for=""> select File   
            <input type="file" name="file">
       </label>
       
       <button type="submit" class="btn btn-default">button</button>
       
    </form>
</body>
</html>