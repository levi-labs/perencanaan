  <div class="sidebar " id="sidebar">
      <div class="sidebar-inner slimscroll">
          <div id="sidebar-menu" class="sidebar-menu">
              <ul>
                  <li class="{{ request()->is('dashboard') ? 'active' : '' }}"> <a href="{{ url('dashboard') }}"><i
                              class="fas fa-tachometer-alt"></i>
                          <span>Dashboard</span></a> </li>
                  <li class="list-divider"></li>
                  @if (auth()->user()->akses_user == 'Produksi' || auth()->user()->akses_user == 'Admin')
                      <li class="submenu">
                          <a href="#"><i class="fas fa-suitcase"></i> <span> Menu Master </span>
                              <span class="menu-arrow"></span></a>
                          <ul class="submenu_class" style="display: none;">
                              @if (auth()->user()->akses_user == 'Admin')
                                  <li><a class="{{ request()->is('daftar-supplier') ? 'active' : '' }}"
                                          href="{{ url('daftar-supplier') }}"> Supplier </a></li>
                                  <li><a class="{{ request()->is('daftar-material') ? 'active' : '' }}"
                                          href="{{ url('daftar-material') }}"> Material </a></li>
                                  <li><a class="{{ request()->is('daftar-customer') ? 'active' : '' }}"
                                          href="{{ url('daftar-customer') }}"> Customer </a></li>
                                  <li><a class="{{ request()->is('daftar-user') ? 'active' : '' }}"
                                          href="{{ url('daftar-user') }}"> User </a></li>
                              @elseif(auth()->user()->akses_user == 'Produksi' || auth()->user()->akses_user == 'Admin')
                                  <li><a class="{{ request()->is('daftar-model') ? 'active' : '' }}"
                                          href="{{ url('daftar-model') }}"> Model </a></li>
                              @endif
                          </ul>
                      </li>
                  @endif



                  <li class="submenu"> <a href="#"><i class="far fa-money-bill-alt"></i> <span> Transaksi </span>
                          <span class="menu-arrow"></span></a>
                      <ul class="submenu_class" style="display: none;">
                          <li><a class="{{ request()->is('daftar-request', 'detail-request/*') ? 'active' : '' }}"
                                  href="{{ url('daftar-request') }}"> Permintaan Material </a></li>
                          <li><a class="{{ request()->is('daftar-penerimaan', 'detail-penerimaan/*') ? 'active' : '' }}"
                                  href="{{ url('daftar-penerimaan') }}"> Penerimaan Material </a></li>
                          <li><a class="{{ request()->is('daftar-produksi', 'detail-penerimaan/*') ? 'active' : '' }}"
                                  href="{{ url('daftar-produksi') }}"> Finish Produksi </a></li>
                          {{-- <li><a href="{{ url('daftar-persediaan') }}"> Persediaan Material </a></li> --}}
                          @if (auth()->user()->akses_user == 'Admin' || (auth()->user()->akses_user = 'PPC'))
                              <li><a class="{{ request()->is('daftar-material-masuk', 'edit-material-masuk/*', 'tambah-material-masuk/*') ? 'active' : '' }}"
                                      href="{{ url('daftar-material-masuk') }}"> Restock Material </a></li>
                          @endif
                      </ul>
                  </li>
                  @if (auth()->user()->akses_user == 'Admin')
                      <li class="submenu"> <a href="#"><i class="fas fa-book"></i> <span> Laporan </span> <span
                                  class="menu-arrow"></span></a>
                          <ul class="submenu_class" style="display: none;">
                              <li><a class="{{ request()->is('report-permintaan') ? 'active' : '' }}"
                                      href="{{ url('report-permintaan') }}">Report Permintaan</a></li>
                              <li><a class="{{ request()->is('report-terkirim') ? 'active' : '' }}"
                                      href="{{ url('report-terkirim') }}">Report Terkirim</a></li>
                              <li><a class="{{ request()->is('report-finish') ? 'active' : '' }}"
                                      href="{{ url('report-finish') }}"> Report Produksi </a></li>

                          </ul>
                      </li>
                  @endif


              </ul>
          </div>
      </div>
  </div>
