@extends('course::layouts.master')

{{-- Page title --}}
@section('title')
businesses
@parent
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
    <div class="pull-xs-right">
        <a class="btn btn-sm btn-primary" href="{{ route('course.admin.businesses.create') }}">
            <i class="fa fa-plus">
            </i>
            @lang('button.create')
        </a>
    </div>
    <h1>
        Escolas
    </h1>
</section>
<!-- Main content -->
<section id="content">
    <div class="row">
        <div class="col-lg-12">
            @if ($businesses->count() >= 1)
            <table class="table table-bordered table-striped dataTable">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Logo
                        </th>
                        <th>
                            Nome
                        </th>
                        <th>
                            Site
                        </th>
                        <th>
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($businesses as $business)
                    <tr>
                        <td>
                            {!! $business->id !!}
                        </td>
                        <td>
                            {!! $business->logo !!}
                        </td>
                        <td>
                            <a href="{{ route('course.admin.businesses.show', $business->id) }}">
                                {!! $business->name !!}
                            </a>
                        </td>
                        <td>
                            {!! $business->site !!}
                        </td>
                        <td>
                            <a href="{{ route('course.admin.courses.create',['business_id'=>$business->id]) }}">
                                <i class="fa fa-plus">
                                </i>
                            </a>
                            <a href="{{ route('course.admin.businesses.show', $business->id) }}">
                                <i class="fa fa-fw fa-star text-primary" title="view business">
                                </i>
                            </a>
                            <a href="{{ route('course.admin.businesses.edit', $business->id) }}">
                                <i class="fa fa-fw fa-pencil text-warning" title="edit business">
                                </i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$businesses->render()}}
            @else
                @lang('general.noresults')
            @endif
        </div>
    </div>
    <!-- row-->
</section>
@stop
