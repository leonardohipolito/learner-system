<div class="form-group">

                        {!! Form::label('name', 'Nome: ') !!}

                        {!! Form::text('name', null, ['class' => 'form-control','placeholder'=>'name']) !!}

                    </div>
<div class="form-group">

                        {!! Form::label('description', 'Descrição: ') !!}

                        {!! Form::textarea('description', null, ['class' => 'form-control','placeholder'=>'description']) !!}

                    </div>
<div class="form-group">

                        {!! Form::label('price', 'Preço: ') !!}

                        {!! Form::text('price', null, ['class' => 'form-control','placeholder'=>'price']) !!}

                    </div>
<div class="form-group">

                        {!! Form::label('photo', 'Imagem: ') !!}

                        {!! Form::file('photo', null, ['class' => 'form-control','placeholder'=>'photo']) !!}

                    </div>
<div class="form-group">

                        {!! Form::label('business_id', 'Escola: ') !!}

                        {!! Form::select('business_id', $businesses, Request::get('business_id',null), ['class' => 'form-control','placeholder'=>'Escola']) !!}

                    </div>
<div class="form-group">

                        {!! Form::label('category_id', 'Categoria: ') !!}

                        {!! Form::select('category_id', $categories, null, ['class' => 'form-control','placeholder'=>'Categoria']) !!}

                    </div>


<div class="form-group">
    <a class="btn btn-danger" href="{{route('course.admin.courses.index')}}">
        @lang('button.cancel')
    </a>
    <button type="submit" class="btn btn-success">
        @lang('button.save')
    </button>
</div>