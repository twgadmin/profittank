<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\User;
use App\Http\Requests\Admin\StoreNotificationRequest;
use App\Http\Requests\Admin\UpdateNotificationRequest;

class NotificationsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Notification::getNotifications();

        return view('admin.notifications.index', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::getAllUsers();

        return view('admin.notifications.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNotificationRequest $request)
    {
        $data = $request->except([
            '_token',
            '_method'
        ]);

        if ($request->is_read && $request->is_read == 'on') {
            $read = 1;
        } else {
            $read = 0;
        }

        $data['is_read'] = $read;

        Notification::create($data);

        return redirect()
            ->route('admin.notifications.index')
            ->with('success', 'Notification has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Notification::getNotifications(['notifications.id' => $id])->first();

        return view('admin.notifications.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data  = Notification::where('id', $id)->first();
        $users = User::getAllUsers();

        return view('admin.notifications.edit', compact('data', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNotificationRequest $request, $id)
    {
        $data = $request->except([
            '_token',
            '_method',
            'is_read',
        ]);

        if ($request->is_read && $request->is_read == 'on') {
            $read = 1;
        } else {
            $read = 0;
        }

        $data['is_read'] = $read;

        Notification::where('id', $id)->update($data);

        return redirect()
            ->route('admin.notifications.index')
            ->with('success', 'Notification has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Notification::where('id', $id)->delete();
        
        $error   = 0;
        $data    = [];
        $message = "Notification has been removed successfully.";

        return response()->json([
            'error'   => $error,
            'message' => $message,
            'data'    => $data
        ]);
        // return redirect()
        //     ->route('admin.notifications.index')
        //     ->with('success', 'Notification has been removed successfully.');
    }
}
