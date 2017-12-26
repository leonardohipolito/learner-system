<div class="form-group">
    {!!Form::label('file','Arquivo',['class'=>'control-label'])!!}
    {!!Form::file('file',null,['class'=>'form-control','placeholder'=>'Arquivo'])!!}
</div>
<div class="form-group">

                        {!! Form::label('complete', 'Complete: ') !!}

                        {!! Form::text('complete', null, ['class' => 'form-control','placeholder'=>'complete']) !!}

                    </div>
<div class="form-group">

                        {!! Form::label('description', 'Description: ') !!}

                        {!! Form::textarea('description', null, ['class' => 'form-control','placeholder'=>'description']) !!}

                    </div>
<div class="form-group">

                        {!! Form::label('module_id', 'Module Id: ') !!}

                        {!! Form::select('module_id', $modules, Request::get('module_id',null), ['class' => 'form-control','placeholder'=>'module_id']) !!}

                    </div>


<div class="form-group">
    <a class="btn btn-danger" href="{{route('course.admin.files.index')}}">
        @lang('button.cancel')
    </a>
    <button type="submit" class="btn btn-success">
        @lang('button.save')
    </button>
</div>