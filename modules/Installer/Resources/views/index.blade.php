@extends('installer::layouts.frontend')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('installer.name') !!}
    </p>
@endsection