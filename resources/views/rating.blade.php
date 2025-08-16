<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Insert Ratings</h1>
    <div>
        <form action="{{ route('ratings.store') }}" method="POST">
            @csrf
            <label for="author">Author:</label>
            <select name="author_id" id="author" required>
                <option value="">Choose an Author</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
            <br><br>
            <label for="book">Book:</label>
            <select name="book_id" id="book" required>
                <option value="">Choose a Book</option>
                @foreach(\App\Models\Book::with('author')->get() as $book)
                    <option value="{{ $book->id }}" data-author="{{ $book->author_id }}">
                        {{ $book->title }}
                    </option>
                @endforeach
            </select>
            <br><br>
            <label for="rating">Rating:</label>
            <select name="rating" id="rating" required>
                <option value="">Rate Book</option>
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
            <br><br>
            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        const authorSelect = document.getElementById('author');
        const bookSelect   = document.getElementById('book');

        authorSelect.addEventListener('change', function () {
            const authorId = this.value;

            Array.from(bookSelect.options).forEach(option => {
                if (option.value === "") return;
                option.style.display = option.dataset.author === authorId ? 'block' : 'none';
            });

            bookSelect.value = "";
        });
    </script>
    
</body>
</html>
