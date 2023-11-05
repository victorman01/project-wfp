@extends('layouts.home')

@section('title')
    <title>Product Detail</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="https://picsum.photos/400/500" alt="Product Image" class="img-fluid rounded-4">
            </div>
            <div class="col-md-8 product-container">
                <h1>Product Name</h1>
                <div class="card my-2 border-dark">
                    <div class="card-body">
                        <p>Description:</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus sequi neque pariatur a numquam,
                            vel non nihil officiis laborum? Possimus amet pariatur ullam veniam laborum voluptates eum,
                            <br>id soluta eveniet! Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut labore vitae
                            a quaerat quasi numquam? Earum, illo veritatis hic neque voluptatibus, fugiat iure ullam
                            molestias esse praesentium molestiae nemo dolores?
                        </p>
                    </div>
                </div>

                <div class="card my-2 border-dark">
                    <div class="card-body">
                        <p>Harga:<b>{{ $produk->harga }}</b> </p>
                        <p>Availability: <span class="text-success"><b>In stock</b></span></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col"> 
                      <div class="d-flex align-items-center mt-2">
                        <label for="quantity" class="me-2">Quantity:</label>
                        <input type="number" id="quantity" class="form-control" value="1" min="1">
                      </div>
              
                    </div>

                    <div class="col text-end">
                        <button class="btn btn-primary mt-2">Add to Cart</button>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery (for some Bootstrap features) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
