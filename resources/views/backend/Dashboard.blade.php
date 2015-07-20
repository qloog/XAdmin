@extends('backend.layouts.master')

@section('title', '管理首页 - 后台')

@section('css')
<link href="{{ asset('/css/dashboard.css') }}" rel="stylesheet">
@stop

@section('breadcrumb')

    <h2>基本表单</h2>
    <ol class="breadcrumb">
        <li>
            <a href="index.html">主页</a>
        </li>
        <li>
            <a>表单</a>
        </li>
        <li>
            <strong>基本表单</strong>
        </li>
    </ol>
@endsection

@section('content')
    <div class="row  border-bottom white-bg dashboard-header">
        <div class="col-sm-3">
            <h2>Hello,Beaut-zihan</h2>
            <small>您有32条消息和6个待处理事项</small>
            <ul class="list-group clear-list m-t">
                <li class="list-group-item fist-item">
                    <span class="pull-right">
                            09:00
                        </span>
                    <span class="label label-success">1</span> 请联系我
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                            10:16
                        </span>
                    <span class="label label-info">2</span> 签订合同
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                            08:22
                        </span>
                    <span class="label label-primary">3</span> 新分店开张
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                            11:06
                        </span>
                    <span class="label label-default">4</span> 打电话给璟雯
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                            12:00
                        </span>
                    <span class="label label-primary">5</span> 发邮件给国民岳父
                </li>
            </ul>
        </div>
        <div class="col-sm-6">
            <div class="flot-chart dashboard-chart">
                <div class="flot-chart-content" id="flot-dashboard-chart"></div>
            </div>
            <div class="row text-left">
                <div class="col-xs-4">
                    <div class=" m-l-md">
                        <span class="h4 font-bold m-t block">&yen; 406,100</span>
                        <small class="text-muted m-b block">销售营销报告</small>
                    </div>
                </div>
                <div class="col-xs-4">
                    <span class="h4 font-bold m-t block">&yen; 150,401</span>
                    <small class="text-muted m-b block">年销售收入</small>
                </div>
                <div class="col-xs-4">
                    <span class="h4 font-bold m-t block">&yen; 16,822</span>
                    <small class="text-muted m-b block">半年收入利润率</small>
                </div>

            </div>
        </div>
        <div class="col-sm-3">
            <div class="statistic-box">
                <h4>
                    项目的进度
                </h4>
                <p>
                    您还有两项未完成的任务
                </p>
                <div class="row text-center">
                    <div class="col-lg-6">
                        <div class="chart easypiechart inline" data-percent="73"><span class="easypie-text">61%</span>
                        </div>
                        <h5>OA测</h5>
                    </div>
                    <div class="col-lg-6">
                        <div class="chart2 easypiechart inline" data-percent="33"><span class="easypie-text">31%</span>
                        </div>
                        <h5>CRM</h5>
                    </div>
                </div>
                <div class="m-t">
                    <small>请尽快完成相关项目的开发、测试工作</small>
                </div>

            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>数据报告</h5>  <span class="label label-primary">K+</span>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="index.html#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="index.html#">选项1</a>
                                        </li>
                                        <li><a href="index.html#">选项2</a>
                                        </li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div>

                                    <div class="pull-right text-right">

                                        <span class="bar_dashboard">5,3,9,6,5,9,7,3,5,2,4,7,3,2,7,9,6,4,5,7,3,2,1,0,9,5,6,8,3,2,1</span>
                                        <br/>
                                        <small class="font-bold">&yen; 20 054.43</small>
                                    </div>
                                    <h4>广东省销售数据
                                    <br/>
                                    <small class="m-r"><a href="graph_flot.html"> 查看所有数据</a> </small>
                                </h4>
                                </div>
                            </div>
                        </div>
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>最新动态</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="index.html#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="index.html#">选项1</a>
                                        </li>
                                        <li><a href="index.html#">选项2</a>
                                        </li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content no-padding">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <p><a class="text-info" href="index.html#">#感谢有你#</a> 感谢你们一路的相伴，未来也请让我为你们撑腰，我们会更好</p>
                                        <small class="block text-muted"><i class="fa fa-clock-o"></i> 1分钟前</small>
                                    </li>
                                    <li class="list-group-item">
                                        <p><a class="text-info" href="index.html#">@颜文字君</a> 女生身高×1.09后，就是最适合你的男生身高；相反，男生是÷1.09就可以了..小伙伴们可以试着算下..【图是我的..(*/ω＼*)</p>
                                        <div class="text-center m">
                                            <span id="sparkline8"></span>
                                        </div>
                                        <small class="block text-muted"><i class="fa fa-clock-o"></i> 2小时前</small>
                                    </li>

                                    <li class="list-group-item">
                                        <p><a class="text-info" href="index.html#">#发型师#</a> 刚才剪发，顾客在看这个视频，妈蛋，这舞姿太销魂了，笑得手颤抖。。。</p>
                                        <small class="block text-muted"><i class="fa fa-clock-o"></i> 1分钟前</small>
                                    </li>
                                    <li class="list-group-item">
                                        <p><a class="text-info" href="index.html#">#一年级#</a> ——#陈氏父子# cut：“他是我的陈爸爸”[心]“我叫陈思成，陈老师的陈” [心]“不再见就是，你也好，爸爸也好，妈妈也好，都永远不要说再见</p>
                                        <small class="block text-muted"><i class="fa fa-clock-o"></i> 2分钟前</small>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>最新消息</h5>
                                <div class="ibox-tools">
                                    <span class="label label-warning-light">10条未读</span>
                                </div>
                            </div>
                            <div class="ibox-content">

                                <div>
                                    <div class="feed-activity-list">

                                        <div class="feed-element">
                                            <a href="profile.html" class="pull-left">
                                                <img alt="image" class="img-circle" src="img/profile.jpg">
                                            </a>
                                            <div class="media-body ">
                                                <small class="pull-right">5分钟前</small>
                                                <strong>谨斯里</strong> 上传了一个文件
                                                <br>
                                                <small class="text-muted">2014.11.8 12:22</small>

                                            </div>
                                        </div>

                                        <div class="feed-element">
                                            <a href="profile.html" class="pull-left">
                                                <img alt="image" class="img-circle" src="img/a2.jpg">
                                            </a>
                                            <div class="media-body ">
                                                <small class="pull-right">2个月前</small>
                                                <strong>田亮</strong> 参加了<strong>《粑粑去哪儿》</strong>
                                                <br>
                                                <small class="text-muted">2014.11.8 12:22</small>
                                            </div>
                                        </div>
                                        <div class="feed-element">
                                            <a href="profile.html" class="pull-left">
                                                <img alt="image" class="img-circle" src="img/a3.jpg">
                                            </a>
                                            <div class="media-body ">
                                                <small class="pull-right">2小时前</small>
                                                <strong>林依晨Ariel</strong> 刚刚起床
                                                <br>
                                                <small class="text-muted">2014.11.8 12:22</small>
                                            </div>
                                        </div>
                                        <div class="feed-element">
                                            <a href="profile.html" class="pull-left">
                                                <img alt="image" class="img-circle" src="img/a5.jpg">
                                            </a>
                                            <div class="media-body ">
                                                <small class="pull-right">32分钟前</small>
                                                <strong>颜文字君</strong> 评论了
                                                <br>
                                                <small class="text-muted">2014.11.8 12:22</small>
                                                <div class="well">
                                                    【九部令人拍案叫绝的惊悚悬疑剧情佳作】如果你喜欢《迷雾》《致命ID》《电锯惊魂》《孤儿》《恐怖游轮》这些好片，那么接下来推荐的9部同类题材并同样出色的的电影，绝对不可错过哦~
                                                </div>
                                                <div class="pull-right">
                                                    <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> 喜欢 </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary btn-block m-t"><i class="fa fa-arrow-down"></i> 加载更多</button>

                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>项目进度</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="index.html#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="index.html#">选项1</a>
                                        </li>
                                        <li><a href="index.html#">选项2</a>
                                        </li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content ibox-heading">
                                <h3>还有约79842492229个Bug需要修复</h3>
                                <small><i class="fa fa-map-marker"></i> 地点当然是在办公室</small>
                            </div>
                            <div class="ibox-content timeline">

                                <div class="timeline-item">
                                    <div class="row">
                                        <div class="col-xs-3 date">
                                            <i class="fa fa-briefcase"></i>
                                            6:00
                                            <br/>
                                            <small class="text-navy">2 小时前</small>
                                        </div>
                                        <div class="col-xs-7 content no-top-border">
                                            <p class="m-b-xs"><strong>服务器已彻底崩溃</strong>
                                            </p>

                                            <p>还未检查出错误</p>

                                            <p><span data-diameter="40" class="updating-chart">5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,4,7,3,2,9,8,7,4,5,1,2,9,5,4,7,2,7,7,3,5,2</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="row">
                                        <div class="col-xs-3 date">
                                            <i class="fa fa-file-text"></i>
                                            7:00
                                            <br/>
                                            <small class="text-navy">3小时前</small>
                                        </div>
                                        <div class="col-xs-7 content">
                                            <p class="m-b-xs"><strong>修复了0.5个bug</strong>
                                            </p>
                                            <p>重启服务</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="row">
                                        <div class="col-xs-3 date">
                                            <i class="fa fa-coffee"></i>
                                            8:00
                                            <br/>
                                        </div>
                                        <div class="col-xs-7 content">
                                            <p class="m-b-xs"><strong>喝水、上厕所、做测试</strong>
                                            </p>
                                            <p>
                                                喝了4杯水，上了3次厕所，控制台输出出2324个错误，神啊，带我走吧
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="row">
                                        <div class="col-xs-3 date">
                                            <i class="fa fa-phone"></i>
                                            11:00
                                            <br/>
                                            <small class="text-navy">21小时前</small>
                                        </div>
                                        <div class="col-xs-7 content">
                                            <p class="m-b-xs"><strong>项目经理打电话来了</strong>
                                            </p>
                                            <p>
                                                TMD，项目经理居然还没有起床！！！
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="row">
                                        <div class="col-xs-3 date">
                                            <i class="fa fa-user-md"></i>
                                            09:00
                                            <br/>
                                            <small>21小时前</small>
                                        </div>
                                        <div class="col-xs-7 content">
                                            <p class="m-b-xs"><strong>开会</strong>
                                            </p>
                                            <p>
                                                开你妹的会，老子还有897894个bug没有修复
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="row">
                                        <div class="col-xs-3 date">
                                            <i class="fa fa-comments"></i>
                                            12:50
                                            <br/>
                                            <small class="text-navy">讨论</small>
                                        </div>
                                        <div class="col-xs-7 content">
                                            <p class="m-b-xs"><strong>…………</strong>
                                            </p>
                                            <p>
                                                又是操蛋的一天
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="footer">
                <div class="pull-right">
                    By：<a href="http://www.zi-han.net" target="_blank">zihan's blog</a>
                </div>
                <div>
                    <strong>Copyright</strong> H+ &copy; 2014
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('/js/holder.js') }}"></script>
@endsection
