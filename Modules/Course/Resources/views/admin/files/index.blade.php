@extends('course::layouts.master')

{{-- Page title --}}
@section('title')
files
@parent
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
    <div class="pull-xs-right">
        <a class="btn btn-sm btn-primary" href="{{ route('course.admin.files.create') }}">
            <i class="fa fa-plus">
            </i>
            @lang('button.create')
        </a>
    </div>
    <h1>
        Arquivos
    </h1>
</section>
<!-- Main content -->
<section id="content">
    <div class="row">
        <div class="col-lg-12">
            @if ($files->count() >= 1)
            <table class="table table-bordered dataTable">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>Nome</th>
						<th>Completo</th>
						<th>Modulo</th>
                        <th>
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($files as $file)
                    <tr>
                        <td>
                            {!! $file->id !!}
                        </td>
                        <td>{!! $file->name !!}</td>
						<td>{!! $file->complete !!}</td>
						<td>{!! $file->module->name !!}</td>
                        <td>
                            {{-- <a href="{{$file->file}}" target="_blank"><i class="fa fa-eye"></i></a> --}}
                            <a href="{{ route('course.admin.files.show', $file->id) }}">
                                <i class="fa fa-fw fa-star text-primary" title="view file">
                                </i>
                            </a>
                            <a href="{{ route('course.admin.files.edit', $file->id) }}">
                                <i class="fa fa-fw fa-pencil text-warning" title="edit file">
                                </i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{$files->render()}} --}}
            @else
                @lang('general.noresults')
            @endif
        </div>
    </div>
    <!-- row-->
</section>
@stop
