        <!--sidebar start-->
        <aside>

            <div id="sidebar" class="nav-collapse md-box-shadowed">
                <!-- sidebar menu start-->
                <div class="leftside-navigation leftside-navigation-scroll">
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li class="sidebar-profile">

                            <div class="profile-main">
                                <p class="text-right profile-options"></p>
                                <p class="image">
                                    <img alt="image" src="{{ asset('assets/images/users/image-user.jpg') }}" width="80">
                                    <span class="status"><i class="fa fa-circle text-success"></i></span>
                                </p>
                                <p>
                                    <span class="name">{{ Auth::user()->name }}</span><br>
                                    <span class="position" style="font-family: monospace;">Guru SD-TELKOM</span>
                                </p>
                            </div>

                        </li>
                        <li class='{{ route('guru.home') }}'><a href="#" class="hvr-bounce-to-right-sidebar-parent active"><span class='icon-sidebar icon-home fa-2x'></span><span>Profile</span></a></li>

                        <li><a href="" class="hvr-bounce-to-right-sidebar-parent">
                            <span class='icon-sidebar pe-7s-portfolio fa-2x'></span>
                            <span>Data Siswa</span></a>
                        </li>
                        <li class='sub-menu '><a href="1" class="hvr-bounce-to-right-sidebar-parent"><span class='icon-sidebar icon-screen-desktop fa-2x'></span><span>Layouts</span></a>
                            <ul class='sub'>
                                <li class="sub-menu"><a href="javascript:void(0);">Testing</a>
                                    <ul class='sub active'>
                                        <li><a href='{{ route('vidio-test') }}'>Vidio</a>
                                        </li>
                                        <li><a href='../layouts/boxed_page_fixed_header.html'>Default + Fixed Header</a>
                                        </li>
                                        <li><a href='../layouts/boxed_page_no_sidebar.html'>No sidebar</a>
                                        </li>
                                        <li><a href='../layouts/boxed_page_no_sidebar_fixed_header.html'>No sidebar + Fixed Header</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href='../layouts/full_width_content.html'>Full width content</a>
                                </li>
                                <li><a href='../layouts/blank.html'>Blank Page</a>
                                </li>
                            </ul>
                        </li>




                    </ul>
                </div>
                <!-- sidebar menu end-->
            </div>

        </aside>    <!--sidebar end-->
