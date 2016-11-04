
<!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Homepage - Semantic</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('semantic/dist/semantic.min.css') }}">
    <style type="text/css">
        .hidden.menu {
            display: none;
        }

        .masthead.segment {
            min-height: 700px;
            padding: 1em 0em;
        }
        .masthead .logo.item img {
            margin-right: 1em;
        }
        .masthead .ui.menu .ui.button {
            margin-left: 0.5em;
        }
        .masthead h1.ui.header {
            margin-top: 3em;
            margin-bottom: 0em;
            font-size: 4em;
            font-weight: normal;
        }
        .masthead h2 {
            font-size: 1.7em;
            font-weight: normal;
        }

        .ui.vertical.stripe {
            padding: 8em 0em;
        }
        .ui.vertical.stripe h3 {
            font-size: 2em;
        }
        .ui.vertical.stripe .button + h3,
        .ui.vertical.stripe p + h3 {
            margin-top: 3em;
        }
        .ui.vertical.stripe .floated.image {
            clear: both;
        }
        .ui.vertical.stripe p {
            font-size: 1.33em;
        }
        .ui.vertical.stripe .horizontal.divider {
            margin: 3em 0em;
        }

        .quote.stripe.segment {
            padding: 0em;
        }
        .quote.stripe.segment .grid .column {
            padding-top: 5em;
            padding-bottom: 5em;
        }

        .footer.segment {
            padding: 5em 0em;
        }

        .secondary.pointing.menu .toc.item {
            display: none;
        }

        @media only screen and (max-width: 700px) {
            .ui.fixed.menu {
                display: none !important;
            }
            .secondary.pointing.menu .item,
            .secondary.pointing.menu .menu {
                display: none;
            }
            .secondary.pointing.menu .toc.item {
                display: block;
            }
            .masthead.segment {
                min-height: 350px;
            }
            .masthead h1.ui.header {
                font-size: 2em;
                margin-top: 1.5em;
            }
            .masthead h2 {
                margin-top: 0.5em;
                font-size: 1.5em;
            }
        }


    </style>
    <script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('semantic/dist/semantic.min.js') }}"></script>
    <script src="{{ asset('semantic/dist/components/visibility.js') }}"></script>
    <script src="{{ asset('semantic/dist/components/sidebar.js') }}"></script>
    <script src="{{ asset('semantic/dist/components/transition.js') }}"></script>
    <script>
        $(document).ready(function() {
            // fix menu when passed
            $('.masthead').visibility({
                once: false,
                onBottomPassed: function() {
                    $('.fixed.menu').transition('fade in');
                },
                onBottomPassedReverse: function() {
                    $('.fixed.menu').transition('fade out');
                }
            });
            // create sidebar and attach to menu open
            $('.ui.sidebar').sidebar('attach events', '.toc.item');
        });
    </script>
</head>
<body>
<!-- Following Menu -->
<div class="ui large top fixed hidden menu">
    <div class="ui container">
        <a class="active item">Home</a>
        <a class="item">Work</a>
        <a class="item">Company</a>
        <a class="item">Careers</a>
        <div class="right menu">
            <div class="item">
                <a class="ui button">Log in</a>
            </div>
            <div class="item">
                <a class="ui primary button">Sign Up</a>
            </div>
        </div>
    </div>
</div>
<!-- Sidebar Menu -->
<div class="ui vertical inverted sidebar menu">
    <a class="active item">Home</a>
    <a class="item">Work</a>
    <a class="item">Company</a>
    <a class="item">Careers</a>
    <a class="item">Login</a>
    <a class="item">Signup</a>
</div>

<div class="pusher">
    <div class="ui inverted vertical masthead center aligned segment">
        <div class="ui container">
            <div class="ui large secondary inverted pointing menu">
                <a class="toc item">
                    <i class="sidebar icon"></i>
                </a>
                <div class="header item">Our Company </div>
                <a class="item">
                    <div class="ui icon search input">
                        <input class="prompt" type="text" placeholder="Common passwords...">
                        <i class="search icon"></i>
                    </div>
                </a>
                <a class="item">
                    <i class="home icon"></i> Home
                </a>
                <a class="item">
                    <i class="grid layout icon"></i> Browse
                </a>
                <a class="item">
                    <i class="mail icon"></i> Messages
                </a>
                <div class="ui right simple dropdown item">
                    @if (Auth::guest())
                        <a class="ui button">登录</a>
                        <a class="ui primary button">注册</a>
                    @else
                        <i class="user icon"></i>{{ Auth::user()->username }}
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <a class="item"><i class="edit icon"></i> Edit Profile</a>
                            <a class="item"><i class="globe icon"></i> Choose Language</a>
                            <a class="item"><i class="settings icon"></i> Account Settings</a>
                            <a class="item" href="{{ url('/logout') }}"><i class="settings icon"></i>退出登录</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="ui text container">
            <h1 class="ui inverted header">
                Imagine-a-Company
            </h1>
            <h2>Do whatever you want when you want to.</h2>
            <div class="ui huge primary button">Get Started <i class="right arrow icon"></i></div>
        </div>
    </div>

    <div class="ui center aligned header basic raised segment">
        <h1 class="ui center aligned">Examples of UI that inherit border styles</h1>
    </div>

    <div class="ui container">
        <div class="ui three stackable cards">

            @for($i=0; $i<8; $i++)
                <div class="ui raised link card">
                    <a class="image" href="#link">
                        <img src="http://semantic-ui.com/images/avatar/large/steve.jpg" style="width: 300px; height: 200px;"/>
                    </a>
                    <div class="content">
                        <a class="header" href="#link">Steve Jobes</a>
                        <div class="meta">
                            <a class="time">Last Seen 2 days ago</a>
                            <span class="right floated">3 videos</span>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>

    <div class="ui center aligned header basic segment">
        <h1 class="ui aligned">Examples of UI that inherit border styles</h1>
    </div>

    <div class="ui center aligned basic segment">
        <h4>Examples of UI that inherit border styles</h4>
    </div>

    <div class="ui center aligned basic segment">
        <h3>Examples of UI that inherit border styles</h3>
    </div>

    <div class="ui container">
        <div class="ui four column stackable grid">
            <div class="column">
                <div class="ui link card">
                    <div class="content">
                        <div class="center aligned header">
                            <i class="huge orange terminal icon"></i>
                            <p>后端</p>
                        </div>
                        <div class="description">
                            <p>在设计与开发网站的时候，您需要用到一系列的工具，比如编辑器，版本控制，自动化执行任务等等。</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="ui link card">
                    <div class="content">
                        <div class="center aligned header">
                            <i class="huge green server icon"></i>
                            <p>服务</p>
                        </div>
                        <div class="description">
                            <p>在设计与开发网站的时候，您需要用到一系列的工具，比如编辑器，版本控制，自动化执行任务等等。</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="ui link card">
                    <div class="content">
                        <div class="center aligned header">
                            <i class="huge code icon"></i>
                            <p>前端</p>
                        </div>
                        <div class="description">
                            <p>在设计与开发网站的时候，您需要用到一系列的工具，比如编辑器，版本控制，自动化执行任务等等。</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="ui link card">
                    <div class="content">
                        <div class="center aligned header">
                            <i class="huge brown setting icon"></i>
                            <p>工具</p>
                        </div>
                        <div class="description">
                            <p>在设计与开发网站的时候，您需要用到一系列的工具，比如编辑器，版本控制，自动化执行任务等等。</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ui divider"></div>

    <div class="ui inverted vertical footer segment">
        <div class="ui container">
            <div class="ui stackable inverted equal height stackable grid">
                <div class="three wide column">
                    <h4 class="ui inverted header">About</h4>
                    <div class="ui inverted link list">
                        <a href="#" class="item">Sitemap</a>
                        <a href="#" class="item">Contact Us</a>
                        <a href="#" class="item">Religious Ceremonies</a>
                        <a href="#" class="item">Gazebo Plans</a>
                    </div>
                </div>
                <div class="three wide column">
                    <h4 class="ui inverted header">Services</h4>
                    <div class="ui inverted link list">
                        <a href="#" class="item">Banana Pre-Order</a>
                        <a href="#" class="item">DNA FAQ</a>
                        <a href="#" class="item">How To Access</a>
                        <a href="#" class="item">Favorite X-Men</a>
                    </div>
                </div>
                <div class="seven wide column">
                    <h4 class="ui inverted header">Footer Header</h4>
                    <p>Extra space for a call to action inside the footer that could help re-engage users.</p>
                </div>
            </div>
        </div>
        <div class="ui divider"></div>

    </div>
</div>
</body>

</html>
