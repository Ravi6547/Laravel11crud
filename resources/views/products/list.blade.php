<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 11 CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="bg-dark py-2">
        <h3 class="text-white text-center">Laravel 11 CRUD</h3>
    </div>
    <div class="container">
        <div class="row justify-content-center my-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('products.create') }}" class="btn btn-dark">Create</a>
            </div>
        </div> 
        <div class="row d-flex justify-content-center my-4">
            @if(Session::has('success'))
                <div class="col-md-10 mt-4">
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                </div>
            @endif
            
            <div class="col-md-10">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-dark">
                        <h2 class="text-white">Products</h2>
                    </div>
                    <div class="card-body">
                        <!-- Content for displaying products will go here -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>IMAGE</th>
                                    <th>NAME</th>
                                    <th>SKU</th>
                                    <th>PRICE</th>
                                    <th>CREATED AT</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($products->isNotEmpty())
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td> 
                                    <td>
                                        @if(!empty($product->image))
                                            <img width="50" src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->name }}">
                                        @endif
                                    </td>
                                    <td>{{ $product->name }}</td> 
                                    <td>{{ $product->sku }}</td> 
                                    <td>{{ $product->price }}</td> 
                                    <td>{{ \Carbon\Carbon::parse($product->created_at)->format('d M, Y') }}</td> 
                                    <td>
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-dark">Edit</a>

                                        <a href="#" onclick="deleteProduct({{$product->id }});" class="btn btn-danger">Delete</a>
                                        <form id="delete-product-form-{{$product->id }}" action="{{ route('products.destroy', $product->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        
                                        </form>
                                    </td> 
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-center">No products found.</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-10DgK82hIHOQf09x6MftJY03fzxuA4DbfZhl8D0wHxP1DfbYMMsZlM7cZFTXtbk" crossorigin="anonymous"></script>
</body>
</html>

   <script>
    function deleteProduct(id) {
        if (confirm('Are you sure you want to delete this product?')) {
            document.getElementById('delete-product-form-' + id).submit();
        }
    }
</script>

