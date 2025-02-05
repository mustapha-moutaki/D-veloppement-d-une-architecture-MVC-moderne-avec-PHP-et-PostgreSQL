<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Article</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

form {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    width: 400px;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

h1 {
    text-align: center;
    color: #333;
}

label {
    font-weight: bold;
    margin-bottom: 5px;
    display: block;
}

input, textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    transition: border-color 0.3s ease-in-out;
}

input:focus, textarea:focus {
    border-color: #007bff;
    outline: none;
}

button {
    background: #007bff;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background 0.3s ease-in-out;
}

button:hover {
    background: #0056b3;
}

a {
    display: inline-block;
    text-align: center;
    margin-top: 10px;
    color: #007bff;
    text-decoration: none;
    font-size: 14px;
}

a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>
   
    

    <form action="/articles/addArticle" method="POST">
    <h1>Create New Article</h1>
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
        </div>
        
        <div>
            <label for="content">Content:</label>
            <textarea id="content" name="content" required></textarea>
        </div>
        
        <div>
            <label for="user_id">User ID:</label>
            <input type="number" id="user_id" name="user_id" required>
        </div>
        
        <button type="submit">Create Article</button>
        <a href="/articles">Back to Articles</a>
    </div>
    </form>
</body>
</html>