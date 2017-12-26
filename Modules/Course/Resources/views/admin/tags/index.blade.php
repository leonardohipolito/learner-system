@extends('course::layouts.master')

{{-- Page title --}}
@section('title')
tags
@parent
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>
        Tags
    </h1>
</section>
<!-- Main content -->
<section id="content">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="panel-title pull-left">
                <i class="fa fa-fw fa-list">
                </i>
                Tags
            </h4>
            <div class="pull-xs-right">
                <a class="btn btn-sm btn-primary" href="{{ route('course.admin.tags.create') }}">
                    <i class="fa fa-plus">
                    </i>
                    @lang('button.create')
                </a>
            </div>
            <br/>
            @if ($tags->count() >= 1)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>Name</th>
                        <th>
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                    <tr>
                        <td>
                            {!! $tag->id !!}
                        </td>
                        <td>{!! $tag->name !!}</td>
                        <td>
                            <a href="{{ route('course.admin.tags.show', $tag->id) }}">
                                <i class="fa fa-fw fa-star text-primary" title="view tag">
                                </i>
                            </a>
                            <a href="{{ route('course.admin.tags.edit', $tag->id) }}">
                                <i class="fa fa-fw fa-pencil text-warning" title="edit tag">
                                </i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$tags->render()}}
            @else
                @lang('general.noresults')
            @endif
        </div>
    </div>
    <!-- row-->
</section>
@stop
