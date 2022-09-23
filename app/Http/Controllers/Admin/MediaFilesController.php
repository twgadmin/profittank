<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\UpdateMediaFileRequest;
use App\Repositories\Interfaces\MediaFileRepositoryInterface;
use App\Http\Requests\Admin\StoreMediaFileRequest;

class MediaFilesController extends Controller
{
    private $mediaFileRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MediaFileRepositoryInterface $mediaFileRepository)
    {
        parent::__construct();
        $this->middleware('auth:admin');

        $this->mediaFileRepository     = $mediaFileRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = $this->mediaFileRepository->all();

        return view('admin.media_files.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.media_files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMediaFileRequest $request)
    {
        
        $data = $request->except([
            '_token',
            '_method',
            'file'
        ]);

        //move | upload file on server
        
        $file             = $request->file('file');
        $extension        = $file->getClientOriginalExtension(); // getting file extension
        $filename         = 'media-file-'.time() . '.' . $extension;
        $file->move(uploadsDir("media_files"), $filename);
        $data['filename'] = $filename;

        $this->mediaFileRepository->create($data);

        return redirect()
            ->route('admin.media-files.index')
            ->with('success', 'Media File has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->mediaFileRepository->find($id);
        
        return view(
            'admin.media_files.show',
            compact('data')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->mediaFileRepository->find($id);

        return view(
            'admin.media_files.edit',
            compact('data')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMediaFileRequest $request, $id)
    {
        //check file if exists    
        if ($request->hasfile('file')) {
            //move | upload file on server
            $file      = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename  ='media-file-'.time() . '.' . $extension;
            $file->move(uploadsDir("media_files"), $filename);

            //remove/unlink if New uploaded successfully
            if (file_exists(uploadsDir("media_files").$filename)
                && !empty($request->filename && file_exists(uploadsDir("media_files").$request->filename))) {
                unlink(uploadsDir("media_files").$request->filename);
            }
        }

        $data = $request->except([
            '_token',
            '_method',
            'previous_image',
            'file'
        ]);

        $data['filename'] = $filename;
        $this->mediaFileRepository->update($id, $data);

        return redirect()
            ->route('admin.media-files.index')
            ->with('success', 'Media File updated sucessfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MediaFile  $mediaFile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {           
        
            $records = $this->mediaFileRepository->find($id);

            if (!empty($records->filename) && file_exists(uploadsDir('media_files') . $records->filename)) {
                unlink(uploadsDir('media_files') . $records->filename);
            }
            $this->mediaFileRepository->delete($id);
            $error   = 0;
            $data    = [];
            $message = "Media File has been removed successfully.";

        return response()->json([
            'error'   => $error,
            'message' => $message,
            'data'    => $data
        ]);

    }
}
