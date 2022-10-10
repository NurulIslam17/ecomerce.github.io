@extends('admin.master')

@section('title')
    Add Product
@endsection

@section('main')
    <div class="row m-0 p-0">
        <div class="col-md-6 mx-auto">
            <div class="card rounded-0">
                <div class="card-header bg-warning">
                    <h5 class="text-center">Update the Product</h5>
                    <p class="text-center text-success">{{Session('inserted')}}</p>
                </div>
                <div class="card-body">

                    <form action="{{ route('update.product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="updated_id" value="{{$edit->id}}">
                        <div class="row mb-2">
                            <label  class="col-md-4" for="">Product name</label>
                            <div class="col-md-8">
                                <input type="text" name="product_name" value="{{$edit->product_name}}" class="form-control rounded-0" placeholder="Product name">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label  class="col-md-4" for="">Category</label>
                            <div class="col-md-8">
                                <input type="text" name="category" value="{{$edit->category}}" class="form-control rounded-0" placeholder="Product Category">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label  class="col-md-4" for="">Brand Name</label>
                            <div class="col-md-8">
                                <input type="text" name="brand_name" value="{{$edit->brand_name}}"  class="form-control rounded-0" placeholder="Product Brand Name">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label  class="col-md-4" for="">Price</label>
                            <div class="col-md-8">
                                <input type="text" name="price" value="{{$edit->price}}" class="form-control rounded-0" placeholder="Product Price">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label  class="col-md-4" for="">Status</label>
                            <div class="col-md-8">
                                <input type="radio" name="status" {{$edit->status == 1 ? 'checked':''}} value="1" checked > Published
                                <input type="radio" name="status" {{$edit->status == 0 ? 'checked':''}}  value="0" > Unpublished
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label  class="col-md-4" for="">Description</label>
                            <div class="col-md-8">
                            <textarea class="form-control rounded-0" name="description" cols="6" placeholder="Description" rows="10">
                               {{$edit->description}}
                            </textarea>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label  class="col-md-4" for="">Product Image</label>
                            <div class="col-md-5">
                                <input type="file" name="image" class="form-control rounded-0">
                            </div>
                            <div class="col-md-3">
                                <img src="{{asset($edit->image)}}" style="height: 80px;width: 80px">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label  class="col-md-4" for=""></label>
                            <div class="col-md-8">
                                <input type="submit" value="Update Product" class="btn btn-success rounded-0">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
