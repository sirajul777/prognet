<div class="container-fluid">
      <div class="row">
        {{-- sidebar --}}
        <nav id="sidebarMenu" class="sidebar collapse col-md-3 col-lg-2 d-md-block bg-dark">
          <div class="position-sticky pt-3">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" id="menu-kontak" href="{{ '/kontak' }}">
                  Kontak
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="menu-hobby" href="{{ '/hobby' }}">
                  Hobbies
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="menu-hobby" href="{{ '/kontak-hobbies' }}">
                  Kontak x Hobbies
                </a>
              </li>
            </ul>
          </div>
        </nav>

        {{-- content --}}
        
        <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <div class="col-md-9 col-lg-10">
                    <h1 class="text-center">@yield('titleContent')</h1>
                    @yield('modal')
                    @yield('mid')
                </div>
            </div>
        </main>
        
      </div>
    </div>