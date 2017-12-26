@extends('course::layouts.master')

{{-- Page title --}}
@section('title')
category
@parent
@stop

@section('content')
<section class="content-header">
    <h1>
        {{ $category['name'] }}
    </h1>
</section>
<section id="content">
    <table class="table">
        <tr>
            <td>
                ID
            </td>
            <td>
                {{ $category->id }}
            </td>
        </tr>
        <tr>
            <td>
                Description
            </td>
            <td>
                {{ $category['description'] }}
            </td>
        </tr>
    </table>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">
                Cursos
            </h3>
        </div>
        <div class="panel-body">
            @if ($category->courses->count() >= 1)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        {{--
                        <th>
                            ID
                        </th>
                        --}}
                        <th>
                            Nome
                        </th>
                        <th>
                            Categoria
                        </th>
                        <th>
                            Escola
                        </th>
                        <th>
                            Preço
                        </th>
                        <th>
                            Foto
                        </th>
                        <th>
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category->courses as $course)
                    <tr>
                        {{--
                        <td>
                            {!! $course->id !!}
                        </td>
                        --}}
                        <td>
                            <a href="{{ route('course.admin.courses.show',$course->id) }}">{!! $course->name !!}</a>
                        </td>
                        <td>
                            {!! $course->category->name !!}
                        </td>
                        <td>
                            {!! $course->business->name !!}
                        </td>
                        <td>
                            {!! $course->price !!}
                        </td>
                        <td>
                            {!! $course->photo !!}
                        </td>
                        <td>
                            <a href="{{ route('course.admin.modules.create',['course_id'=>$course->id]) }}">
                                <i class="fa fa-plus">
                                </i>
                            </a>
                            <a href="{{ route('course.admin.courses.show', $course->id) }}">
                                <i class="fa fa-fw fa-star text-primary" title="view course">
                                </i>
                            </a>
                            <a href="{{ route('course.admin.courses.edit', $course->id) }}">
                                <i class="fa fa-fw fa-pencil text-warning" title="edit course">
                                </i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    		            @else
    		                @lang('general.noresults')
    		            @endif
        </div>
    </div>
</section>
@stop
