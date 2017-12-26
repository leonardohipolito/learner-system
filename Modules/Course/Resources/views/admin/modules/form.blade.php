<div class="form-group">

                        {!! Form::label('name', 'Nome: ') !!}

                        {!! Form::text('name', 'Unico', ['class' => 'form-control','placeholder'=>'name']) !!}

                    </div>
<div class="form-group">

                        {!! Form::label('course_id', 'Curso: ') !!}

                        {!! Form::select('course_id', $courses, Request::get('course_id',null), ['class' => 'form-control','placeholder'=>'course_id','required'=>'required']) !!}

                    </div>


<div class="form-group">
    <a class="btn btn-danger" href="{{route('course.admin.modules.index')}}">
        @lang('button.cancel')
    </a>
    <button type="submit" class="btn btn-success">
        @lang('button.save')
    </button>
</div>