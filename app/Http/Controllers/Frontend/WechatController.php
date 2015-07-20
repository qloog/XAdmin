<?php namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Monolog\Logger;
use Overtrue\Wechat\MenuItem;
use Overtrue\Wechat\Server;
use Overtrue\Wechat\User;
use Overtrue\Wechat\Menu;
use Overtrue\Wechat\Message;
use Overtrue\Wechat\Url;
use Overtrue\Wechat\Media;
use Log;

class WechatController extends Controller {

    /**
     * 处理微信的请求消息
     *
     * @param Overtrue\Wechat\Server $server
     *
     * @return string
     */
    public function serve(Server $server)
    {
        $server->on('message', 'image', function($message){
                Log::info('message: ' . var_export($message, true));
                return Message::make('text')->content('您好！');
            });

        $server->on('event', 'subscribe', function($event){
                return Message::make('image')->content('您好！欢迎关注 overtrue');
            });

        return $server->serve(); // 或者 return $server;
    }

    public function upload()
    {
        $media   = new Media('wx8e883164d9342b1f', 'e73145bd0fdef28ea54b0b3608061c33');
        $imageId = $media->image('/Users/qloog/Downloads/demo_wx.png'); // 上传并返回媒体ID

        $message = Message::make('image')->media($imageId);
        Log::info('message: ' . var_export($message, true));
    }

    public function message()
    {
        $server = new Server('wx8e883164d9342b1f', 'e73145bd0fdef28ea54b0b3608061c33');

        $server->on('event', 'subscribe', function($event){
                return  Message::make('text')->content('您好！欢迎关注 overtrue');
            });
    }

    public function news()
    {
        $news = Message::make('news')->items(function(){
                return array(
                    Message::make('news_item')->title('测试标题'),
                    Message::make('news_item')->title('测试标题2')->description('好不好？'),
                    Message::make('news_item')->title('测试标题3')->description('好不好说句话？')->url('http://baidu.com'),
                    Message::make('news_item')->title('测试标题4')->url('http://baidu.com/abc.php')->picUrl('http://mmbiz.qpic.cn/mmbiz/EWBwscfHhF9mWxDBqJSTfS3ByNEicPrQzicHS5RicGsPOSkuqib2SOxuPFEGr3wnvztCae58ps21TnQVKEJb2YBEaA/640?wx_fmt=jpeg&tp=webp&wxfrom=5'),
                );
            });
        var_dump($news);
    }

    public function url()
    {
        $url = new Url('wx8e883164d9342b1f', 'e73145bd0fdef28ea54b0b3608061c33');
        $shortUrl = $url->short('http://overtrue.me/open-source');
        var_dump($shortUrl);
    }

    public function user()
    {
//        $appid = Config::get('webchat.appid');
        $userService = new User('wx8e883164d9342b1f', 'e73145bd0fdef28ea54b0b3608061c33');
        $result = $userService->lists();
        var_dump($result);
    }
    

    public function menu()
    {
        $menu = new Menu('wx8e883164d9342b1f', 'e73145bd0fdef28ea54b0b3608061c33');
        $m = $menu->get();
        var_dump($m);exit;
        $button = new MenuItem("菜单");

        $menus = array(
            new MenuItem("今日歌曲", 'click', 'V1001_TODAY_MUSIC'),
            $button->buttons(array(
                    new MenuItem('搜索', 'view', 'http://www.soso.com/'),
                    new MenuItem('视频', 'view', 'http://v.qq.com/'),
                    new MenuItem('赞一下我们', 'click', 'V1001_GOOD'),
                )),
        );

        try {
            $menu->set($menus);// 请求微信服务器
            echo '设置成功！';
        } catch (\Exception $e) {
            echo '设置失败：' . $e->getMessage();
        }
    }

    public function index()
    {
        echo 'test ok';
    }
}
