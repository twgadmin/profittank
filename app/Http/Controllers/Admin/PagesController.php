<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\UpdatePageRequest;
use App\Repositories\Interfaces\PageRepositoryInterface;
use App\Http\Requests\Admin\StorePageRequest;
use App\Repositories\Interfaces\MediaFileRepositoryInterface;

class PagesController extends Controller
{
    private $pageRepository;
    private $mediaFileRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        PageRepositoryInterface $pageRepository,
        MediaFileRepositoryInterface $mediaFileRepository
    ) {
        parent::__construct();

        $this->middleware('auth:admin');

        $this->pageRepository       = $pageRepository;
        $this->mediaFileRepository  = $mediaFileRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $records = $this->pageRepository->all();
        $restrictedPages = $this->getRestrictedPagesIds();

        return view(
            'admin.pages.index',
            compact(
                'records',
                'restrictedPages'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mediaFile = $this->mediaFileRepository->all();

        return view('admin.pages.create', compact('mediaFile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageRequest $request)
    {
        $data = $request->except([
            '_token',
            '_method'
        ]);

        $this->pageRepository->create($data);

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Page has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = $this->pageRepository->getPage(['pages.id' => $id]);
        $dataArray =$data->toArray();
        $media_file_id = $dataArray['media_file_id'];
        $media_file_data = $this->mediaFileRepository->find($media_file_id);   
        return view(
            'admin.pages.show',
            compact('data','media_file_data')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mediaFile       = $this->mediaFileRepository->all();
        $data            = $this->pageRepository->find($id);
        $restrictedPages = $this->getRestrictedPagesIds();

        return view(
            'admin.pages.edit',
            compact(
                'data',
                'mediaFile',
                'restrictedPages'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $page
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageRequest $request, $id)
    {
        $data = $request->except([
            '_token',
            '_method',
            'page_id'
        ]);

        // Slug of seeder based pages, need not to update,
        // as they are created from seeder.
        if (in_array($id, $this->getRestrictedPagesIds())) {
            unset($data['slug']);
        }

        $this->pageRepository->update($id, $data);

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Page updated sucessfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->pageRepository->delete($id); 
            $error   = 0;
            $data    = [];
            $message = "Page has been removed successfully.";

        return response()->json([
            'error'   => $error,
            'message' => $message,
            'data'    => $data
        ]);
    }
}
