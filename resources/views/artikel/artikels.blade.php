{{-- resources/views/kesehatan.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel Kesehatan</title>
</head>
<body>
    <h1>Artikel Kesehatan</h1>

    @foreach ($categories as $category)
        <div>
            <h2>{{ $category -> name }}</h2>
            
        </div>
    @endforeach
</body>
</html>
