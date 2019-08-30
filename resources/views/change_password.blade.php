@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('content_header')
    <h1>Change Password</h1>
@stop
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">{{ trans('adminlte::adminlte.password_reset_message') }}</p>
            <form action="{{ url(config('adminlte.password_reset_url', 'admin/change_password')) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" class="form-control"
                           placeholder="{{ trans('adminlte::adminlte.password') }}">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-flat">
                    {{ trans('adminlte::adminlte.reset_password') }}
                </button>
            </form>
        </div>
        <!-- /.login-box-body -->
    </div><!-- /.login-box -->
@stop
{{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
@section('css')
    {{--<link rel="stylesheet" href="/css/custom.css">--}}
@stop
@section('js')
    {{--<script src="/js/app.js"></script>--}}
@stop