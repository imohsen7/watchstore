<div class="table overflow-auto" tabindex="8">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">عنوان جستجو</label>
        <div class="col-sm-10">
            <input type="text" class="form-control text-left" dir="rtl" wire:model="search">
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead class="thead-light">
        <tr>
            <th class="text-center align-middle text-primary">ردیف</th>
            <th class="text-center align-middle text-primary">تصویر دسته بندی</th>
            <th class="text-center align-middle text-primary">نام دسته بندی</th>
            <th class="text-center align-middle text-primary">عملیات</th>
            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>
        @foreach ( $sliders as $index => $slider )
            <tr>
                <td class="text-center align-middle">{{$sliders->firstItem() + $index }}</td>
                <td class="text-center align-middle">
                    <figure class="avatar avatar">
                        <img src="{{url('images/admin/images/sliders/small/'.$slider->image)}}" class="rounded-circle" alt="image">
                    </figure>
                </td>
                <td class="text-center align-middle">{{$slider->title}}</td>
                <td class="text-center align-middle">
                    <a class="btn btn-outline-info" href="{{route('sliders.edit',$slider->id)}}">
                        ویرایش
                    </a>
                    <a class="btn btn-outline-danger" wire:click="deleteSlider({{$slider->id}})">
                        حذف
                    </a>
                </td>
                <td class="text-center align-middle">{{\Hekmatinasser\Verta\Verta::instance($slider->created_at)->format('%B %d, %Y ')}}</td>
            </tr>
    @endforeach
    </table>
    <div style="margin: 40px !important;"
            class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
            {{$sliders->links()}}
    </div>
</div>
<script type="text/javascript">
    window.addEventListener('deleteSlidernext',event=>{
        Swal.fire({
            title:'',
            text:'Are you sure delete this Slider ?',
            icon:'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes,Delete',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) { 
                Livewire.dispatch('destroySlider',{id:event.detail.id});
                Swal.fire(
                    'Deleted',
                    'Your slider deleted',
                    'success'
                )
            }
        }

        )
    })

</script>
