@extends('course::layouts.master')

{{-- Page title --}}
@section('title')
tag
@parent
@stop

@section('content')
<section class="content-header">
    <h1>Tags</h1>
</section>

<section id="content">
    <table class="table">
        <tr><td>ID</td><td>{{ $tag->id }}</td></tr>
         <tr><td>Name</td><td>{{ $tag['name'] }}</td></tr>
					
    </table>
</section>
@stop