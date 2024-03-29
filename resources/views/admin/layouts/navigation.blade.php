<div class="navigation">
		<div class="navigation-icon-menu">
			@hasanyrole('مدیر اصلی')
			<ul>
				<li data-toggle="tooltip" title="کاربران">
					<a href="#users" title=" کاربران">
						<i class="icon ti-user"></i>
					</a>
				</li>
				<li data-toggle="tooltip" title="محصولات">
					<a href="#products" title=" محصولات">
						<i class="icon ti-shopping-cart"></i>
					</a>
				</li>
			</ul>
			@endhasanyrole
			<ul>
				<li data-toggle="tooltip" title="ویرایش پروفایل">
					<a href="#" class="go-to-page">
						<i class="icon ti-settings"></i>
					</a>
				</li>
				<li data-toggle="tooltip" title="خروج">
					<a href="login.html" class="go-to-page">
						<i class="icon ti-power-off"></i>
					</a>
				</li>
			</ul>
		</div>
		<div class="navigation-menu-body">
			<ul id="users">
				<li>
					<a href="#">کاربران</a>
					<ul>
						<li><a href="{{route('users.create')}}">ایجاد کاربر</a></li>
						<li><a href="{{route('users.index')}}">لیست کاربران</a></li>
					</ul>
				</li>
				<li>
					<a href="#">نقش ها</a>
					<ul>
						<li><a href="{{route('roles.create')}}">ایجاد نقش</a></li>
						<li><a href="{{route('roles.index')}}">لیست نقش ها</a></li>
					</ul>
				</li>
				<li>
					<a href="#">لاگ ها</a>
					<ul>
						<li><a href="{{route('logs')}}">مشاهده لاگ ها</a></li>
					</ul>
				</li>
			</ul>
			<ul id="products">
				<li>
					<a href="#">دسته بندی</a>
					<ul>
						<li><a href="{{route('category.create')}}">ایجاد دسته بندی</a></li>
						<li><a href="{{route('category.index')}}">لیست دسته بندی</a></li>
					</ul>
				</li>
				<li>	
					<a href="#">اسلایدر</a>
					<ul>
						<li><a href="{{route('sliders.create')}}">ایجاد اسلایدر</a></li>
						<li><a href="{{route('sliders.index')}}">لیست اسلایدر</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>