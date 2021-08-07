@extends("admin.layout.app")
@section('content')

    <section id="basic-datatable" class="filter-section">

        <div class="row">
            <div class="col-lg-12 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Products</h4>
                        {{-- <div class="text-white float-right">
                            <a class="btn btn-primary text-white mb-2 float-right modal-button" href="{{ route('products.create') }}">
                                Add product</a>
                        </div> --}}
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Size</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody class="js-data-list">
                                        @if ($products->count() > 0)
                                        @foreach ($products as $keys => $product)
                                        <tr>
                                            <th scope="row">{{ $products->firstItem() + $keys }}</th>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->size }}</td>
                                            <td><img src="{{ '/images/'.$product->image }}"  width="100"></td>
                                          
                                        </tr>
                                        @endforeach


                                         <td colspan="11" class="pagination-table">
                                            <div class="text-center mt-1">
                                                {{ $products->links('pagination') }}
                                            </div>
                                        </td>
                                        @else
                                        <td colspan="11">
                                            <div class="alert alert-danger">Result not found !</div>
                                        </td>    
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
@endsection
