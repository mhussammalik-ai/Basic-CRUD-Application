<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>

    <h2>Add New Product</h2>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <label>Product Name:</label>
        <input type="text" name="productName" required>
        <br><br>

        <label>Quantity:</label>
        <input type="number" name="quantity" required>
        <br><br>

        <label>Price:</label>
        <input type="number" name="price" required>
        <br><br>

        <button type="submit">Save Product</button>

    </form>

</body>
</html>
```

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Product</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #eef1f5;
            --surface: #ffffff;
            --text: #1b2430;
            --muted: #6a7686;
            --border: #d5dbe3;
            --accent: #0f766e;
            --accent-dark: #0b5c56;
            --accent-soft: #e3f3f1;
            --danger: #b42318;
            --danger-soft: #fdecea;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 32px 16px;
            background: var(--bg);
            color: var(--text);
            font-family: "Plus Jakarta Sans", system-ui, -apple-system, "Segoe UI", sans-serif;
            line-height: 1.5;
        }

        .card {
            width: 100%;
            max-width: 520px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: 0 10px 30px rgba(27, 36, 48, 0.08);
            overflow: hidden;
        }

        .card-header {
            padding: 28px 32px 20px;
            border-bottom: 1px solid var(--border);
        }

        .card-header h1 {
            margin: 0 0 4px;
            font-size: 22px;
            font-weight: 700;
            letter-spacing: -0.01em;
        }

        .card-header p {
            margin: 0;
            font-size: 14px;
            color: var(--muted);
        }

        form { padding: 28px 32px 32px; }

        .alert {
            margin-bottom: 20px;
            padding: 12px 14px;
            border-radius: 8px;
            background: var(--danger-soft);
            color: var(--danger);
            font-size: 14px;
        }

        .alert ul { margin: 0; padding-left: 18px; }

        .field { margin-bottom: 20px; }

        .field label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            font-weight: 600;
        }

        .input-wrap { position: relative; }

        .input-wrap .prefix {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 14px;
            font-weight: 600;
            color: var(--muted);
            pointer-events: none;
        }

        input {
            width: 100%;
            padding: 11px 14px;
            font: inherit;
            font-size: 15px;
            color: var(--text);
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 8px;
            transition: border-color .15s, box-shadow .15s;
        }

        input.has-prefix { padding-left: 46px; }

        input::placeholder { color: #a3adba; }

        input:hover { border-color: #b6c0cc; }

        input:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.18);
        }

        input.is-invalid { border-color: var(--danger); }

        .error {
            margin-top: 6px;
            font-size: 13px;
            color: var(--danger);
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .total {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            margin: 4px 0 24px;
            padding: 14px 16px;
            background: var(--accent-soft);
            border-radius: 10px;
        }

        .total span { font-size: 14px; color: var(--accent-dark); font-weight: 500; }

        .total strong {
            font-size: 22px;
            font-weight: 700;
            color: var(--accent-dark);
            font-variant-numeric: tabular-nums;
        }

        .actions {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
        }

        .btn {
            padding: 11px 22px;
            font: inherit;
            font-size: 15px;
            font-weight: 600;
            border-radius: 8px;
            border: 1px solid transparent;
            cursor: pointer;
            text-decoration: none;
            transition: background .15s, border-color .15s;
        }

        .btn-primary { background: var(--accent); color: #fff; }
        .btn-primary:hover { background: var(--accent-dark); }

        .btn-secondary { background: #fff; color: var(--text); border-color: var(--border); }
        .btn-secondary:hover { background: #f5f7fa; }

        .btn:focus-visible {
            outline: 3px solid rgba(15, 118, 110, 0.35);
            outline-offset: 2px;
        }

        @media (max-width: 480px) {
            .card-header, form { padding-left: 20px; padding-right: 20px; }
            .row { grid-template-columns: 1fr; gap: 0; }
            .actions { flex-direction: column-reverse; }
            .btn { width: 100%; text-align: center; }
        }
    </style>
</head>
<body>

    <main class="card">
        <header class="card-header">
            <h1>Add new product</h1>
            <p>Enter the product details to add it to your inventory.</p>
        </header>

        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            @if ($errors->any())
                <div class="alert" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="field">
                <label for="productName">Product name</label>
                <input
                    type="text"
                    id="productName"
                    name="productName"
                    value="{{ old('productName') }}"
                    placeholder="e.g. Wireless mouse"
                    class="@error('productName') is-invalid @enderror"
                    required
                    autofocus>
                @error('productName')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="field">
                    <label for="quantity">Quantity</label>
                    <input
                        type="number"
                        id="quantity"
                        name="quantity"
                        value="{{ old('quantity') }}"
                        placeholder="0"
                        min="0"
                        step="1"
                        class="@error('quantity') is-invalid @enderror"
                        required>
                    @error('quantity')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="price">Price</label>
                    <div class="input-wrap">
                        <span class="prefix">Rs.</span>
                        <input
                            type="number"
                            id="price"
                            name="price"
                            value="{{ old('price') }}"
                            placeholder="0.00"
                            min="0"
                            step="0.01"
                            class="has-prefix @error('price') is-invalid @enderror"
                            required>
                    </div>
                    @error('price')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="total" aria-live="polite">
                <span>Total stock value</span>
                <strong id="total">Rs. 0.00</strong>
            </div>

            <div class="actions">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Save product</button>
            </div>
        </form>
    </main>

    <script>
        const qty = document.getElementById('quantity');
        const price = document.getElementById('price');
        const total = document.getElementById('total');

        function updateTotal() {
            const value = (parseFloat(qty.value) || 0) * (parseFloat(price.value) || 0);
            total.textContent = 'Rs. ' + value.toLocaleString('en-PK', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }

        qty.addEventListener('input', updateTotal);
        price.addEventListener('input', updateTotal);
        updateTotal();
    </script>

</body>
</html> -->