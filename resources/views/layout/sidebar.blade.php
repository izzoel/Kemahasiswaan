  <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
      <div class="card h-80">
          <img class="card-img-top mb-2" src="{{ asset('img/logo/' . $data['menuData']['logo'] . '.svg') }}" alt="{{ $data['menuData']['logo'] }}">
      </div>
      {{-- <div class="menu-inner-shadow"></div> --}}

      @if (!is_null(Auth::user()))
          <ul class="menu-inner py-1 pt-4">
              <!-- Dashboard -->
              <li class="menu-item {{ request()->url() == url('/' . request()->segment(1) . '/dashboard') ? 'active' : '' }} ">
                  <a href="{{ url('/' . request()->segment(1) . '/dashboard') }}" class="menu-link">
                      <i class="menu-icon tf-icons bx bx-home-circle"></i>
                      <div>Dashboard</div>
                  </a>
              </li>

              <!-- Post -->
              {{-- <li class="menu-item {{ request()->url() == url('/' . request()->segment(1) . '/entry') ? 'active' : '' }} ">
                  <a href="{{ url('/' . request()->segment(1) . '/post') }}" class="menu-link">
                      <i class="menu-icon tf-icons bx bx-edit"></i>
                      <div>Post</div>
                  </a>
              </li> --}}

              <!-- Post -->
              <li class="menu-item open" style="">
                  <a href="" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-edit"></i>
                      <div>Post</div>
                  </a>

                  <ul class="menu-sub">
                      <li class="menu-item">
                          <a href="{{ url('/' . request()->segment(1) . '/artikel') }}" class="menu-link">
                              <div>Artikel</div>
                          </a>
                      </li>
                      <li class="menu-item">
                          <a href="layouts-without-navbar.html" class="menu-link">
                              <div>Galeri</div>
                          </a>
                      </li>
                  </ul>
              </li>

              <!-- Data -->
              <li class="menu-item open" style="">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-edit"></i>
                      <div>Data</div>
                  </a>

                  <ul class="menu-sub">
                      <li class="menu-item">
                          <a href="layouts-without-menu.html" class="menu-link">
                              <div>Organisasi</div>
                          </a>
                      </li>

                      <li class="menu-item">
                          <a href="layouts-without-navbar.html" class="menu-link">
                              <div>Mahasiswa</div>
                          </a>
                      </li>
                      <li class="menu-item">
                          <a href="layouts-without-navbar.html" class="menu-link">
                              <div>Prestasi</div>
                          </a>
                      </li>
                  </ul>
              </li>
              <!-- Layanan -->
              <li class="menu-item open" style="">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-edit"></i>
                      <div>Layanan</div>
                  </a>

                  <ul class="menu-sub">
                      <li class="menu-item">
                          <a href="layouts-without-menu.html" class="menu-link">
                              <div>Organisasi</div>
                          </a>
                      </li>

                      <li class="menu-item">
                          <a href="layouts-without-navbar.html" class="menu-link">
                              <div>Mahasiswa</div>
                          </a>
                      </li>
                      <li class="menu-item">
                          <a href="layouts-without-navbar.html" class="menu-link">
                              <div>Prestasi</div>
                          </a>
                      </li>
                  </ul>
              </li>

              <!-- Mahasiswa -->
              {{-- <li class="menu-item {{ request()->url() == url('/' . request()->segment(1) . '/mahasiswa') ? 'active' : '' }} ">
                  <a href="{{ route(request()->segment(1) . '_mahasiswa') }}" class="menu-link">
                      <i class="menu-icon tf-icons bx bx-user"></i>
                      <div data-i18n="Mahasiswa">Mahasiswa</div>
                  </a>
              </li>

              <!-- Laporan -->
              <li class="menu-item {{ request()->url() == url('/' . request()->segment(1) . '/lapor') ? 'active' : '' }} ">
                  <a href="{{ route(request()->segment(1) . '_lapor') }}" class="menu-link">
                      <i class="menu-icon tf-icons bx bx-comment-dots"></i>
                      <div data-i18n="Laporan">Laporan</div>
                  </a>
              </li>

              <!-- Setting -->
              <li class="menu-item {{ request()->url() == url('/' . request()->segment(1) . '/setting') ? 'active' : '' }} ">
                  <a href="{{ route(request()->segment(1) . '_setting') }}" class="menu-link">
                      <i class="menu-icon tf-icons bx bx-cog"></i>
                      <div data-i18n="Setting">Setting</div>
                  </a>
              </li> --}}

              <li class="menu-item">
                  <a href="{{ route('logout') }}" class="menu-link">
                      <i class="menu-icon tf-icons bx bxs-left-arrow-alt"></i>
                      <div data-i18n="Kembali">Kembali</div>
                  </a>
              </li>


          </ul>
      @endif
  </aside>
