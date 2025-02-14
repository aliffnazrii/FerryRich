<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>FerryRich Sdn Bhd</h1>

        <p><a href="https://www.frsb.xyz/">https://www.frsb.xyz/</a></p>

        <hr>

        <h3>To :</h3>
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>No. Tel:</strong> {{ $user->phone }}</p>

        <hr>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price (RM)</th>
                    <th>Quantity</th>
                    <th>Sub Total (RM)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ number_format($product->price, 2) }}</td>
                        <td>{{ $payment->paidReview->total_product }}</td>
                        <td>{{ number_format($product->price * $payment->paidReview->total_product, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <tH colspan="3" class="text-right">
                        <p>Total (RM)</p>
                    </tH>
                    <tH>
                        <p>{{ number_format($product->price * $payment->paidReview->total_product, 2) }}</p>
                    </tH>
                </tr>
            </tfoot>
        </table>


        <hr>

        <p><em> Paid at {{ \Carbon\Carbon::parse($payment->updated_at)->format('d-m-Y H:i:s') }}</em></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
