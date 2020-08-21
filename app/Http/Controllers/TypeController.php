<?php

namespace App\Http\Controllers;

use App\Http\Services\TypeService;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    protected $typeService;
    public function __construct(TypeService $typeService)
    {
        $this->typeService = $typeService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = $this->typeService->getDesc();
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.create');
    }


    public function store(Request $request)
    {

        $this->typeService->store($request);
        $data = [
            'status' => 'success',
            'message' => 'Create type name success!!!'
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = $this->typeService->show($id);
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->typeService->update($request, $id);
        return redirect()->route('types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->typeService->destroy($id);
//        $data = [
//            'status' => 'success',
//
//        ];
//        return response()->json(['message' => 'Delete type success']);
        return redirect()->route('types.index');
    }
    public function back()
    {
        return redirect()->route('types.index');
    }
}
