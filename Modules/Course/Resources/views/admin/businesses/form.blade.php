<div class="form-group">

                        {!! Form::label('name', 'Name: ') !!}

                        {!! Form::text('name', null, ['class' => 'form-control','placeholder'=>'name']) !!}

                    </div>
<div class="form-group">

                        {!! Form::label('site', 'Site: ') !!}

                        {!! Form::text('site', null, ['class' => 'form-control','placeholder'=>'site']) !!}

                    </div>
<div class="form-group">

                        {!! Form::label('logo', 'Logo: ') !!}

                        {!! Form::text('logo', null, ['class' => 'form-control','placeholder'=>'logo']) !!}

                    </div>


<div class="form-group">
    <a class="btn btn-danger" href="{{route('course.admin.businesses.index')}}">
        @lang('button.cancel')
    </a>
    <button type="submit" class="btn btn-success">
        @lang('button.save')
    </button>
</div>