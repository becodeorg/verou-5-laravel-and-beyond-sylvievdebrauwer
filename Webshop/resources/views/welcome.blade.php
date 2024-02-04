<!DOCTYPE html>

<title>Silfs Second Hand</title>
<link rel="stylesheet" href="/app.css">
<script src="/app.js"></script>

<body>
    @auth
    <p>Congrats you are logged in.</p>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <div style="border: 3px solid black;">
        <h2>Create A New Add</h2>
        <form action="/create-product" method="POST">
            @csrf
            <!--TODO MAKE SURE IMAGES ARE RESTRICTED IN SIZE AND JPG FORMAT, NO SPAM!!!!-->
            <!--<input type="file" name="image" accept="image/*" required><br><br>-->
            <input type="text" name="title" placeholder="Product Title"><br><br>
            <input type="number" name="price" min="0" step="0.01" placeholder="Price" required><br><br>
            <textarea name="description" placeholder="Description" required></textarea><br><br>
            <button type="submit">Create Add</button>
        </form>
    </div>

    <div style="border: 3px solid black;">
        <h2>All Products</h2>
        @foreach($products as $product)
        <div style="background-color: gray; padding:10px; margin:10px;">
            <h3>{{$product['title']}} Sold by {{$product->user->name}}</h3>
            <p>€ {{$product['price']}}<br><br></p>
            {{$product['description']}}
            <p><a href="/edit-product/{{$product->id}}">Edit</a></p>
            <form action="/delete-product/{{$product->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button>Delete</button>
            </form>
        </div>
        @endforeach
    </div>

    @else
    <h1>Silfs Second Hand</h1>

    <div style="border: 3px solid black;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input type="text" placeholder="name" name="name">
            <input type="text" placeholder="email" name="email">
            <input type="text" placeholder="password" name="password">
            <button type= "submit" >Register</button>
        </form>
    </div>

    <div style="border: 3px solid black;">
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input type="text" placeholder="name" name="loginname">
            <input type="password" placeholder="password" name="loginpassword">
            <button type= "submit" >Log in</button>
        </form>
    </div>



    <article>
        <h1><a href="/item">First Item</a></h1>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit nulla error hic consequuntur saepe natus assumenda, nam fugiat possimus nemo repellat pariatur dolore rerum voluptates odit? Quisquam, voluptatum in. Quia?
        </p>
    </article>

    <article>
    <h1><a href="/item">Second Item</a></h1>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit nulla error hic consequuntur saepe natus assumenda, nam fugiat possimus nemo repellat pariatur dolore rerum voluptates odit? Quisquam, voluptatum in. Quia?
        </p>
    </article>

    <article>
    <h1><a href="/item">Third Item</a></h1>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit nulla error hic consequuntur saepe natus assumenda, nam fugiat possimus nemo repellat pariatur dolore rerum voluptates odit? Quisquam, voluptatum in. Quia?
        </p>
    </article>



</body>
</html>

@endauth
