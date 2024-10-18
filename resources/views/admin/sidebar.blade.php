<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="{{ asset('admin-p/img/me.jpg') }}" alt="..." class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h5">Sabuj Khan</h1>
        <p>Full Stack Developer</p>
        <p><b>Laravel | WordPress</b></p>
      </div>
    </div>
    <p><a class="{{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}" target="_blank" style="margin-left: 25px; margin-bottom: 20px"> <i class="fa fa-globe"></i>Home Page </a></p>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
            <li class="{{ Request::is('dashboard/admin') ? 'active' : '' }}"><a href="{{ url('/dashboard/admin') }}" target="_blank"> <i class="icon-home"></i>Admin Page </a></li>
            <li class="{{ Request::is('allpost') ? 'active' : '' }}"><a href="{{ url('/allpost') }}"> <i class="icon-grid"></i>All Posts </a></li>
            <li class="{{ Request::is('addnewpost') ? 'active' : '' }}"><a href="{{ url('/addnewpost') }}"> <i class="fa fa-bar-chart"></i>Add New Posts </a></li>
            <li class="{{ Request::is('category-list') ? 'active' : '' }}"><a href="{{ url('/category-list') }}"> <i class="fa fa-bar-chart"></i>Category </a></li>
            <li class="{{ Request::is('tag-list') ? 'active' : '' }}"><a href="{{ url('/tag-list') }}"> <i class="fa fa-bar-chart"></i>Tags </a></li>
    </ul>
    
    {{-- <span class="heading">Extras</span> --}}
    {{-- <ul class="list-unstyled">
      <li> <a href="#"> <i class="icon-settings"></i>Demo </a></li>
      <li> <a href="#"> <i class="icon-writing-whiteboard"></i>Demo </a></li>
      <li> <a href="#"> <i class="icon-chart"></i>Demo </a></li>
    </ul> --}}
  </nav>