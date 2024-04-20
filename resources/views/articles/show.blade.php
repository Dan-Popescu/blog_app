<div>
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->content }}</p>
    @foreach ($categories as $category)
        <p>{{ $category->name }}</p>
    @endforeach
</div>