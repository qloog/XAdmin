            <div id="sidebar" class="sidebar responsive" data-sidebar="true" data-sidebar-scroll="true" data-sidebar-hover="true">
                <script type="text/javascript">
                    try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
                </script>

                <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                        <button class="btn btn-success">
                            <i class="ace-icon fa fa-signal"></i>
                        </button>

                        <button class="btn btn-info">
                            <i class="ace-icon fa fa-pencil"></i>
                        </button>

                        <button class="btn btn-warning">
                            <i class="ace-icon fa fa-users"></i>
                        </button>

                        <button class="btn btn-danger">
                            <i class="ace-icon fa fa-cogs"></i>
                        </button>
                    </div>

                    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                        <span class="btn btn-success"></span>

                        <span class="btn btn-info"></span>

                        <span class="btn btn-warning"></span>

                        <span class="btn btn-danger"></span>
                    </div>
                </div><!-- /.sidebar-shortcuts -->

                <ul class="nav nav-list" style="top: 0px;">
                    <li @if(Request::is('admin/dashboard')) class="active" @endif>
                        <a href="/admin/dashboard">
                            <i class="menu-icon fa fa-tachometer"></i>
                            <span class="menu-text"> 仪表板 </span>
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li @if(Request::is('admin/user/*')) class="active open" @endif>
                        <a href="javascript:;" class="dropdown-toggle">
                            <i class="menu-icon fa fa-user"></i>
                            <span class="menu-text">
                                用户管理
                            </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li @if(Request::is('admin/user/index')) class="active" @endif>
                                <a href="/admin/user/index">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    用户列表
                                </a>
                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>

                    <li @if(Request::is('admin/news*')) class="active open" @endif>
                        <a href="javascript:;" class="dropdown-toggle">
                            <i class="menu-icon fa fa-newspaper-o"></i>
                            <span class="menu-text"> 新闻管理 </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li @if(Request::is('admin/news')) class="active" @endif>
                                <a href="{{ url('admin/news') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    新闻列表
                                </a>
                                <b class="arrow"></b>
                            </li>
                            <li @if(Request::is('admin/news/category')) class="active" @endif>
                                <a href="{{ url('admin/news/category') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    分类管理
                                </a>
                                <b class="arrow"></b>
                            </li>
                            <li @if(Request::is('admin/news/create')) class="active" @endif>
                                <a href="{{ url('admin/news/create') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    添加新闻
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="invoice.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    标签管理
                                </a>

                                <b class="arrow"></b>
                            </li>

                        </ul>
                    </li>

                    <li class="">
                        <a href="javascript:;" class="dropdown-toggle">
                            <i class="menu-icon fa fa-file-text-o"></i>
                            <span class="menu-text">
                                单页管理
                            </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li @if(Request::is('admin/page')) class="active" @endif>
                                <a href="{{ url('admin/page') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    内容管理
                                </a>
                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="javascript:;" class="dropdown-toggle">
                            <i class="menu-icon fa fa-photo"></i>
                            <span class="menu-text">
                                相册管理
                            </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li class="">
                                <a href="/admin/user/index">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    相册列表
                                </a>
                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="javascript:;" class="dropdown-toggle">
                            <i class="menu-icon fa fa-calendar"></i>
                            <span class="menu-text">
                                活动管理
                            </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li class="">
                                <a href="/admin/user/index">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    活动列表
                                </a>
                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="javascript:;" class="dropdown-toggle">
                            <i class="menu-icon fa fa-comment"></i>
                            <span class="menu-text">
                                评论管理
                            </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li class="">
                                <a href="/admin/user/index">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    评论列表
                                </a>
                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="javascript:;" class="dropdown-toggle">
                            <i class="menu-icon fa fa-desktop"></i>
                            <span class="menu-text">
                                素材管理
                            </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="">
                                <a href="/admin/materials/single">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    单图文
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="active">
                                <a href="/admin/materials/multi">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    多图文
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="/admin/materials/audio">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    语音素材
                                </a>

                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-list"></i>
                            <span class="menu-text"> 微信基础设置 </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="">
                                <a href="tables.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    首次关注
                                </a>
                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="jqgrid.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    自动回复
                                </a>
                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <a href="jqgrid.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    关键字回复
                                </a>
                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <a href="jqgrid.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    自定义菜单
                                </a>
                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-pencil-square-o"></i>
                            <span class="menu-text"> 微活动 </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="">
                                <a href="form-elements.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    优惠券
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="form-elements-2.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    刮刮卡
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="form-wizard.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    大转盘
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="wysiwyg.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    一站到底
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="dropzone.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    咋金蛋
                                </a>

                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="widgets.html">
                            <i class="menu-icon fa fa-list-alt"></i>
                            <span class="menu-text"> 粉丝管理 </span>
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li @if(Request::is('admin/upload')) class="active" @endif>
                        <a href="/admin/upload">
                            <i class="menu-icon fa fa-file"></i>
                            <span class="menu-text"> 文件管理 </span>
                        </a>

                        <b class="arrow"></b>
                    </li>
                </ul><!-- /.nav-list -->

                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>

                <script type="text/javascript">
                    try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
                </script>
            </div>