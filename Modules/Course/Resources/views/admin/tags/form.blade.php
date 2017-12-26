<div class="form-group">

                        {!! Form::label('name', 'Name: ') !!}

                        {!! Form::text('name', null, ['class' => 'form-control','placeholder'=>'name']) !!}

                    </div>


<div class="form-group">
    <a class="btn btn-danger" href="{{route('course.admin.tags.index')}}">
        @lang('button.cancel')
    </a>
    <button type="submit" class="btn btn-success">
        @lang('button.save')
    </button>
</div>