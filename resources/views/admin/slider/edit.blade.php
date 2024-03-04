@extends('admin.layouts.master')
@section('content')
<main class="main-content">
    @include('admin.layouts.errors')
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
                <div class="container">
                    <h6 class="card-title">ویرایش اسلایدر</h6>
                    <form method="POST" action="{{route('sliders.update',$slider->id)}}" enctype="multipart/form-data" >
                        @CSRF
                        @method('PATCH')
                        <div>
                            <figure class="avatar avatar">
										<img src="{{url('images/admin/images/sliders/small/'.$slider->image)}}" class="rounded-circle" alt="image">
							</figure>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">نام اسلایدر</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" placeholder="نام و نام خانوادگی" dir="rtl" name="title" " value="{{$slider->title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">لینک اسلایدر</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" placeholder="نام و نام خانوادگی" dir="rtl" name="url" " value="{{$slider->url}}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
							<label class="col-sm-2 col-form-label" for="file"> آپلود عکس </label>
							<input  class="col-sm-10" type="file" class="form-control-file" id="file" name="file">
						</div>
                        <div class="form-group row">
							<button name="submit" type="submit" class="btn btn-success btn-uppercase">
								<i class="ti-check-box m-r-5"></i> ذخیره
							</button>
                          
                        </div>
                    </form>
                </div>
            </div>
        </div>
		

	</main>
@endsection
@section('scripts')
<script type="text/javascript">
    $('.select2').select2();
</script>
@endsection