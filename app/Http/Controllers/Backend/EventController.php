<?php

namespace App\Http\Controllers\Backend;

use App\Jobs\EventFormFields;
use App\Repositories\Backend\Event\EventRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Backend\EventCreateRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Backend\EventUpdateRequest;

class EventController extends BaseController
{
    public function __construct(EventRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $event = $this->repository->getAll(config('custom.per_page'));
        return view('backend.event.index', ['data' => $event]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data = $this->dispatch(new EventFormFields());

        return view('backend.event.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventCreateRequest $request
     * @return Response
     */
    public function store(EventCreateRequest $request)
    {
        if ($this->repository->create($request->eventFillData())) {
            return Redirect::to('admin/event');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
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
        $data = $this->dispatch(new EventFormFields($id));
        return view('backend.event.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EventUpdateRequest $request
     * @param  int               $id
     * @return Response
     */
    public function update(EventUpdateRequest $request, $id)
    {
        if ($this->repository->update($id, $request->eventFillData())) {
            return Redirect::to('admin/event');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $event = $this->repository->find($id);
        $event->delete();

        return redirect()
            ->route('admin.event.index')
            ->withSuccess('event deleted.');
    }
}
