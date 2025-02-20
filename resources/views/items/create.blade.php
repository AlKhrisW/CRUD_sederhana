<!DOCTYPE html>
<html>
    <head>
        <title>Add Items</title>
    </head>
    <body>
        <h1>Add Item</h1>
        {{-- form menambahkan data --}}
        <form action="{{route('items.store')}}" method="POST">
            @csrf
            <label for="name">Name:</label>
            <input type="text" name="name" required>
            <br>
            <label for="description">Description:</label>
            <input type="text" name="description" required>
            <br>
            <button type="submit">Add Item</button>
        </form>
        {{-- tombol kembali ke list data --}}
        <a href="{{route('items.index')}}">Back to List</a>
    </body>
</html>