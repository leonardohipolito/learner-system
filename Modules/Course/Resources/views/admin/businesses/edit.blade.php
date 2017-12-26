@extends('course::layouts.master')

{{-- Page title --}}
@section('title')
Editar Escola
@parent
@stop


@section('content')
<section class="content-header">
    <h1>
        Editar Escola
    </h1>
</section>
<!-- Main content -->
<section id="content">
    <div class="row">
        <div class="col-lg-12">
            @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
                @endforeach
            </ul>
            @endif
            {!! Form::model($business,['route' => ['course.admin.businesses.update',$business->id],'method'=>'PUT']) !!}
                @include('course::admin.businesses.form')
            {!! Form::close() !!}
        </div>
    </div>
</section>
@stop
