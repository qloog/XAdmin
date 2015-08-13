<?php namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}

    /**
     * 获取题目对应答案的数目
     * @param $t_id
     * @return array
     */
    function index()
	{
        $r = DB::table('user_data_record')->insert(array('t_id'=>2,'d_id'=>'test2'));
        print_r($r);
//        $result = array();
//        if (empty($t_id)) {
//            return $result;
//        }
//        $data = DB::table('user_data_record')
//            ->select(DB::raw('count(d_id) as num'), 'd_id')
//            ->where('t_id', '=', $t_id)
//            ->groupBy('d_id')
//            ->get();
//        $result = array();
//        foreach($data as $item){
//            $result[$item->d_id] = $item->num;
//        }
//        /**
//         * 举例： 东、西、南、北为某一个题目的答案，value为对应的数量
//         * Array ( [东] => 9 [北] => 10 [南] => 5 [西] => 1 )
//         */
//        return $result;
	}

}
