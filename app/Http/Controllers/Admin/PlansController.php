<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Models\Plan;
use App\Http\Requests\Admin\StorePlanRequest;
use Illuminate\Http\Request;

class PlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        parent::__construct();
    }

    public function index()
    {
        $records = Plan::get();
       
       return view('admin.plans.index', compact('records'));
                
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlanRequest $request)
    {
        $data = $request->except([
        '_token',
        '_method',
        ]);

        if($request->is_active && $request->is_active == 'on'){
            $data["is_active"] = 1;
        }else{
             $data["is_active"] = 0;
        }
        
        Plan::create($data); 
        return redirect()
            ->route('admin.plans.index')
            ->with('success', 'Plan updated sucessfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Plan::find($id);
        return view('admin.plans.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data = Plan::find($id);
         return view('admin.plans.edit', compact('data'));
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
        $data = $request->except([
        '_token',
        '_method',
        ]);
        if($request->is_active && $request->is_active == 'on'){
            $data["is_active"] = 1;
        }else{
             $data["is_active"] = 0;
        }
                
        Plan::where(['id'=>$id])->update($data); 
        return redirect()
            ->route('admin.plans.index')
            ->with('success', 'Plan updated sucessfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Plan::where('id', $id)->delete();

        $error   = 0;
        $data    = [];
        $message = "Plan has been removed successfully.";

        return response()->json([
            'error'   => $error,
            'message' => $message,
            'data'    => $data
        ]);
    }
}
