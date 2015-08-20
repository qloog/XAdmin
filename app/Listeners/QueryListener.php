<?php

namespace App\Listeners;

//use App\Events\;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use DateTime;

class QueryListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param $sql
     * @param $params
     * @internal param Events $event
     * @return void
     */
    public function handle($sql, $params)
    {
        if (env('APP_ENV', 'production') == 'local') {
            foreach ($params as $index => $param) {
                if ($param instanceof DateTime) {
                    $params[$index] = $param->format('Y-m-d H:i:s');
                }
            }
            $sql = str_replace("?", "'%s'", $sql);
            array_unshift($params, $sql);
            Log::info(call_user_func_array('sprintf', $params));
        }
    }
}
