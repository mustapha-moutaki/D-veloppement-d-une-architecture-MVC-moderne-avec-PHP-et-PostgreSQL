<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Articles</title>
    
    <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
    text-align: center;
}

h1 {
    color: #333;
    margin-bottom: 20px;
}

.button{
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    transition: background 0.3s ease-in-out;
}

.button:hover {
    background-color: #0056b3;
}

ul {
    list-style-type: none;
    padding: 0;
    max-width: 600px;
    margin: 20px auto;
}

li {
    background: white;
    padding: 15px;
    margin: 10px 0;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease-in-out;
}

li:hover {
    transform: scale(1.03);
}

li a {
    text-decoration: none;
    color: #333;
    font-size: 18px;
    font-weight: bold;
}

li a:hover {
    color: #007bff;
}

p {
    color: #666;
    font-style: italic;
}

</style>
</head>

<body>
    <h1>Articles</h1>

    <a href="{{ url('/articles/addArticle') }}" class="button">Create New Article</a>
    
    <ul>
    @if (!empty($articles) && count($articles) > 0)
        @foreach ($articles as $article)
            <li>
                <a href="{{ url('/articles/show/' . $article['id']) }}">
                    {{ $article['title'] }}
                </a>
            </li>
        @endforeach
    @else
        <p>No articles available.</p>
    @endif
</ul>



    <!-- <ul>
        @foreach ($articles as $article)
            <li>
                <h2>{{ $article['title'] }}</h2>
                <p>{{ $article['content'] }}</p>
            </li>
        @endforeach
    </ul> -->
</body>

</body>
</html>