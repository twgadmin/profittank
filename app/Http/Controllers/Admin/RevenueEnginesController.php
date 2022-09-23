<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Http\Controllers\Admin\Controller;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\RevenueEngine;

class RevenueEnginesController extends Controller
{
    private $adminRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->middleware('auth:admin');
        parent::__construct();

        $this->adminRepository = $adminRepository;
    }

    /**
     * Display a listing of the resource.
     *

     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = RevenueEngine::getAllRevenueEngine();
        return view('admin.revenue_engine.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = RevenueEngine::getAllRevenueEngine(['re_id' =>  $id])->first();  
         return view(
            'admin.revenue_engine.show',
            compact('data')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RevenueEngine::where('re_id', $id)->delete($id);
                $error   = 0;
                $data    = [];
                $message = "Administrator has been removed successfully.";

            return response()->json([
                'error'   => $error,
                'message' => $message,
                'data'    => $data
            ]);
    }
}
