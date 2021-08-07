@extends('admin.layout.app')
@section('content')

                <form action="{{ route('products.store') }}" method="POST" class="form-horizontal client-side-validation" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <span>Product Name</span>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" id="name" class="form-control" name="name"
                                            placeholder="name" required>
                                            @error('name')
                                            <i style="color: red; font-size:small">{{ $message }}</i>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <span>Price</span>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="price" id="price" class="form-control" name="price"
                                            placeholder="price" required>
                                            @error('price')
                                            <i style="color: red; font-size:small">{{ $message }}</i>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <span>Description</span>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" id="description" class="form-control" name="description"
                                            placeholder="description" required>
                                            @error('description')
                                            <i style="color: red; font-size:small">{{ $message }}</i>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <span>Size</span>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" id="text" class="form-control" name="size"
                                            placeholder="text">
                                            @error('size')
                                            <i style="color: red; font-size:small">{{ $message }}</i>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <span>image</span>
                                    </div>
                                    <div class="col-md-8">
                                    <input type="file"  name="image" class="form-control"/>
                                    @error('image')
                                    <i style="color: red; font-size:small">{{ $message }}</i>
                                @enderror
                                </div>
                        
                            </div>
                            <div class="col-md-8 offset-md-4">
                                <button type="submit"
                                    class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Submit</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection