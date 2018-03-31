@extends('layouts.app')

@section('nav')
<li class="nav-item dropdown">
    <a class="nav-link" href="{{ route('product') }}">Product <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item active">
    <a class="nav-link" >Orders <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link" href="{{ route('location') }}">Location <span class="sr-only">(current)</span></a>
</li>
@endsection