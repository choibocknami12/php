<div class="header">
	<div class="coupon">
		<span>coupon</span>
	</div>
	
	<div class="loginNav">
		<div class="mainLogo">
			<a href="{{route('main')}}">
				<img src="/img/logo.jpg" alt="" height="65px" width="120px">
			</a>
		</div>
		<ul class="nav1">
			{{-- guest : 비로그인상태때 사용되는 블레이드탬플릿 문법 --}}
		{{-- @guest
			<li class="loginNavMenu"><a class="text-decoration-none fw-bold" style="color: #1c3761;" href="{{route('login.get')}}">login</a></li>
		@endguest --}}

		@if(auth()->check())
			<li class="loginNavMenu"><a class="text-decoration-none fw-bold" style="color: #1c3761;" href="{{route('logout.get')}}">logout</a></li>
			<li class="loginNavMenu"><a class="text-decoration-none fw-bold" style="color: #1c3761;" href="{{route('user.edit', [auth()->User()->u_id])}}">membership</a></li>
		@else
			<li class="loginNavMenu"><a class="text-decoration-none fw-bold" style="color: #1c3761;" href="{{route('login.get')}}">login</a></li>
		@endif
			<li class="loginNavMenu"><a class="text-decoration-none fw-bold" style="color: #1c3761;" href="{{route('regist.get')}}">join</a></li>
			<li class="loginNavMenu"><a class="text-decoration-none fw-bold" style="color: #1c3761;" href="">cart</a></li>

			{{-- <li class="loginNavMenu"><a class="text-decoration-none fw-bold" style="color: #1c3761;" href="{{route('logout.get')}}">logout</a></li> --}}
		{{-- @if (auth()->check())
			<li class="loginNavMenu"><a class="text-decoration-none fw-bold" style="color: #1c3761;" href="{{route('user.edit', [auth()->User()->u_id])}}">membership</a></li>
		@endif --}}
			
			
		</ul>
		<div class="searchBtn">
			<input type="hidden">
			<button>검색</button>
		</div>
	</div>
	<div class="productNav">
		<ul class="nav2">
			<li class="productNavMenu">INSIDE PETHROOM</li>
			<li class="productNavMenu">PRODUCT</li>
			<li class="productNavMenu">EVENT</li>
			<li class="productNavMenu">CS CENTER</li>
			<li class="productNavMenu">INQUIRY</li>
		</ul>
		<div>
			<a class="nav2Border text-decoration-none fw-bold" style="color: #1c3761;" href="">고객센터</a>
			<a class="nav2Border text-decoration-none fw-bold" style="color: #1c3761;" href="">전화주문</a>
		</div>
	</div>
</div>