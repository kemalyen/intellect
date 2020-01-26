@extends('layouts.backend')

@section('title', app_name() . ' | ' . __('labels.products.category_management'))


@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> {{  __('labels.products.category_management') }}</h4>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-sm-12">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="">
                            <a href="{{ route('admin.products.view_categories', $product->id) }}"
                                class="btn btn-success btn-sm m-1" data-toggle="tooltip"
                                title="List the categories"><i class="fas fa-list"></i></a>

                            <a href="{{ route('admin.products.create_category', $product->id) }}"
                                class="btn btn-primary btn-sm m-1" data-toggle="tooltip" title="Add Product to a Category"><i
                                    class="fas fa-plus"></i></a>

                           <a href="{{ route('admin.products.view', $product->id) }}" class="btn btn-info btn-sm m-1"
                                data-toggle="tooltip" title="Back to product"><i
                                    class="fas fa-arrow-alt-circle-left"></i></a>
                        </div>
                    </div>
                </div>

                <form autocomplete="off" role="form"
                    action="{{ route('admin.products.delete_category.destroy', [$product->id, $category->id]) }}"
                    method="post">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <input type="hidden" name="category_id" value="{{{ $category->id }}}" />
                    <input type="hidden" name="product_id" value="{{{ $product->id }}}" />
                    <div class="form-group row {!! $errors->first('category', 'has-warning') !!}">
                        <label for="category"product_id
                            class="col-sm-3 col-form-label">Category Name</label>
                        <div class="col-sm-9">
                               {{ $category->name }}
                            {!! $errors->first('category', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>

                    <button type="submit" class="btn btn-danger btn-md mb-4 float-right">
                        <i class="fas fa-trash align-middle"></i> <span
                            class="align-middle"><strong>{{__('labels.general.buttons.delete')}}</strong></span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection