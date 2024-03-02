@extends('admin.layouts.master')
@section('content')
<main class="main-content">
   <div class="row">
       @if (\Illuminate\Support\Facades\Session::has('message'))
            <div class="col-sm-12 alert alert-info">
                <div>
                    {{session('message')}}
                </div>
            </div>
       @endif
    </div>

		<div class="card">
            <div class="card-body">
				<livewire:admin.roles/>
            </div>
        </div>

	</main>
@endsection