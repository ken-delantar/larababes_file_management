<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Upload a PDF</h1>

    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" accept="application/pdf, image/jpeg, image/jpg, image/png" required>
        <button type="submit">Submit</button>
    </form>  
    
    <hr>

    <h2>Uploaded PDFs</h2>

    @foreach ($documents as $doc)
        <p>Document ID: {{ $doc->id }} | Type: {{ $doc->type }}</p>
        <iframe src="{{ route('document.view', $doc->id) }}" width="100%" height="500px"></iframe>
        <hr>
    @endforeach
</body>
</html>
