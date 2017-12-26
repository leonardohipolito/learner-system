@extends('course::layouts.master')

{{-- Page title --}}
@section('title')
Editar course
@parent
@stop


@section('content')
<section class="content-header">
    <h1>
        Editar Curso
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
            {!! Form::model($course,['route' => ['course.admin.courses.update',$course->id],'method'=>'PUT','files'=>true]) !!}
                @include('course::admin.courses.form')
            {!! Form::close() !!}
        </div>
    </div>
</section>
@stop
