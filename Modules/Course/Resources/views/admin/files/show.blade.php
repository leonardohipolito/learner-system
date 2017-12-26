@extends('course::layouts.master')

{{-- Page title --}}
@section('title')
file
@parent
@stop

@section('content')
{{--
<section class="content-header">
    <h1>
        Files
    </h1>
</section>
--}}
<section id="content">
    <ol class="breadcrumb" style="margin-bottom: 5px;">
        <li><a href="/course/admin/courses">Home</a></li>
        <li><a href="{{ route('course.admin.businesses.show',$file->module->course->business->id) }}">{{$file->module->course->business->name}}</a></li>
        <li><a href="{{ route('course.admin.categories.show',$file->module->course->category->id) }}">{{$file->module->course->category->name}}</a></li>
        <li><a href="{{ route('course.admin.courses.show',$file->module->course->id) }}">{{$file->module->course->name}}</a></li>
        <li><a href="{{ route('course.admin.modules.show',$file->module->id) }}">{{$file->module->name}}</a></li>
        <li class="active">{{ $file['name'] }}</li>
    </ol>
    <div class="row">
        <div class="col-md-8">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="{{$file->file}}">
                </iframe>
            </div>
            {!! $file['description'] !!}
        </div>
        <!-- /.col-md-8 -->
        <div class="col-md-4">
            <table class="table hidden-xs-up">
                <tr>
                    <td>
                        #
                    </td>
                    <td>
                        {{ $file->id }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Completo
                    </td>
                    <td>
                        {{ $file['complete'] }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Curso
                    </td>
                    <td>
                        {{ $file->module->course->name }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Módulo
                    </td>
                    <td>
                        {{ $file->module->name }}
                    </td>
                </tr>
            </table>
            <a href="{{ route('course.admin.files.complete',$file->id) }}">
                @if ($file->complete)
                    <i class="fa fa-check-circle-o fa-2x"></i>
                @else
                    <i class="fa fa-circle-o fa-2x"></i>
                @endif
            </a>
            {!! Form::model($file,['route' => ['course.admin.files.update',$file->id],'method'=>'PUT']) !!}
            <label><input type="checkbox" name="complete" value="1"> Completo</label>
                <div class="form-group">
                    {!!Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Anotações'])!!}
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Finalizar</button>
                </div>
            {!! Form::close() !!}
        </div>
        <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->
</section>
@stop
