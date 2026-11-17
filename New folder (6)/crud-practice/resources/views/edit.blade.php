<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>

    <h2>Edit Product</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
       
        @csrf
        @method('PUT')

        <label>Product Name:</label>
        <input type="text" name="productName"
            value="{{ $product->productName }}" required>
        <br><br>

        <label>Quantity:</label>
        <input type="number" name="quantity"
            value="{{ $product->quantity }}" required>
        <br><br>

        <label>Price:</label>
        <input type="number" name="price"
            value="{{ $product->price }}" required>
        <br><br>

        <button type="submit">Update Product</button>

    </form>

</body>
</html>