@include('partials.header_admin')

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a class="site_title">
                            <img src="{{ asset('images/site_sidebar.png') }}" alt="" class="img-fluid">
                        </a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            @if (auth()->user()->role == 'admin')
                                <img src="{{ asset('images/img.jpg') }}" alt="..." class="img-circle profile_img">
                            @elseif (auth()->user()->role == 'ormawa')
                                <img src="{{ asset('storage/ormawa/[LOGO] ' . strtoupper(auth()->user()->username) . '.jpg') }}" alt="..." class="img-circle profile_img">
                            @endif
                        </div>
                        <div class="profile_info">
                            <h2>{{ strtoupper(auth()->user()->username) }}</h2>
                            <span>
                                <a id="logout" class="badge btn btn-warning btn-sm text-dark" href="{{ route('logout') }}" role="button"><i class="fa fa-sign-out"></i>
                                    Logout</a>
                            </span>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>Menu</h3>
                            <ul class="nav side-menu">

                                @if (auth()->user()->role == 'admin')
                                    <li><a><i class="fa fa-edit"></i> Post <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ route('show-artikel') }}">Artikel</a></li>
                                            <li><a href="{{ route('show-galeri') }}">Galeri</a></li>
                                        </ul>
                                    </li>
                                @endif

                                <li><a><i class="fa fa-table"></i> Data <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'ormawa')
                                            <li><a>Organisasi Mahasiwa<span class="fa fa-chevron-down"></span></a>
                                                <ul class="nav child_menu">
                                                    @if (auth()->user()->role == 'admin')
                                                        <li class="sub_menu"><a href="{{ route('show-ormawa') }}">Data
                                                                Ormawa</a>
                                                        </li>
                                                    @elseif (auth()->user()->role == 'ormawa')
                                                        <li><a href="{{ route('show-struktur') }}">Struktur Ormawa</a>
                                                        </li>
                                                    @endif
                                                    <li><a href="{{ route('show-proker') }}">Program Kerja Ormawa</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        @endif
                                        @if (auth()->user()->role == 'admin')
                                            <li><a href="{{ route('show-mahasiswa') }}">Mahasiwa</a></li>
                                            <li><a href="{{ route('show-prestasi') }}">Prestasi</a></li>
                                        @endif
                                        @if (auth()->user()->role == 'prodi')
                                            <li><a>Beasiswa<span class="fa fa-chevron-down"></span></a>
                                                <ul class="nav child_menu">
                                                    <li class="sub_menu"><a href="{{ route('show-beasiswa', 'akademik') }}">Akademik</a>
                                                    </li>
                                                    <li><a href="{{ route('show-beasiswa', 'nonakademik') }}">Non Akademik</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'ormawa')
                                    <li><a><i class="fa fa-desktop"></i> Layanan <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ route('show-kegiatan') }}">Pengajuan Kegiatan</a></li>
                                            <li><a href="{{ route('show-dana') }}">Pengajuan Dana</a></li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </div>

                    </div>

                </div>
            </div>


            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                @if (Request::url() == route('show-artikel'))
                                    @include('admin.artikel')
                                @elseif (Request::url() == route('show-galeri'))
                                    @include('admin.galeri')
                                @elseif (Request::url() == route('show-ormawa'))
                                    @include('admin.ormawa')
                                @elseif (Request::url() == route('show-struktur'))
                                    @include('admin.struktur')
                                @elseif (Request::url() == route('show-proker'))
                                    @include('admin.proker')
                                @elseif (Request::url() == route('show-kegiatan'))
                                    @include('admin.kegiatan')
                                @elseif (Request::url() == route('show-dana'))
                                    @include('admin.dana')
                                @elseif (Request::url() == route('show-beasiswa', 'akademik'))
                                    @include('admin.beasiswa')
                                @elseif (Request::url() == route('show-beasiswa', 'nonakademik'))
                                    @include('admin.beasiswa')
                                @elseif (Request::url() == route('show-prestasi'))
                                    @include('admin.prestasi')
                                @elseif (Request::url() == route('show-mahasiswa'))
                                    @include('admin.mahasiswa')
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Developed by <a href="https://izzoel.github.io/">zetware</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- compose -->
    <div class="compose col-md-6  ">
        <div class="compose-header">
            New Message
            <button type="button" class="close compose-close">
                <span>×</span>
            </button>
        </div>

        <div class="compose-body">
            <div id="alerts"></div>

            <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
                <div class="btn-group">
                    <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    </ul>
                </div>

                <div class="btn-group">
                    <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a data-edit="fontSize 5">
                                <p style="font-size:17px">Huge</p>
                            </a>
                        </li>
                        <li>
                            <a data-edit="fontSize 3">
                                <p style="font-size:14px">Normal</p>
                            </a>
                        </li>
                        <li>
                            <a data-edit="fontSize 1">
                                <p style="font-size:11px">Small</p>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="btn-group">
                    <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                    <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                    <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                    <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                </div>

                <div class="btn-group">
                    <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                    <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                    <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                    <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                </div>

                <div class="btn-group">
                    <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                    <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                    <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                    <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                </div>

                <div class="btn-group">
                    <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
                    <div class="dropdown-menu input-append">
                        <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
                        <button class="btn" type="button">Add</button>
                    </div>
                    <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
                </div>

                <div class="btn-group">
                    <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                    <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
                </div>

                <div class="btn-group">
                    <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                    <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                </div>
            </div>

            <div id="editor" class="editor-wrapper"></div>
        </div>

        <div class="compose-footer">
            <button id="send" class="btn btn-sm btn-success" type="button">Send</button>
        </div>
    </div>
    <!-- /compose -->

    @include('partials.footer_admin')

</body>

</html>
