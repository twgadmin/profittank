<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\StoreAdministratorRequest;
use App\Http\Requests\Admin\UpdateAdministratorRequest;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use App\Http\Requests\Admin\UpdatePasswordRequest;
use App\Http\Requests\Admin\UpdateInvestorRequest;
use App\Http\Requests\Admin\StoreInvestorRequest;

class AdministratorsController extends Controller
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
     * @return Response
     */
    public function index()
    {
        $records = $this->adminRepository->all();
        return view('admin.administrators.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.administrators.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAdministratorRequest $request
     *
     * @return Response
     */
    public function store(StoreAdministratorRequest $request)
    {
        $data = $request->except(
            [
                '_token',
                '_method',
                'picture'
            ]
        );

        if ($request->hasfile('picture')) {
            $file             = $request->file('picture');
            $extension        = $file->getClientOriginalExtension(); // getting file extension
            $filename         = 'admin-profile-'.time() . '.' . $extension;
            $file->move(uploadsDir("admin"), $filename);
            $data['picture'] = $filename;
        }
        $user = $this->adminRepository->create($data);

        /*
         * Trigger AdminCreatedEvent
         */
        event(new \App\Events\AdminCreatedEvent($user));

        return redirect()
            ->route('admin.administrators.index')
            ->with('success', 'Administrator added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $data = $this->adminRepository->find($id);

        return view('admin.administrators.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $auth_id = Auth::user()->id;
        $data    = $this->adminRepository->find($id);
        if($auth_id == 1 || $auth_id == $id){
            return view('admin.administrators.edit', compact('data'));
        }else{
        return redirect()
            ->route('admin.administrators.index')
            ->with('error', 'You do no have permission to edit this user.');            
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAdministratorRequest $request
     * @param int $id
     *
     * @return Response
     */
    public function update(UpdateAdministratorRequest $request, $id)
    {
        $exceptFields = [
            '_token',
            '_method',
            'email',
            'password',
            'file',
            'picture',
            'password_confirmation'
        ];
        // 1 = super admin user id, and is_active status cannot be set for it
        if ($id == 1) {
            $exceptFields[] = 'is_active';
        } 
        $data = $request->except($exceptFields);
        if ($request->hasfile('file')) {
            $file             = $request->file('file');
            $extension        = $file->getClientOriginalExtension(); // getting file extension
            $filename         = 'admin-profile-'.time() . '.' . $extension;
            $file->move(uploadsDir("admin"), $filename);

            $profile             = $request->picture;
            if (file_exists(uploadsDir("admin").$profile)
                && !empty($request->profile && file_exists(uploadsDir("admin").$request->profile))) {
                unlink(uploadsDir("admin").$request->profile);
            }
            $data['picture'] = $filename;
        }
        
        if (isset($request->password) && $request->password !='') {
            $data['password'] = bcrypt($request->password);
        }
        $this->adminRepository->update($id, $data);

        return redirect()
            ->route('admin.administrators.index')
            ->with('success', 'Administrator updated successfully.');
    }

    /**
     * Removes the resource from database.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        // 1 = super admin user id, and it cannot be removed

        $auth_id               = Auth::user()->id;
        if ($auth_id == 1){
            if ($id == 1) {
                $error   = 1;
                $message = "You can not delete main administrator.";
                $data    = [];
            } else {
                $this->adminRepository->delete($id);
                $error   = 0;
                $data    = [];
                $message = "Administrator has been removed successfully.";
            }
        } else {
                $error   = 1;
                $message = "Something went wrong.";
                $data    = [];
        }
        return response()->json([
            'error'   => $error,
            'message' => $message,
            'data'    => $data
        ]);
    }

    /**
     * Show the form for editing the password to specified resource.
     *
     * @return Response
     */
    public function changePassword()
    {
        return view('admin.users.changePassword');
    }
    
    /**
     * Update the password of specified resource in storage.
     *
     * @param UpdatePasswordRequest $request
     *
     * @return Response message
     */
    public function processChangePassword(UpdatePasswordRequest $request)
    {
        $id               = Auth::user()->id;
        $data['password'] = bcrypt($request->get('password'));

        $this->adminRepository->update($id, $data);
        
        return redirect()
            ->route('admin.users.change-password')
            ->with('success', 'Password has been changed successfully..');
    }
    public function EditProfile() {
        $data = $this->adminRepository->find(auth::user()->id);
        return view('admin.profile_update', compact('data'));

    }
}
