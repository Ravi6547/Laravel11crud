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
      <a href="{{ route('products.index') }}" class="btn btn-dark">back</a>
        </div>
      </div> 
        <div class="row d-flex justify-content-center my-4">
            <div class="col-md-10">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-dark">
                        <h2 class="text-white">Create Product</h2>
                    </div>
                    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label h5">Name</label>
                                <input type="text" id="name"  class="@error('name') is-invalid @enderror form-control form-control-lg" name="name" placeholder="Enter Full Name" value="{{ old('name') }}">
                                @error('name')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="sku" class="form-label h5">SKU</label>
                                <input type="text" id="sku" class="@error('sku') is-invalid @enderror form-control form-control-lg" name="sku" placeholder="SKU" value="{{ old('sku') }}">
                                @error('sku')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label h5">Price</label>
                                <input type="text" id="price" class="@error('price') is-invalid @enderror form-control form-control-lg" name="price" placeholder="Price" value="{{ old('price') }}">
                                @error('price')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label h5">Description</label>
                                <textarea id="description" placeholder="Description" class="form-control" name="description" cols="30" rows="5">{{ old('description') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label h5">Image</label>
                                <input type="file" id="image" class="form-control form-control-lg" name="image">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
