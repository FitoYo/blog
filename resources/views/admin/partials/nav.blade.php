

<ul class="sidebar-menu" data-widget="tree">
  <li class="header">Navegacion</li>
  <!-- Optionally, you can add icons to the links -->
  <li {{ request()->is('admin') ? "class=active" : '' }}><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> <span>Inicio</span></a></li>
  <li ><a href="{{ route('home') }}"><i class="fa fa-beer"></i> <span>Posts Publicos</span></a></li>
  <li class="treeview {{ request()->is('admin/posts*') ? "active" : '' }} ">
    <a href="#"><i class="fa fa-bars"></i> <span>Blog</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
      <li {{ request()->is('admin/posts') ? "class=active" : '' }}><a href="{{ route('admin.posts.index') }}" class="fa fa-eye">See All Posts</a></li>
      <li {{ request()->is('admin/posts/create') ? "class=active" : '' }}><a href="{{ route('admin.posts.create') }}" class="fa fa-pencil">Create Post</a></li>
    </ul>
  </li>