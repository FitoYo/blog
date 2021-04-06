

<ul class="sidebar-menu" data-widget="tree">
  <li class="header">Navegacion</li>
  <!-- Optionally, you can add icons to the links -->
  <li class="active"><a href="#"><i class="fa fa-dashboard"></i> <span>Inicio</span></a></li>
  <li><a href="#"><i class="fa fa-beer"></i> <span>Another Link</span></a></li>
  <li class="treeview">
    <a href="#"><i class="fa fa-bars"></i> <span>Blog</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{ route('admin.posts.index') }}" class="fa fa-eye">See All Posts</a></li>
      <li><a href="#" class="fa fa-pencil">Create Post</a></li>
    </ul>
  </li>