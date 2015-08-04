<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\Category;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       echo 'index...';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $cate = array(
            array('id'=>1, 'name'=>'PHP', 'pid'=>0),
            array('id'=>2, 'name'=>'JAVA', 'pid'=>0),
            array('id'=>3, 'name'=>'NodeJs', 'pid'=>0),
            array('id'=>4, 'name'=>'Laravel', 'pid'=>1),
            array('id'=>5, 'name'=>'YII', 'pid'=>1),
            array('id'=>6, 'name'=>'ExpressJs', 'pid'=>3),
            array('id'=>7, 'name'=>'Symfony2', 'pid'=>1),
            array('id'=>8, 'name'=>'JavaScript', 'pid'=>0),
            array('id'=>9, 'name'=>'Solr', 'pid'=>2),
            array('id'=>10, 'name'=>'Luence', 'pid'=>2),
        );
        $result = Category::unlimitedForLevel($cate);
        echo "<pre>";
        print_r($result);
        exit;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
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
