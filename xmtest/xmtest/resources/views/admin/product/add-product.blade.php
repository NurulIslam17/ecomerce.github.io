@extends('admin.master')

@section('title')
    Add Product
@endsection

@section('main')
    <h4 class="text-center"> Add Product</h4>
    <div class="row m-0 p-0">
        <div class="col-md-6 mx-auto">
            <div class="card rounded-0">
                <div class="card-header bg-info">
                    <h5 class="text-center">Create New Product</h5>
                    <p class="text-center text-success">{{Session('inserted')}}</p>
                </div>
                <div class="card-body">

                    <form action="{{ route('new.product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-2">
                            <label  class="col-md-4" for="">Product name</label>
                            <div class="col-md-8">
                                <input type="text" name="product_name" class="form-control rounded-0" placeholder="Product name">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label  class="col-md-4" for="">Category</label>
                            <div class="col-md-8">
                                <input type="text" name="category" class="form-control rounded-0" placeholder="Product Category">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label  class="col-md-4" for="">Brand Name</label>
                            <div class="col-md-8">
                                <input type="text" name="brand_name" class="form-control rounded-0" placeholder="Product Brand Name">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label  class="col-md-4" for="">Price</label>
                            <div class="col-md-8">
                                <input type="text" name="price" class="form-control rounded-0" placeholder="Product Price">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label  class="col-md-4" for="">Status</label>
                            <div class="col-md-8">
                                <input type="radio" name="status" value="1" checked > Published
                                <input type="radio" name="status" value="0" > Unpublished
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label  class="col-md-4" for="">Description</label>
                            <div class="col-md-8">
                            <textarea class="form-control rounded-0" name="description" cols="6" placeholder="Description" rows="10">

                            </textarea>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label  class="col-md-4" for="">Product Image</label>
                            <div class="col-md-8">
                                <input type="file" name="image" class="form-control rounded-0">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label  class="col-md-4" for=""></label>
                            <div class="col-md-8">
                                <input type="submit" value="Create Product" class="btn btn-success rounded-0">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
