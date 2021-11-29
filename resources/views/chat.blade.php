@extends('layouts.app')

@section('content')
<div class="container">
    {{Auth::user()->name}}
    <chats :user="{{ auth()->user() }}"></chats>

</div>
@endsection