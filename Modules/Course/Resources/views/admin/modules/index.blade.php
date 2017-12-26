@extends('course::layouts.master')

{{-- Page title --}}
@section('title')
modules
@parent
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
    <div class="pull-xs-right">
        <a class="btn btn-sm btn-primary" href="{{ route('course.admin.modules.create') }}">
            <i class="fa fa-plus">
            </i>
            @lang('button.create')
        </a>
    </div>
    <h1>
        Modulos
    </h1>
</section>
<!-- Main content -->
<section id="content">
    <div class="row">
        <div class="col-lg-12">
            @if ($modules->count() >= 1)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
						<th>Curso</th>
                        <th>Nome</th>
                        <th>
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($modules as $module)
                    <tr>
                        <td>
                            {!! $module->id !!}
                        </td>
						<td>{!! $module->course->name !!}</td>
                        <td>{!! $module->name !!}</td>
                        <td>
                            <a href="{{ route('course.admin.files.create',['module_id'=>$module->id]) }}">
                                <i class="fa fa-plus"></i>
                            </a>
                            <a href="{{ route('course.admin.modules.show', $module->id) }}">
                                <i class="fa fa-fw fa-star text-primary" title="view module">
                                </i>
                            </a>
                            <a href="{{ route('course.admin.modules.edit', $module->id) }}">
                                <i class="fa fa-fw fa-pencil text-warning" title="edit module">
                                </i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$modules->render()}}
            @else
                @lang('general.noresults')
            @endif
        </div>
    </div>
    <!-- row-->
</section>
@stop
