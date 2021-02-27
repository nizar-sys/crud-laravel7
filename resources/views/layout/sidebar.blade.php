<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="/">Pesona digital</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="/">Pd</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header"><a href="/dashboard" class="nav-link">Dashboard</a></li>
          <li class="menu-header">Menu</li>

          @foreach (siteHelpers::main_menu() as $mm)
            <li class="nav-item dropdown @if (Request::segment(1) == $mm->url) active @endif">
              <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>{{$mm->nama_menu}}</span></a>
              <ul class="dropdown-menu">
                 {{-- <li class="@if (Request::segment(1) == 'master-data') active @endif"><a class="nav-link" href="{{route('divisi.index')}}">{{$main_menu->}}</a></li> --}}

                 @foreach (siteHelpers:: sub_menu() as $sm)
                  @if ($sm->master_menu == $mm->id)
                    <li class=" @if (Request::segment(1) == $sm->url) active @endif"><a href="{{url($sm->url)}}" class="nav-link">{{$sm->nama_menu}}</a></li>
                  @endif
                 @endforeach
              </ul>
            </li>
          @endforeach

          
          <li class="@if (Request::segment(1) == 'crud') active @endif">
            <a href="{{route('crud.index')}}" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Article</span></a>
            <ul class="dropdown-menu">
              <li><a href="{{route('crud.create')}}">Create article</a></li>
              <li><a class="nav-link" href="{{route('crud.index')}}">List article</a></li>
            </ul>
          </li>
          {{-- <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li> --}}
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
          <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Documentation
          </a>
        </div>
    </aside>
  </div>