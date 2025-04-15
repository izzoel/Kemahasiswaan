  @php
      $url = url('/' . request()->segment(1) . '/' . request()->segment(2) . '/' . request()->segment(3));
      $menu = url('/' . request()->segment(1) . '/' . request()->segment(2));
      $open = url('/' . request()->segment(1) . '/');
  @endphp

  <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
      <div class="app-brand d-flex flex-column align-items-center text-center">
          <div class=" mt-4 h-80">
              @if (auth()->check())
                  <img class="card-img-top rounded" src="{{ asset('img/logo/' . $data['menuData']['logo'] . '.svg') }}" alt="{{ $data['menuData']['logo'] }}">
              @elseif (auth('organisasi')->check())
                  <img class="card-img-top rounded" src="{{ asset('logo/' . auth('organisasi')->user()->logo) }}" alt="{{ auth('organisasi')->user()->nama }}">
              @endif

          </div>
          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large text-white ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
      </div>

      @if (auth()->check())
          <ul class="menu-inner py-1 pt-4">
              <!-- Dashboard -->
              <li class="menu-item {{ $menu == $open ? 'open' : '' }}">
                  <a href="{{ url('/' . request()->segment(1) . '/dashboard') }}" class="menu-link">
                      <i class="menu-icon tf-icons bx bx-home-circle"></i>
                      <div>Dashboard</div>
                  </a>
              </li>

              <!-- Post -->
              <li class="menu-item {{ $menu == $open . '/post' ? 'open' : '' }}">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-edit"></i>
                      <div>Post</div>
                  </a>
                  <ul class="menu-sub">
                      <li class="menu-item {{ $url == $menu . '/artikel' ? 'active' : '' }}">
                          <a href="{{ url('/' . request()->segment(1) . '/post/artikel') }}" class="menu-link">
                              <div>Artikel</div>
                          </a>
                      </li>
                      <li class="menu-item {{ $url == $menu . '/kategori' ? 'active' : '' }}">
                          <a href="{{ url('/' . request()->segment(1) . '/post/kategori') }}" class="menu-link">
                              <div>Kategori</div>
                          </a>
                      </li>
                      <li class="menu-item {{ $url == $menu . '/pedoman' ? 'active' : '' }}">
                          <a href="{{ url('/' . request()->segment(1) . '/post/pedoman') }}" class="menu-link">
                              <div>Pedoman</div>
                          </a>
                      </li>
                  </ul>
              </li>

              <!-- Data -->
              <li class="menu-item {{ $menu == $open . '/data' ? 'open' : '' }}">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-server"></i>
                      <div>Data</div>
                  </a>

                  <ul class="menu-sub">
                      <li class="menu-item {{ $url == $menu . '/beasiswa' ? 'active' : '' }}">
                          <a href="{{ url('/' . request()->segment(1) . '/data/beasiswa') }}" class="menu-link">
                              <div>Beasiswa</div>
                          </a>
                      </li>
                      <li class="menu-item {{ $url == $menu . '/organisasi' ? 'active' : '' }}">
                          <a href="{{ url('/' . request()->segment(1) . '/data/organisasi') }}" class="menu-link">
                              <div>Organisasi Mahasiswa</div>
                          </a>
                      </li>
                      <li class="menu-item {{ $url == $menu . '/mahasiswa' ? 'active' : '' }}">
                          <a href="{{ url('/' . request()->segment(1) . '/data/mahasiswa') }}" class="menu-link">
                              <div>Mahasiswa</div>
                          </a>
                      </li>
                      <li class="menu-item {{ $url == $menu . '/prestasi' ? 'active' : '' }}">
                          <a href="{{ url('/' . request()->segment(1) . '/data/prestasi') }}" class="menu-link">
                              <div>Prestasi</div>
                          </a>
                      </li>
                  </ul>
              </li>

              <!-- Layanan -->
              <li class="menu-item {{ $menu == $open . '/layanan' ? 'open' : '' }}">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-copy-alt"></i>
                      <div>Layanan</div>
                  </a>

                  <ul class="menu-sub">
                      <li class="menu-item {{ $url == $menu . '/dana' ? 'active' : '' }}">
                          <a href="{{ url('/' . request()->segment(1) . '/layanan/dana') }}" class="menu-link">
                              <div>Dana</div>
                          </a>
                      </li>
                      <li class="menu-item {{ $url == $menu . '/kegiatan' ? 'active' : '' }}">
                          <a href="{{ url('/' . request()->segment(1) . '/layanan/kegiatan') }}" class="menu-link">
                              <div>Kegiatan</div>
                          </a>
                      </li>
                      <li class="menu-item {{ $url == $menu . '/konseling' ? 'active' : '' }}">
                          <a href="{{ url('/' . request()->segment(1) . '/layanan/konseling') }}" class="menu-link">
                              <div>Konseling</div>
                          </a>
                      </li>
                  </ul>
              </li>

              <li class="menu-item">
                  <a href="{{ route('logout') }}" class="menu-link">
                      <i class="menu-icon tf-icons bx bxs-left-arrow-alt"></i>
                      <div data-i18n="Kembali">Kembali</div>
                  </a>
              </li>


          </ul>
      @elseif (auth('organisasi')->check())
          <ul class="menu-inner py-1 pt-4">
              <!-- Dashboard -->
              <li class="menu-item {{ request()->url() == url('/' . request()->segment(1) . '/dashboard') ? 'active' : '' }} ">
                  <a href="{{ url('/' . request()->segment(1) . '/dashboard') }}" class="menu-link">
                      <i class="menu-icon tf-icons bx bx-home-circle"></i>
                      <div>Dashboard</div>
                  </a>
              </li>

              <!-- Data -->
              <li class="menu-item {{ $menu == $open . '/data' ? 'open' : '' }}">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-server"></i>
                      <div>Data</div>
                  </a>

                  <ul class="menu-sub">
                      <li class="menu-item {{ $url == $menu . '/struktur' ? 'active' : '' }}">
                          <a href="{{ url('/' . request()->segment(1) . '/data/struktur') }}" class="menu-link">
                              <div>Struktur Organisasi</div>
                          </a>
                      </li>
                      <li class="menu-item {{ $url == $menu . '/program' ? 'active' : '' }}">
                          <a href="{{ url('/' . request()->segment(1) . '/data/program') }}" class="menu-link">
                              <div>Program Kerja</div>
                          </a>
                      </li>
                  </ul>
              </li>

              <!-- Layanan -->
              <li class="menu-item {{ $menu == $open . '/layanan' ? 'open' : '' }}">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-copy-alt"></i>
                      <div>Layanan</div>
                  </a>

                  <ul class="menu-sub">
                      <li class="menu-item {{ $url == $menu . '/kegiatan' ? 'active' : '' }}">
                          <a href="{{ url('/' . request()->segment(1) . '/layanan/kegiatan') }}" class="menu-link">
                              <div>Kegiatan</div>
                          </a>
                      </li>

                      <li class="menu-item {{ $url == $menu . '/dana' ? 'active' : '' }}">
                          <a href="{{ url('/' . request()->segment(1) . '/layanan/dana') }}" class="menu-link">
                              <div>Dana</div>
                          </a>
                      </li>
                  </ul>
              </li>

              <li class="menu-item">
                  <a href="{{ route('logout') }}" class="menu-link">
                      <i class="menu-icon tf-icons bx bxs-left-arrow-alt"></i>
                      <div data-i18n="Kembali">Kembali</div>
                  </a>
              </li>


          </ul>
      @endif
  </aside>
