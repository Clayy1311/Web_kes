<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-3">{{ $title }}</h1>
        <hr>
        <article class="mt-4">
            <h2>{{ $post['title'] }}</h2>
            <div class="mb-2">
                <small>{{ $post['author'] }} | 1 January 2021</small>
            </div>
            <img src="{{ url('/storage/'.$post->image) }}" alt="Image" class="img-fluid mb-3">
            <p>{{ $post['body'] }}</p>
            <a href="/" class="btn btn-primary">Back &raquo;</a>
        </article>
    </div>

    <!-- Link ke Bootstrap JS (Opsional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
