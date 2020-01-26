@extends('layouts.backend')

@section('title', app_name() . ' | ' . __('labels.products.pricing_management'))


@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> {{  __('labels.products.pricing_management') }}</h4>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-sm-12">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="">
                            <a href="{{ route('admin.products.view_pricing', $product->id) }}"
                                class="btn btn-success btn-sm m-1" data-toggle="tooltip"
                                title="List the pricing history"><i class="fas fa-list"></i></a>

                            <a href="{{ route('admin.products.create_pricing', $product->id) }}"
                                class="btn btn-primary btn-sm m-1" data-toggle="tooltip" title="Create a pricing"><i
                                    class="fas fa-plus"></i></a>

                           <a href="{{ route('admin.products.view', $product->id) }}" class="btn btn-info btn-sm m-1"
                                data-toggle="tooltip" title="Back to product"><i
                                    class="fas fa-arrow-alt-circle-left"></i></a>
                        </div>
                    </div>
                </div>

                <form autocomplete="off" role="form"
                    action="{{ route('admin.products.delete_pricing.destroy', [$pricing->product_id, $pricing->id]) }}"
                    method="post">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <div class="form-group row {!! $errors->first('pricing_group_id', 'has-warning') !!}">
                        <label for="pricing_group_id" class="col-sm-3 col-form-label">{{ trans('labels.products.pricing_group') }}</label>
                        <div class="col-sm-9">
                            {{ Form::select('pricing_group_id', $pricing_groups, (isset($pricing) ? $pricing->pricing_group_id : null), ['class'=>'form-control col-sm-3', 'disabled']) }}
                            {!! $errors->first('pricing_group_id', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div> 

                    <div class="form-group row {!! $errors->first('quantity', 'has-warning') !!}">
                        <label for="quantity"
                            class="col-sm-3 col-form-label">{{ trans('labels.products.amount') }}</label>
                        <div class="col-sm-2">
                            <input type="number" disabled class="form-control" id="amount" name="amount" autocomplete="off"
                                value="{{{ old('amount', isset($pricing) ? $pricing->amount : null) }}}"> {!!
                            $errors->first('amount', '<span class="help-block">:message</span>') !!}
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