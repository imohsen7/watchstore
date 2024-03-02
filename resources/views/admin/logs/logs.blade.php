@extends('admin.layouts.master')
@section('content')
<main class="main-content">
    @include('admin.layouts.errors')
		<div class="card">
            <div class="card-body">
                <iframe style="width:100%;height:1000px;" src="{{route('log-viewer::dashboard')}}"></iframe>
            </div>
        </div>
		

	</main>
@endsection