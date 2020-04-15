@extends('backend.layout')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Products
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="{{ admin_url('dashboard') }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a></li>
                        <li class="breadcrumb-item">Products</li>
                        <li class="breadcrumb-item active">Product List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>All Products</h5>
                        <div class="pull-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-original-title="test" data-target="#exampleModal">Add Category</button>
                        </div>
                    </div>
                    <div class="card-body order-datatable">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>SL no.</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Regular Price</th>
                                    <th>Sale Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>
                                        @php $imgs = json_decode($product->images); @endphp
                                        <div class="d-flex">
                                            @if(array_key_exists(0,$imgs))
                                            <img src="{{ url('public/assets/images/products/'.$imgs[0]) }}" alt="" class="img-fluid img-30 mr-2 blur-up lazyloaded">
                                                @else
                                                <img src="{{ url('public/assets/images/placeholder-image.png') }}" alt="" class="img-fluid img-30 mr-2 blur-up lazyloaded">
                                                    @endif
                                                    </div>
                                                    </td>
                                                    <td>{{ $product->title }}</td>
                                                    <td>{{ getSiteData('site_currency').$product->regular_price }}</td>
                                                    @if($product->sale_price != '')
                                                    <td>{{ getSiteData('site_currency').$product->sale_price }}</td>
                                                    @else
                                                    <td>{{ 'N/A' }}</td>
                                                    @endif
                                                    @if($product->is_deleted == 1)
                                                    <td><span class="badge badge-primary">Trushed</span></td>
                                                    @elseif($product->is_active == 0)
                                                    <td><span class="badge badge-warning">Drafts</span></td>
                                                    @elseif($product->is_active == 1)
                                                    <td><span class="badge badge-success">Published</span></td>
                                                    @endif
                                                    <td>
                                                        <div>
                                                            <a href="{{ admin_url('edit-product/'.Crypt::encryptString($product->id)) }}"><i class="fa fa-edit mr-2 font-success"></i></a>
                                                            <a href="{{ admin_url('delete-product/'.Crypt::encryptString($product->id)) }}"><i class="fa fa-trash font-danger"></i></a>
                                                        </div>
                                                    </td>
                                                    </tr>
                                                    @php $i++; @endphp
                                                    @endforeach
                                                    </tbody>
                                                    </table>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <!-- Container-fluid Ends-->
                                                    </div>

                                                    @endsection