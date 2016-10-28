<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->username }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">内容管理</li>
            <li @if(Request::is('admin/dashboard')) class="active" @endif>
                <a href="/admin/dashboard">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li @if(Request::is('admin/user*')) class="treeview active" @else class="treeview" @endif>
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>用户管理</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li @if(Request::is('admin/user')) class="active" @endif>
                        <a href="{{ url('admin/user') }}"><i class="fa fa-circle-o"></i> 用户列表</a>
                    </li>
                </ul>
            </li>
            <li @if(Request::is('admin/news*')) class="treeview active" @else class="treeview" @endif>
                <a href="#">
                    <i class="fa fa-newspaper-o"></i>
                    <span>新闻管理</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li @if(Request::is('admin/news')) class="active" @endif>
                        <a href="{{ url('admin/news') }}"><i class="fa fa-circle-o"></i> 新闻列表</a>
                    </li>
                    <li @if(Request::is('admin/news/category')) class="active" @endif>
                        <a href="{{ url('admin/news/category') }}"><i class="fa fa-circle-o"></i> 分类管理</a>
                    </li>
                    <li @if(Request::is('admin/news/create')) class="active" @endif>
                        <a href="{{ url('admin/news/create') }}"><i class="fa fa-circle-o"></i> 添加新闻</a>
                    </li>
                </ul>
            </li>
            <li @if(Request::is('admin/album*')) class="treeview active" @else class="treeview" @endif>
                <a href="#">
                    <i class="fa fa-photo"></i>
                    <span>相册管理</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li @if(Request::is('admin/album')) class="active" @endif>
                        <a href="/admin/album"><i class="fa fa-circle-o"></i> 相册列表</a>
                    </li>
                </ul>
            </li>
            <li @if(Request::is('admin/event*')) class="treeview active" @else class="treeview" @endif>
                <a href="#">
                    <i class="fa fa-calendar-check-o"></i>
                    <span>活动管理</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li @if(Request::is('admin/event')) class="active" @endif>
                        <a href="{{ url('admin/event') }}"><i class="fa fa-circle-o"></i> 活动列表</a>
                    </li>
                    <li @if(Request::is('admin/event/create')) class="active" @endif>
                        <a href="{{ url('admin/event/create') }}"><i class="fa fa-circle-o"></i> 添加活动</a>
                    </li>
                </ul>
            </li>
            <li @if(Request::is('admin/blog*')) class="treeview active" @else class="treeview" @endif>
                <a href="#">
                    <i class="fa fa-newspaper-o"></i>
                    <span>POST管理</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li @if(Request::is('admin/blog')) class="active" @endif>
                        <a href="{{ url('admin/blog') }}"><i class="fa fa-circle-o"></i>文章管理</a>
                    </li>
                    <li @if(Request::is('admin/blog/category')) class="active" @endif>
                        <a href="{{ url('admin/blog/category') }}"><i class="fa fa-circle-o"></i> 分类管理</a>
                    </li>
                    <li @if(Request::is('admin/blog/create')) class="active" @endif>
                        <a href="{{ url('admin/blog/create') }}"><i class="fa fa-circle-o"></i> 添加博文</a>
                    </li>
                </ul>
            </li>
            <li @if(Request::is('admin/forum*')) class="treeview active" @else class="treeview" @endif>
                <a href="#">
                    <i class="fa fa-commenting-o"></i>
                    <span>论坛管理</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li @if(Request::is('admin/forum')) class="active" @endif>
                        <a href="{{ url('admin/forum') }}"><i class="fa fa-circle-o"></i> 帖子列表</a>
                    </li>
                    <li @if(Request::is('admin/forum/category')) class="active" @endif>
                        <a href="{{ url('admin/forum/category') }}"><i class="fa fa-circle-o"></i> 帖子分类</a>
                    </li>
                </ul>
            </li>
            <li @if(Request::is('admin/comment*')) class="treeview active" @else class="treeview" @endif>
                <a href="#">
                    <i class="fa fa-comments-o"></i>
                    <span>评论管理</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li @if(Request::is('admin/comment')) class="active" @endif>
                        <a href="{{ url('admin/comment') }}"><i class="fa fa-circle-o"></i> 评论列表</a>
                    </li>
                </ul>
            </li>

            <li @if(Request::is('admin/course*')) class="treeview active" @else class="treeview" @endif>
                <a href="#">
                    <i class="fa fa-mortar-board"></i>
                    <span>课程管理</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li @if(Request::is('admin/course')) class="active" @endif>
                        <a href="{{ url('admin/course') }}"><i class="fa fa-circle-o"></i> 课程列表</a>
                    </li>
                </ul>
            </li>
            <li @if(Request::is('admin/order*')) class="treeview active" @else class="treeview" @endif>
                <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>订单管理</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li @if(Request::is('admin/order')) class="active" @endif>
                        <a href="{{ url('admin/order') }}"><i class="fa fa-circle-o"></i> 订单列表</a>
                    </li>
                </ul>
            </li>

            <li @if(Request::is('admin/upload')) class="active" @endif>
                <a href="/admin/upload">
                    <i class="fa fa-file-o"></i> <span>文件管理</span>
                </a>
            </li>

            <li class="header">系统设置</li>
            <li @if(Request::is('admin/auth/*')) class="treeview active" @else class="treeview" @endif>
                <a href="#">
                    <i class="fa fa-key"></i>
                    <span>权限管理</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li @if(Request::is('admin/auth/user*')) class="active" @endif>
                        <a href="{{ route('admin.auth.user.index') }}"><i class="fa fa-user"></i> 用户管理</a>
                    </li>
                    <li @if(Request::is('admin/auth/role*')) class="active" @endif>
                        <a href="{{ route('admin.auth.role.index') }}"><i class="fa fa-group"></i> 角色管理</a>
                    </li>
                    <li @if(Request::is('admin/auth/permission*')) class="active" @endif>
                        <a href="{{ route('admin.auth.permission.index') }}"><i class="fa fa-flash"></i> 权限管理</a>
                    </li>
                </ul>
            </li>

            <li class="header">帮助</li>
            <li>
                <a href="https://almsaeedstudio.com/themes/AdminLTE/index.html" target="_blank">
                    <i class="fa fa-book"></i> <span>模板Demo</span>
                </a>
            </li>
            <li>
                <a href="https://almsaeedstudio.com/themes/AdminLTE/documentation/index.html" target="_blank">
                    <i class="fa fa-book"></i> <span>模板使用文档</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>