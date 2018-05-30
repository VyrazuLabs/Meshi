<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ url('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{Auth::User()->name}}</p>
        <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">

      <li><a href="{{ route('admin_dashboard') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
      <li><a href="{{route('edit_admin')}}"><i class="fa fa-edit"></i><span>Edit Profile</span></a></li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-user-plus"></i>
          <span>User Registration</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('create_user') }}"><i class="fa fa-users"></i><span>Create Eater/Creator</span></a></li>
          <li><a href="{{ route('create_admin') }}"><i class="fa fa-user-plus"></i><span>Create Admin</span></a></li>
          <li><a href="{{ route('list_user')}}"><i class="fa fa-list"></i><span>User List</span></a></li>
          <li><a href="{{ route('list_admin')}}"><i class="fa fa-list"></i><span>Admin List</span></a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-hand-o-right"></i>
          <span>Category</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('create_category') }}"><i class="fa fa-plus-square-o"></i><span>Create Category</span></a></li>
          <li><a href="{{ route('list_category')}}"><i class="fa fa-list"></i><span>Category List</span></a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-cutlery"></i>
          <span>Food Item</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('create_food_item') }}"><i class="fa fa-plus-square-o"></i><span>Create Food Item</span></a></li>
          <li><a href="{{ route('list_food_item')}}"><i class="fa fa-list"></i><span>Food Item List</span></a></li>
        </ul>
      </li>
     <!--  <li class="treeview">
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Review</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('create_review') }}"><i class="fa fa-plus-square-o"></i><span>Give Review</span></a></li>
          <li><a href="{{ route('list_review')}}"><i class="fa fa-list"></i><span>Review List</span></a></li>
        </ul>
      </li> -->
      <li class="treeview">
        <a href="#">
          <i class="fa fa-comment-o"></i>
          <span>Feedback</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('list_feedback')}}"><i class="fa fa-list"></i><span>Feedback List</span></a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-bullhorn"></i>
          <span>News</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('add_news')}}"><i class="fa fa-plus-square-o"></i><span>Create News</span></a></li>
          <li><a href="{{ route('list_news')}}"><i class="fa fa-list"></i><span>News List</span></a></li>
        </ul>
      </li>
      <li><a href="{{ route('list_order')}}"><i class="fa fa-list"></i><span>Order List</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
