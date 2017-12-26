@extends('course::layouts.master')

{{-- Page title --}}
@section('title')
Cadastrar course
@parent
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>
        Cadastrar Curso
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
            {!! Form::open(['route' => 'course.admin.courses.store','files'=>true]) !!}
                @include('course::admin.courses.form')
            {!! Form::close() !!}
        </div>
    </div>
    <!-- row-->
</section>
@stop
