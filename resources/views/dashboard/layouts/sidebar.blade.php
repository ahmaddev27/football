<div class="side-menu-fixed light-side-menu">
    <div class="scrollbar side-menu-bg">
        <ul class="nav navbar-nav side-menu" id="sidebarnav">
            <!-- menu item Dashboard-->

            <li class="{{request()->routeIs('dashboard.index*') ? 'active' : '' }}">

                <a href="{{route('dashboard.index')}}"><i class="ti-home"></i><span class="right-nav-text">لوحة التحكم</span> </a>
            </li>


            <li class="{{request()->routeIs('dashboard.post*') ? 'active' : '' }}">
                <a href="{{route('dashboard.post.index')}}"><i class="ti-list"></i><span class="right-nav-text">الاخبار</span> </a>

            </li>

            <li class="{{request()->routeIs('dashboard.category*') ? 'active' : '' }}">
                <a href="{{route('dashboard.category.index')}}"><i class="ti-pie-chart"></i><span class="right-nav-text">التصنيفات</span> </a>
            </li>

            <li class="{{request()->routeIs('dashboard.user*') ? 'active' : '' }}">
                <a href="{{route('dashboard.user.index')}}"><i class="ti-user"></i><span class="right-nav-text">المستخدمين</span> </a>
            </li>


            <li class="{{request()->routeIs('dashboard.article*') ? 'active' : '' }}">
                <a href="{{route('dashboard.article.index')}}"><i class="ti-write"></i><span class="right-nav-text">المقالات</span> </a>


            </li>

            <li class="{{request()->routeIs('dashboard.inbox*') ? 'active' : '' }}">
                <a href="{{route('dashboard.inbox.index')}}"><i class="ti-email"></i><span class="right-nav-text">رسائل الزوار</span> <span class="badge badge-pill badge-warning float-right">{{\App\Models\inbox::where('is_read','0')->count()}}</span></a>

            </li>
            <li class="{{request()->routeIs('dashboard.comment*') ? 'active' : '' }}">
                <a href="{{route('dashboard.comment.index')}}"><i class="ti-comment"></i><span class="right-nav-text">التعليقات</span> </a>
            </li>

            <li class="{{request()->routeIs('dashboard.gallery*') ? 'active' : '' }}">
                <a href="{{route('dashboard.gallery.index')}}"><i class="ti-gallery"></i><span class="right-nav-text">مكتبة الصور</span> </a>
            </li>

            <li class="{{request()->routeIs('dashboard.video*') ? 'active' : '' }}">
                <a href="{{route('dashboard.video.index')}}"><i class="ti-video-camera"></i><span class="right-nav-text">مكتبة الفيديوهات</span> </a>
            </li>

            <li class="{{request()->routeIs('dashboard.page*') ? 'active' : '' }}">
                <a href="{{route('dashboard.page.index')}}"><i class="ti-file"></i><span class="right-nav-text">صفحات الموقع </span> </a>
            </li>

            <li class="{{request()->routeIs('dashboard.settings*') ? 'active' : '' }}">
                <a href="{{route('dashboard.settings.index')}}"><i class="ti-settings"></i><span class="right-nav-text">اعدادات الموقع</span> </a>
            </li>



        </ul>
    </div>
</div>
