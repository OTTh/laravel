@extends('layouts')

@section('header')
头部header
@stop

@section('sidebar')
侧边栏sidebar
@stop

@section('content')
主内容区域sidebar
<!--模板中输出PHP变量-->
<p>{{$students}}</p>
<!--模板中输出PHP方法-->
<p>{{time()}}</p>
<p>{{date('Y-m-d H:i:s',time())}}</p>
<!-- <p>{{var_dump($students)}}</p> -->
<!--原样输出-->
<p>@{{$name}}</p>

{{--模板注释--}}
<!--模板注释-->
{{--引入子视图--}}
@include('student.common')

@if($students)
    {{$students}}
@else
    students
@endif

@if(count($students)>1)
    {{$students}}
@elseif(count($students)==1)
    {{$students}}
@else
    students
@endif

@foreach($students as $student)
    <p>{{$student->name}}</p>
@endforeach


@forelse($students as $student)
    <p>{{$student->name}}</p>
@empty
    <p>null</p>
@endforelse

<a href="{{ url('student/url') }}">url()</a>
<a href="{{ action('Student@urlTest') }}">action()</a>
<a href="{{ route('url') }}">route()</a>
@stop



@section('footer')
底部footers
@stop