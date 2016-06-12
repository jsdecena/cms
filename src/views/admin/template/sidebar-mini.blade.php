<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu">
	<li class="header">MAIN NAVIGATION</li>
	<li @if(!request()->segment(2)) class="active" @endif><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
	<li class="treeview @if(request()->segment(2) == 'user') active @endif">
	  <a href="#">
	    <i class="fa fa-users"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i>
	  </a>
	  <ul class="treeview-menu">
	    <li><a href="{{route('admin.user.index')}}"><i class="fa fa-circle-o text-success"></i> List users</a></li>
	    <li><a href="{{route('admin.user.create')}}"><i class="fa fa-plus text-danger"></i> Add a user</a></li>
	  </ul>
	</li>
	<li class="treeview @if(request()->segment(2) == 'page') active @endif">
	  <a href="#">
	    <i class="fa fa-file-text-o"></i> <span>Pages</span> <i class="fa fa-angle-left pull-right"></i>
	  </a>
	  <ul class="treeview-menu">
	    <li><a href="{{route('admin.page.index')}}"><i class="fa fa-circle-o text-success"></i> List pages</a></li>
	    <li><a href="{{route('admin.page.create')}}"><i class="fa fa-plus text-danger"></i> Add a page</a></li>
	  </ul>
	</li>
	<li class="treeview @if(request()->segment(2) == 'post') active @endif">
	  <a href="#">
	    <i class="fa fa-file-text"></i> <span>Posts</span> <i class="fa fa-angle-left pull-right"></i>
	  </a>
	  <ul class="treeview-menu">
	    <li><a href="{{route('admin.post.index')}}"><i class="fa fa-circle-o text-success"></i> List posts</a></li>
	    <li><a href="{{route('admin.post.create')}}"><i class="fa fa-plus text-red"></i> Add a post</a></li>
	  </ul>
	</li>
	<li class="treeview @if(request()->segment(2) == 'category') active @endif">
	  <a href="#">
	    <i class="fa fa-star"></i> <span>Categories</span> <i class="fa fa-angle-left pull-right"></i>
	  </a>
	  <ul class="treeview-menu">
	    <li><a href="{{route('admin.category.index')}}"><i class="fa fa-circle-o text-success"></i> List categories</a></li>
	    <li><a href="{{route('admin.category.create')}}"><i class="fa fa-plus text-red"></i> Add a category</a></li>
	  </ul>
	</li>	
</ul>