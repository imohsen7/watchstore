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
                    <h6 class="card-title">ویرایش دسته بندی</h6>
                    <form method="POST" action="{{route('category.update',$category->id)}}" enctype="multipart/form-data" >
                        @CSRF
                        @method('PATCH')
                        <div>
                            <figure class="avatar avatar">
										<img src="{{url('images/admin/images/categories/small/'.$category->image)}}" class="rounded-circle" alt="image">
							</figure>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">نام دسته بندی</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" placeholder="نام و نام خانوادگی" dir="rtl" name="title" " value="{{$category->title}}">
                            </div>
                        </div>
                        <div class="form-group row" data-select2-id="23">
                            <label class="col-sm-2 col-form-label">دسته پدر</label>
                            <div class="col-sm-10">
                            <select class="select2 form-select" name="parent_id" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option selected="selected" value="0">دسته اصلی</option>
                                @foreach ( $categories as $key => $c_category)
                                    @if ($category->parent_id == $c_category->id)
                                        <option  selected="selected" value="{{$c_category->id}}">{{$c_category->title}}</option>
                                    @else
                                        <option  value="{{$c_category->id}}">{{$c_category->title}}</option>
                                    @endif
                                @endforeach
                            </select>
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