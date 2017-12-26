@extends('course::layouts.master')

{{-- Page title --}}
@section('title')
categories
@parent
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
            <div class="pull-xs-right">
                <a class="btn btn-sm btn-primary" href="{{ route('course.admin.categories.create') }}">
                    <i class="fa fa-plus">
                    </i>
                    @lang('button.create')
                </a>
            </div>
    <h1>
        Categorias - {{$categories->count()}}
    </h1>
</section>
<!-- Main content -->
<section id="content">
    <div class="row">
        <div class="col-lg-12">
            @if ($categories->count() >= 1)
            <table class="table table-bordered table-striped dataTable">
                <thead>
                    <tr>
                        <th>Nome</th>
						<th>Descrição</th>
                        <th>
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td><a href="{{ route('course.admin.categories.show', $category->id) }}">{!! $category->name_full !!}</a></td>
						<td>{!! $category->description !!}</td>
                        <td>
                            <a href="{{ route('course.admin.categories.show', $category->id) }}">
                                <i class="fa fa-fw fa-star text-primary" title="view category">
                                </i>
                            </a>
                            <a href="{{ route('course.admin.categories.edit', $category->id) }}">
                                <i class="fa fa-fw fa-pencil text-warning" title="edit category">
                                </i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{@$categories->render()}} --}}
            @else
                @lang('general.noresults')
            @endif
        </div>
    </div>
    <!-- row-->
</section>
@stop
