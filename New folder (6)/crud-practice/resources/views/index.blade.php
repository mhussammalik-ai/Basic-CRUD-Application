<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <h2>All Products</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>options</th>

        
    </tr>

    @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->productName }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->price }}</td>
            <td>     
        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit">Delete</button>
    </form>
</td>
 <td>     
     <a href="{{ route('products.edit'  ,  $product->id)}} "> <button type="button"> Edit </button></a>     
</td>
        </tr>
    @endforeach
</table>


</body>
</html>