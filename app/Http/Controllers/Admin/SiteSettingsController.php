<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\UpdateSiteSettingRequest;
use App\Repositories\Interfaces\SiteSettingRepositoryInterface;

class SiteSettingsController extends Controller
{
    private $siteSettingRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        SiteSettingRepositoryInterface $siteSettingRepository
    ) {
        $this->middleware('auth:admin');
        parent::__construct();

        $this->siteSettingRepository = $siteSettingRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = $this->siteSettingRepository->findFirst();
        return view('admin.site_settings.siteSettings', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateSiteSettingRequest $request, $id)
    {

        //check logo if exists
        if ($request->hasfile('logo')) {
            //move | upload file on server
            $file      = $request->file('logo');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename  = 'logo-'.time() . '.' . $extension;
            $file->move(uploadsDir('front'), $filename);

            //check if upload successfully
            if (file_exists(uploadsDir('front').$filename)
                && !empty($request->previous_logo && file_exists(uploadsDir('front').$request->previous_logo))
            ) {
                unlink(uploadsDir('front').$request->previous_logo);
            }
        } else {
            $filename = $request->previous_logo;
        }

        $data = $request->except([
            '_token',
            '_method',
            'previous_logo'
        ]);

        $data['logo'] = $filename;
        $this->siteSettingRepository->update($id, $data);

        return redirect()
            ->route('admin.site_settings.index')
            ->with('success', 'Site settings were updated successfully!');
    }
}
