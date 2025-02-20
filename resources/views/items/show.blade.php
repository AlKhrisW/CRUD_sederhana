<!DOCTYPE html>
<html>
    <head>
        <title>Item List</title>
    </head>
    <body>
        <h1>Item</h1>
        {{-- mengecek apakah penambahan atau perubahan sudah berhasil --}}
        @if(session('success'))
            <p>{{session('success')}}</p> {{-- menampilkan pesan --}}
        @endif
            {{-- link untuk menambahkan data baru --}}
            <a href="{{route('items.create')}}">Add Item</a>
            <ul>
                {{-- looping untuk menampilkan data --}}
                @foreach($items as $item)
                <li>
                    {{-- menampilkan nama data --}}
                    {{$item->name}} -
                    {{-- link untuk edit data --}}
                    <a href="{{route('items.index', $item)}}">Edit</a>
                    {{-- form untuk menghapus data --}}
                    <form action="{{route('items.destroy', $item)}}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </li>
                @endforeach
            </ul>
    </body>
</html>