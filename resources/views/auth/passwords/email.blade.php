@extends('auth.layouts.auth')

@section('title', app_name() . ' | ' . __('labels.frontend.passwords.reset_password_box_title'))

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center mt-4">
        <div class="col col-sm-6 align-self-center">
            <div class="card">
                <div class="card-header">
                    <strong>
                        @lang('labels.auth.reset_password_box_title')
                    </strong>
                </div>
                <!--card-header-->

                <div class="card-body">

                    @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ html()->form('POST', route('password.email'))->open() }}
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('validation.attributes.email'))->for('email') }}

                                {{ html()->email('email')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.email'))
                                        ->attribute('maxlength', 191)
                                        ->required()
                                        ->autofocus() }}
                            </div>
                            <!--form-group-->
                        </div>
                        <!--col-->
                    </div>
                    <!--row-->

                    <div class="row">
                        <div class="col">
                            <div class="form-group mb-0 clearfix">
                                {{ form_submit(__('labels.auth.send_password_reset_link_button')) }}
                            </div>
                            <!--form-group-->
                        </div>
                        <!--col-->
                    </div>
                    <!--row-->
                    {{ html()->form()->close() }}
                </div><!-- card-body -->
            </div><!-- card -->
            <div>
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <p>
                                <a class="btn btn-lg btn-primary text-center" href="{{ route('login') }}"><strong>Login
                                        to
                                        backoffice</strong></a>
                            </p>
                        </div>
                    </div>
                </div>


            </div><!-- col-6 -->
        </div><!-- row -->
        @endsection