@extends('course::layouts.master')

{{-- Page title --}}
@section('title')
Cadastrar tag
@parent
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>
        Cadastrar Tags
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
            {!! Form::open(['route' => 'course.admin.tags.store']) !!}
                @include('course::admin.tags.form')
            {!! Form::close() !!}
        </div>
    </div>
    <!-- row-->
</section>
@stop
