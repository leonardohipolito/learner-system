@extends('course::layouts.master')

{{-- Page title --}}
@section('title')
courses
@parent
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
    <div class="pull-xs-right">
        <a class="btn btn-sm btn-primary" href="{{ route('course.admin.courses.create') }}">
            <i class="fa fa-plus">
            </i>
            @lang('button.create')
        </a>
    </div>
    <h1>
        Cursos - {{$courses->count()}}
    </h1>
</section>
<!-- Main content -->
<section id="content">
    <div class="row">
        <div class="col-lg-12">
            @if ($courses->count() >= 1)
            <table class="table table-bordered table-striped dataTable">
                <thead>
                    <tr>
                        {{-- <th>
                            ID
                        </th> --}}
                        <th>Nome</th>
						<th>Categoria</th>
                        <th>Escola</th>
                        <th>Preço</th>
                        <th>Foto</th>
                        <th>
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                    <tr>
                        {{-- <td>
                            {!! $course->id !!}
                        </td> --}}
                        <td>
                        <a href="{{ route('course.admin.courses.show', $course->id) }}" class="text-danger">{!! $course->name !!}</a></td>
						<td>{!! $course->category->name_full !!}</td>
                        <td><a href="{{ route('course.admin.businesses.show',$course->business->id) }}" class="text-warning">{!! $course->business->name !!}</a></td>
                        <td>{!! $course->price !!}</td>
                        <td>{!! $course->photo !!}</td>
                        <td>
                            <a href="{{ route('course.admin.modules.create',['course_id'=>$course->id]) }}"><i class="fa fa-plus"></i></a>
                            <a href="{{ route('course.admin.courses.edit', $course->id) }}">
                                <i class="fa fa-fw fa-pencil text-warning" title="edit course">
                                </i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$courses->render()}}
            @else
                @lang('general.noresults')
            @endif
        </div>
    </div>
    <!-- row-->
</section>
@stop
