<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\StoreMessagesRequest;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\User;

class MessagesController extends Controller
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

    public function index()
    {
        $records = Message::getAllMessages();
         foreach ($records as $key => $message){
                if ($message->media != '' || $message->media != null && file_exists(uploadsDir('messages') . $message->media)){
                    $filesize = fileSize((uploadsDir('messages').$message->media));
                    $filesize = round($filesize /1000000, 2) ;
                    $records[$key]['media_size'] =  $filesize;

                }
            }
        return view('admin.messages.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $users = User::getAllUsers();
        return view('admin.messages.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessagesRequest $request)
    {
       
            $data = $request->except([
            '_token',
            '_method',
            'file'
            ]);

            if ($request->hasfile('file')) {
                //move | upload file on server
                $file      = $request->file('file');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename  ='media-file-'.time() . '.' . $extension;
                $file->move(uploadsDir("messages"), $filename);

                //remove/unlink if New uploaded successfully
            
                $data['media']             = $filename; 
            }

               $data['message_type'] = 1;
            Message::create($data); 

        return redirect()
            ->route('admin.messages.index')
            ->with('success', 'Message updated sucessfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
                
        $messages    = Message::getAllMessages(['messages.id' => $id])->first();
        $messagedata = Message::getAllMessages(
            ['messages.to_id' => $messages->to_id, 'messages.from_id' => $messages->from_id],
            ['messages.to_id' => $messages->from_id, 'messages.from_id' => $messages->to_id]);

            foreach ($messagedata as $key => $message){
                if ($message->media != '' || $message->media != null && file_exists(uploadsDir('messages') . $message->media)){
                    $filesize = fileSize((uploadsDir('messages').$message->media));
                    $filesize = round($filesize /1000000, 2) ;
                    $messagedata[$key]['media_size'] =  $filesize;

                }
            }
                       
        return view('admin.messages.show', compact('messagedata','messages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data    = Message::getAllMessages(['messages.id' => $id])->first();
        $users = User::getAllUsers();
                if ($data->media != '' || $data->media != null && file_exists(uploadsDir('messages') . $data->media)){
                    $filesize = fileSize((uploadsDir('messages').$data->media));
                    $filesize = round($filesize /1000000, 2) ;
                    $data['media_size'] =  $filesize;
            }
        return view('admin.messages.edit', compact('data','users'));
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
            'file'
            ]);

            if ($request->hasfile('file')) {
                //move | upload file on server
                $file      = $request->file('file');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename  ='media-file-'.time() . '.' . $extension;
                $file->move(uploadsDir("messages"), $filename);

                //remove/unlink if New uploaded successfully
             if ($request->hasfile('media')) {
                $file      = $request->file('media');
                if (file_exists(uploadsDir("messages").$media)
                    && !empty($request->filename && file_exists(uploadsDir("messages").$request->media))) {
                    unlink(uploadsDir("messages").$request->media);
                }}
            } else {
                $filename = $request->media;
            }
            $data['media']             = $filename; 

            Message::where(['id'=>$id])->update($data);  
            $error                     = 0;
            $message                   = "message has been updated successfully.";
        

        return redirect()
            ->route('admin.messages.index')
            ->with('success', 'Message updated sucessfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $records = Message::find($id);
        if (!empty($records->media) && file_exists(uploadsDir('messages') . $records->media)) {
            unlink(uploadsDir('messages') . $records->media);
        }

        Message::where('id', $id)->delete($id);
                $error   = 0;
                $data    = [];
                $message = "Messages has been removed successfully.";
        return response()->json([
            'error'   => $error,
            'message' => $message,
            'data'    => $data
        ]);
    }
}
