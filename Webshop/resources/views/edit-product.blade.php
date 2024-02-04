<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Post</h1>
    <form action="/edit-product/{{$product->id}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{$product->title}}">
        <input type="number" name="price" min="0" step="0.01" value="{{$product->price}}"><br><br>
        <textarea name="description">{{$product->description}}</textarea>
        <button type="submit">Save Changes</button>
    </form>
</body>
</html>