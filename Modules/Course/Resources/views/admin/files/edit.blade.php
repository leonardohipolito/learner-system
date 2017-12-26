@extends('course::layouts.master')

{{-- Page title --}}
@section('title')
Editar file
@parent
@stop


@section('content')
<section class="content-header">
    <h1>
        Editar Files
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
            {!! Form::model($file,['route' => ['course.admin.files.update',$file->id],'method'=>'PUT']) !!}
                @include('course::admin.files.form')
            {!! Form::close() !!}
        </div>
    </div>
</section>
@stop
