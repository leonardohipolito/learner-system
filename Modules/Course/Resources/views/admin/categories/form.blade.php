<div class="form-group">

                        {!! Form::label('name', 'Name: ') !!}

                        {!! Form::text('name', null, ['class' => 'form-control','placeholder'=>'name']) !!}

                    </div>
<div class="form-group">

                        {!! Form::label('category_id', 'Category Id: ') !!}

                        {!! Form::select('category_id', $categories, null, ['class' => 'form-control','placeholder'=>'category_id']) !!}

                    </div>
<div class="form-group">

                        {!! Form::label('description', 'Description: ') !!}

                        {!! Form::textarea('description', null, ['class' => 'form-control','placeholder'=>'description']) !!}

                    </div>


<div class="form-group">
    <a class="btn btn-danger" href="{{route('course.admin.categories.index')}}">
        @lang('button.cancel')
    </a>
    <button type="submit" class="btn btn-success">
        @lang('button.save')
    </button>
</div>