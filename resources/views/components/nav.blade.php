<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img style="height: 40px" src="{{ asset('assets/img/logo.png') }}" alt="">
            <span>مركز عقول مثمرة</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav ml-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            @auth('admin')
                <ul class="navbar-nav mr-auto bold font-weight-bold">
                    <!-- Authentication Links -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.workshops.all') }}">الدورات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/blog">المدونة</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">من نحن</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">التواصل</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.profile') }}">لوحة التحكم</a>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav mr-auto bold font-weight-bold">
                    <!-- Authentication Links -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('workshops.all') }}">الدورات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/blog">المدونة</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">من نحن</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">التواصل</a>
                    </li>
                    @guest()
                        <li class="nav-item btn bg-main p-0 text-white">
                            <a class="nav-link  text-white" href="{{ route('register') }}">تسجيل الدخول</a>
                        </li>
                    @endguest
                    @auth('web')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile') }}">حسابي</a>
                        </li>
                    @endauth
                </ul>
            @endauth
        </div>
    </div>
</nav>
