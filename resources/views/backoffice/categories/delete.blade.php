@extends('adminlte::page')

@section('title', config('corvus.app_name') . ' | ' . __('labels.categories.management'))


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> {{  __('labels.categories.management') }}</h4>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="btn-toolbar float-right" role="toolbar" aria-label="">
                            <a href="{{ route('backoffice.categories.create') }}" class="btn btn-success btn-xs m-1"
                               data-toggle="tooltip" title="Create a category"><i class="fas fa-plus"></i></a>
                            <a href="{{ route('backoffice.categories.index') }}" class="btn btn-success btn-xs m-1"
                               data-toggle="tooltip" title="List the categories"><i class="fas fa-list"></i></a>
                        </div>
                    </div>
                </div>

                @include('includes.partials.messages')

                <form autocomplete="off" role="form" action="{{ route('backoffice.categories.destroy', $category->id) }}"
                    method="post">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                    <div class="form-group {!! $errors->first('name', 'has-warning') !!}">
                        <label for="name">{{ trans('labels.categories.name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" autocomplete="off"
                            value="{{{ old('name', isset($category) ? $category->name : null) }}}" readonly> {!!
                        $errors->first('name', '<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group">
                        <p>{{ trans_choice('labels.categories.products_count_definitions', $category->products()->count()) }}</p>
                    </div>

                    <button type="submit" class="btn btn-primary btn-md mb-4 float-right">
                    <i class="fas fa-trash align-middle"></i> <span
                            class="align-middle"><strong>{{__('labels.general.buttons.delete')}}</strong></span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
