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
            <th class="text-center align-middle text-primary">دسته پدر</th>
            <th class="text-center align-middle text-primary">عملیات</th>
            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>
        @foreach ( $categories as $index => $category )
            <tr>
                <td class="text-center align-middle">{{$categories->firstItem() + $index }}</td>
                <td class="text-center align-middle">
                    <figure class="avatar avatar">
                        <img src="{{url('images/admin/images/categories/small/'.$category->image)}}" class="rounded-circle" alt="image">
                    </figure>
                </td>
                <td class="text-center align-middle">{{$category->title}}</td>
                <td class="text-center align-middle">{{$category->parent->title}}</td>
                <td class="text-center align-middle">
                    <a class="btn btn-outline-info" href="{{route('category.edit',$category->id)}}">
                        ویرایش
                    </a>
                    <a class="btn btn-outline-danger" wire:click="deleteCategory({{$category->id}})">
                        حذف
                    </a>
                </td>
                <td class="text-center align-middle">{{\Hekmatinasser\Verta\Verta::instance($category->created_at)->format('%B %d, %Y ')}}</td>
            </tr>
    @endforeach
    </table>
    <div style="margin: 40px !important;"
            class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
            {{$categories->links()}}
    </div>
</div>
<script type="text/javascript">
    window.addEventListener('deleteCategorynext',event=>{
        Swal.fire({
            title:'',
            text:'Are you sure delete this category ?',
            icon:'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes,Delete',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) { 
                Livewire.dispatch('destroyCategory',{id:event.detail.id});
                Swal.fire(
                    'Deleted',
                    'Your category deleted',
                    'success'
                )
            }
        }

        )
    })

</script>
