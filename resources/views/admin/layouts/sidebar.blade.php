
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">

                    {{--// profile image and display name of user--}}

                    <span>
                            <img alt="image"  style="max-width: 183px;"
                                 src="{{asset('photos/cartoon.png')}}"/>
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                                <span class="block m-t-xs">
                                    <strong class="font-bold"></strong>
                                    {{-- <strong class="font-bold">{{Auth::user()->name}}</strong> --}}

                                </span>
                            </span>
                    </a>



                </div>

                <div class="logo-element">

                    <img src="{{asset('photos/logo_title.png')}}" style="margin-top: 20px; margin-bottom:auto;" height="20"
                         alt="logo">
                </div>
            </li>
            {{--Home--}}





            <li>
                <a href="{{url('admin/social-media')}}">
                    <i class="fa fa-home"></i>
                    <span class="nav-label">الحسابات الشخصية</span>
                </a>
            </li>

            <li>
                <a href="{{url('admin/contact-us')}}">
                    <i class="fa fa-home"></i>
                    <span class="nav-label"> تواصل معنا</span>
                </a>
            </li>

            <li>
                <a href="{{url('admin/clients')}}">
                    <i class="fa fa-building" aria-hidden="true"></i>
                    <span class="nav-label"> العملاء المشتركين</span>
                </a>
            </li>


            <li>
                <a href="{{url('admin/advertising')}}">
                    <i class="fa fa-building" aria-hidden="true"></i>
                    <span class="nav-label"> الاعلانات</span>
                </a>
            </li>


            <li>
                <a href="{{url('admin/application-screen')}}">
                    <i class="fa fa-building" aria-hidden="true"></i>
                    <span class="nav-label"> شاشات التطبيق</span>
                </a>
            </li>

            <li>
                <a href="{{url('admin/who-are')}}">
                    <i class="fa fa-building" aria-hidden="true"></i>
                    <span class="nav-label"> من نحن</span>
                </a>
            </li>

            <li>
                <a href="{{url('admin/application-feature')}}">
                    <i class="fa fa-building" aria-hidden="true"></i>
                    <span class="nav-label"> مميزات التطبيق</span>
                </a>
            </li>




        </ul>
    </div>
</nav>
