@extends('course::layouts.master')

{{-- Page title --}}
@section('title')
course
@parent
@stop

@section('content')
<section class="content-header">
    <h1>
        <div class="pull-xs-right">
            <a href="{{ route('course.admin.modules.create',['course_id'=>$course->id]) }}"><i class="fa fa-plus"></i></a>
        </div>
        {{$course->name}}
    </h1>
</section>
<section id="content">
    {!! $course->description !!}
    <legend>Cadastrar Módulos</legend>
        <input name="files[]" id="upload" type="file" class="form-control" multiple directory webkitdirectory allowdirs />
    @foreach ($course->modules as $module)
    	<div class="panel panel-success">
            @if ($module->name!='Unico')
            <div class="panel-heading">
                <h3 class="panel-title">
                    <div class="pull-xs-right">
                        <a href="{{ route('course.admin.files.create',['module_id'=>$module->id]) }}"><i class="fa fa-plus"></i></a>
                        <a href="{{ route('course.admin.modules.show', $module->id) }}">
                                <i class="fa fa-fw fa-star text-primary" title="view module">
                                </i>
                            </a>
                    </div>
                    {{$module->name}}
                </h3>
            </div>
            @endif

    		<div class="panel-body">
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
    		</div>
    	</div>
    @endforeach
</section>
<script>
    jQuery(document).ready(function($) {
        var uppie = new Uppie();
        uppie(document.querySelector('#upload'), function(event, formData, files) {
            files.forEach(function(path) {
               formData.append("paths[]", path);
             });
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {//Call a function when the state changes.
                if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                  location.reload()
                }
            }
              xhr.open('POST', '{{ route('course.admin.courses.module',$course->id) }}');
              xhr.send(formData);
        })
    });
</script>
@stop
