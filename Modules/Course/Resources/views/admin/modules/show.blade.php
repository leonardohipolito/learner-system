@extends('course::layouts.master')

{{-- Page title --}}
@section('title')
module
@parent
@stop

@section('content')
<section class="content-header">
    <div class="pull-xs-right">
        <a href="{{ route('course.admin.files.create',['module_id'=>$module->id]) }}"><i class="fa fa-plus"></i></a>
    </div>
    <h1>Módulo {{$module->name}}</h1>
</section>

<section id="content">
    <ol class="breadcrumb" style="margin-bottom: 5px;">
        <li><a href="/course/admin/courses">Home</a></li>
        <li><a href="{{ route('course.admin.businesses.show',$module->course->business->id) }}">{{$module->course->business->name}}</a></li>
        <li><a href="{{ route('course.admin.courses.show',$module->course->id) }}">{{$module->course->name}}</a></li>
        <li class="active">{{ $module['name'] }}</li>
    </ol>
    <h4>Fotos adicionais</h4>
    <form id="upload" action="{{ route('course.admin.courses.upload',$module->id) }}" class="dropzone">
      <div class="fallback">
        <input name="file" type="file" multiple />
      </div>
    </form>
    <br>
    <ul class="list-unstyled">
    	@foreach ($module->files as $file)
    		<li>
    			<a href="{{ route('course.admin.files.show', $file->id) }}" class="btn btn-{{$file->complete?'success':'primary'}} btn-block text-xs-left">
    			    {{$file->name}}
    			</a>
    			<br>
    		</li>
    	@endforeach
    </ul>
</section>
@stop