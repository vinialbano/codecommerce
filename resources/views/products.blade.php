<h1>Produtos</h1>

<ul>
    @foreach($products as $product)
        <li>
            <strong>{{ $product->name }}</strong>
            <p>{{ $product->description }}</p>
            <p>${{ $product->price }}</p>
        </li>
    @endforeach
</ul>