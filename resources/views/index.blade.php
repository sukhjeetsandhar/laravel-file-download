<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <p><a href="{{ url('/upload') }}">Upload File</a></p>


    @foreach($files as $file)
    <p>
        #{{$loop->iteration}} <a href="{{ url('file/'. $file->id . '/download') }}" target="_blank">{{ $file->name }}</a>
    </p>
    @endforeach
</body>
</html>