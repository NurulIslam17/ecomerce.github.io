@extends('admin.master')

@section('title')
    Manage Product
@endsection

@section('main')
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="text-center">Product Table</h3>
                    <p class="text-center text-danger">{{Session('deleted')}}</p>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr class="bg-warning">
                                <th>SL</th>
                                <th>Product</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($products as $product )
                            <tr>
                                <td> {{ $loop->iteration }}</td>
                                <td>{{   $product->product_name }}</td>
                                <td>{{   $product->brand_name }}</td>
                                <td>{{   $product->price }} BDT</td>
                                <td>{{   $product->status == 1? 'Published' : 'Unpublished' }}</td>
                                <td>{{   substr($product->description,0,20) }}...</td>
                                <td>
                                    <img src="{{asset($product->image)}}" alt="Not Found" style="height: 80px; width: 80px">
                                </td>
                                <td class="text-center">
{{--                                    <a href="#" class="btn btn-success rounded-0">Edit</a>--}}

                                    <form action="{{ route('edit') }}" method="post" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="edit_id" value="{{ $product->id}}">
                                        <input type="submit" value="Edit" class="btn btn-success rounded-0">
                                    </form>

                                    <a href="{{ route('product.delete',['id'=>$product->id]) }}" onclick="return confirm('Are you Sure to delete this ?')" class="btn btn-danger  rounded-0">Delete</a>

                                    <a href="{{ route('status',['id'=>$product->id]) }}" onclick="return confirm('Are you Sure to change status ?')" class="btn btn-{{$product->status ==1 ? "dark" : "info"}} rounded-0">{{$product->status ==1 ? "Unpublished" : "Published"}}</a>

{{--                                    @if($product->status ==1)--}}

{{--                                        <a href="{{ route('status',['id'=>$product->id]) }}" onclick="return confirm('Are you Sure to change status ?')" class="btn btn-danger rounded-0">Unpublished</a>--}}
{{--                                    @else--}}
{{--                                        <a href="{{ route('status',['id'=>$product->id]) }}" onclick="return confirm('Are you Sure to change status ?')" class="btn btn-info  rounded-0">Published</a>--}}
{{--                                    @endif--}}

                                </td>
                            </tr>@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

@endsection
