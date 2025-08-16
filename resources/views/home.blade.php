<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Book Store</h1>
    <div>
        <form method="GET" action="{{ route('show.books') }}" id="searchForm">
            <label for="bookShown">Books Shown:</label>
            <select id="bookShown" name="qty">
                @for ($i = 10; $i <= 100; $i+=10)
                    <option value="{{ $i }}" {{ request('qty') == $i ? 'selected' : '' }}>
                        {{ $i }}
                    </option>
                @endfor
            </select>
            <br>
            <label for="search">Search:</label>
            <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="Search book...">
            <button type="submit">Search</button>
            <a href="{{ route('home') }}">Reset</a>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Category</th>
                <th>Author</th>
                <th>Average Rating</th>
                <th>Total Voter</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->category_name }}</td>
                    <td>{{ $book->author_name }}</td>
                    <td>{{ $book->avg_review }}</td>
                    <td>{{ $book->rating_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="margin-top: 20px;">
        <a href="{{ route('authors.index') }}" style="margin-inline: 10px">Top 10 Famous Author</a>
        <a href="#" style="margin-inline: 10px">Input Rating</a>
    </div>
    
</body>
</html>