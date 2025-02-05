<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>articles menu</title>
    <link rel="stylesheet" href="../public/assets/css/style.css">
</head>
<body>
    <h1>articles</h1>

    <ul>
        @foreach ($articles as $article)
            <li>
                <h2>{{ $article['title'] }}</h2>
                <p>{{ $article['content'] }}</p>
            </li>
        @endforeach
    </ul>
    <!-- <h1>welcome {{$name}}</h1> -->
</body>
</html>

