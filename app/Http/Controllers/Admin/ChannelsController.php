<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Channel;
use App\Models\User;
use App\Http\Requests\Admin\StoreChannelRequest;
use App\Http\Requests\Admin\UpdateChannelRequest;

class ChannelsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $channels = Channel::getAllChannelsWithUsers();
        
        return view('admin.channels.index', compact('channels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::getAllUsers(['users.user_type' => 2]);

        return view('admin.channels.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChannelRequest $request)
    {
        $data = $request->except([
            '_token',
            '_method',
            '_wysihtml5_mode'
        ]);

        if ($request->hasfile('video_cover')) {
        @mkdir(uploadsDir('channels'), 0755, true);

        //move | upload file on server
        $file = $request->file('video_cover');
        $extension     = $file->getClientOriginalExtension(); // getting file extension
        $filename      = 'channel_cover-'.time() . '.' . $extension;
        $file->move(uploadsDir('channels'), $filename);
        $data['video_cover'] = $filename;
        }

        Channel::create($data);

        return redirect()
            ->route('admin.channels.index')
            ->with('success', 'Channel has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $channel = Channel::getAllChannelsWithUsers(['channels.id' => $id])->first();
        
        return view('admin.channels.show', compact('channel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data  = Channel::where('id', $id)->first();
        $users = User::getUsers(['users.user_type' => 2]);

        return view('admin.channels.edit', compact('data', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChannelRequest $request, $id)
    {
        $data = $request->except([
            '_token',
            '_method',
            '_wysihtml5_mode',
            'previous_image'
        ]);

        if ($request->hasFile('video_cover')) {
            if (!empty($request->previous_image)) {
                if (!empty($request->previous_image) && file_exists(uploadsDir('channels') . $request->previous_image)) {
                    unlink(uploadsDir('channels') . $request->previous_image);
                }
            }

            @mkdir(uploadsDir('channels'), 0755, true);

            // move | upload file on server
            $photo         = $request->file('video_cover');
            $extension     = $photo->getClientOriginalExtension();
            // getting File Extension
            $filename      = 'channel_cover-' .time(). '.' . $extension;
            $photo->move(uploadsDir('channels'), $filename);
            $data['video_cover'] = $filename;
        }


        Channel::where('id', $id)->update($data);

        return redirect()
            ->route('admin.channels.index')
            ->with('success', 'Channel has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Channel::where('id', $id)->delete();

        $error   = 0;
        $data    = [];
        $message = "Channel has been removed successfully.";

        return response()->json([
            'error'   => $error,
            'message' => $message,
            'data'    => $data
        ]);
    }
}
