<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Overtrue\Wechat\Media;

use App\Repositories\Material\MaterialRepository as Material;
use App\Repositories\Criteria\Material\TitleEqTest;

class MaterialsController extends Controller
{

    private $material;
    private $_media = null;

    public function __construct(Material $material)
    {
        $this->_media = new Media(Config::get('wechat.app_id'), Config::get('wechat.secret'));
        $this->material = $material;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$this->material->pushCriteria(new TitleEqTest());
        $material = $this->material->all();
        return view('backend.materials.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.materials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $data = Input::all();
        dd($data);exit;
        $ret = $this->material->store($data);
        dd($ret);exit;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
