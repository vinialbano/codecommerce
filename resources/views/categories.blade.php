<h1>Categorias</h1>

<ul>
    @foreach($categories as $category)
        <li><strong>{{ $category->name }}</strong>
            <p>{{ $category->description }}</p>
        </li>
    @endforeach
</ul>