<aside class="main-sidebar direction">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-right image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-right info">
                <p>Lord OF IT</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        {{-- <form action="#" method="get" class="sidebar-form"> --}}
        {{-- <div class="input-group"> --}}
        {{-- <input type="text" name="q" class="form-control" placeholder="جستجو..."> --}}
        {{-- <span class="input-group-btn"> --}}
        {{-- <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i --}}
        {{-- class="fa fa-search"></i> --}}
        {{-- </button> --}}
        {{-- </span> --}}
        {{-- </div> --}}
        {{-- </form> --}}
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">تنظیمات کاربران</li>
            <li class=" treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>کاربران</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ route('admin.users') }}"><i class="fa fa-circle-o"></i>لیست
                            همه کاربران</a></li>
                    {{-- <li class="active"><a href="{{ route('admin.normal.users') }}"><i --}} {{-- class="fa fa-circle-o"></i>لیست --}} {{-- کاربران عادی</a></li> --}} {{-- <li class="active"><a href="{{ route('admin.writer.users') }}"><i --}} {{-- class="fa fa-circle-o"></i>لیست --}} {{-- کاربران نویسنده</a></li> --}} {{-- <li class="active"><a href="{{ route('admin.admin.users') }}"><i --}} {{-- class="fa fa-circle-o"></i>لیست --}} {{-- ادمین ها</a></li> --}} </ul>
            </li>

            <!-- {{-- contact_us --}}
            <li class="header">ارتباطات</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>تماس با ما</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active">
                        {{-- <a href="{{ route('admin.contact.index') }}"><i class="fa fa-circle-o"></i>پیام های دریافت --}}
                        {{-- شده</a> --}}
                    </li>
                </ul>
            </li>
            {{-- contact_us --}} -->


            <!-- {{-- notifications --}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>پیام ها</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    {{-- <li class="active"><a href="{{ route('admin.notifications.private') }}"><i --}}
                    {{-- class="fa fa-circle-o"></i>پیام های خصوصی</a></li> --}}
                    {{-- <li class="active"><a href="{{ route('admin.notifications.public') }}"><i --}}
                    {{-- class="fa fa-circle-o"></i>پیام های عمومی</a></li> --}}
                </ul>
            </li>
            {{-- notifications --}} -->
            {{-- amoozesh --}}
            <li class="header">تحقیق و توسعه</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>دوره ها</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ route('admin.courses.index', 'fa') }}"><i class="fa fa-circle-o"></i>دوره ها</a></li>
                    <li class="active"><a href="{{ route('admin.courses.slider.index', 'fa') }}"><i class="fa fa-circle-o"></i>اسلایدر</a></li>
                </ul>
            </li>
            {{-- end of amoozesh --}}

            {{-- articels --}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>مقالات</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">

                    <li class="active"><a href="{{ route('admin.articles.index', 'fa') }}"><i class="fa fa-circle-o"></i>لیست مقالات </a></li>

                </ul>
            </li>
            {{-- end of articels --}}

            <!-- {{-- Services --}} -->
            <li class="header">خدمات</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span> خدمات</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">

                    <li class="active"><a href="{{ route('admin.services.index','fa') }}"><i class="fa fa-circle-o"></i>
                            متن های خدمات </a></li>
                    <li class="active"><a href="{{ route('admin.services_categories.index','fa') }}"><i class="fa fa-circle-o"></i>دسته بندی اصلی خدمات </a></li>
                    <li class="active"><a href="{{ route('admin.services_sub_categories.index','fa') }}"><i class="fa fa-circle-o"></i>زیر دسته ها </a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>تعرفه خدمات</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">

                    <li class="active"><a href="{{ route('admin.services.price.category.index', 'fa') }}"><i class="fa fa-circle-o"></i>دسته بندی تعرفه خدمات </a></li>
                </ul>
            </li>

            {{-- work_samples --}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>نمونه کار ها</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ route('admin.work_samples.category.index', 'fa') }}"><i class="fa fa-circle-o"></i>دسته بندی نمونه کار ها</a></li>
                    <li class="active"><a href="{{ route('admin.work_samples.index') }}"><i class="fa fa-circle-o"></i>همه نمونه کار ها</a></li>
                </ul>
            </li>
            {{-- work_samples end --}}

            <!-- {{-- invite to coaperate --}}
            <li class="header">دعوت به همکاری</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>گروه ها</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    {{-- <li class="active"><a href="{{ route('admin.invites.category.index') }}"><i --}}
                    {{-- class="fa fa-circle-o"></i>مشاهده همه گروه ها</a></li> --}}

                </ul>

                <ul class="treeview-menu">
                    {{-- <li class="active"><a href="{{ route('admin.invites.pages.index') }}"><i --}}
                    {{-- class="fa fa-circle-o"></i>مشاهده همه صفحات</a></li> --}}
                </ul>

            </li> -->

            <!-- {{-- invite to coaperate --}} -->
            <!-- {{-- end of services --}} -->

            {{-- Start OurTeam & about us --}}
            <li class="header"> تیم ما و درباره ما</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>تیم ما</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ route('admin.ourteam.slider.index', 'fa') }}"><i class="fa fa-circle-o"></i>اسلایدر صفحه</a></li>
                    <li class="active"><a href="{{ route('admin.ourteam.index', 'fa') }}"><i class="fa fa-circle-o"></i>همکاران </a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="{{ route('admin.about_us.index','fa') }}">
                    <i class="fa fa-dashboard"></i><span>درباره ما</span>
                </a>
            </li>

            <li class="treeview">
                <a href="{{ route('admin.comments.index') }}">
                    <i class="fa fa-dashboard"></i><span>کامنت ها</span>
                </a>
            </li>
            {{-- End OurTeam & about us --}}

            {{-- Start Footer --}}
            <li class="header">footer</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>footer</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active">
                        <a href="{{ route('admin.footer.titles.index', 'fa') }}"><i class="fa fa-circle-o"></i>عناوین</a>
                        <a href="{{ route('admin.footer.content.index', 'fa') }}"><i class="fa fa-circle-o"></i>متن
                            های
                            Footer</a>
                        <a href="{{ route('admin.footer.links.index', 'fa') }}"><i class="fa fa-circle-o"></i>لینک
                            ها</a>
                    </li>
                </ul>
            </li>
            {{-- End Footer --}}
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>