<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="{{ url('/admin/dashboard') }}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Users</span> <span class="label label-important">1</span></a>
      <ul>
        <li><a href="{{ url('/admin/view-users') }}">View Users</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Pages</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ url('/admin/add-page') }}">Add Page</a></li>
        <li><a href="{{ url('/admin/view-pages') }}">View Pages</a></li>
      </ul>
    </li>
   
  </ul>
</div>
<!--sidebar-menu-->