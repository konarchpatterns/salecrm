<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Designation;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use App\Models\GroupHasPermission;
use App\Models\Group;
use DB;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display all users
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('users.index', compact('users'));
    }

    /**
     * Show form for creating user
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user
     *
     * @param User $user
     * @param StoreUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, StoreUserRequest $request)
    {
        //For demo purposes only. When creating user or inviting a user
        // you should create a generated random password and email it to the user
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8'
        ]);
        // $user->create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password)
        // ]);

        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->save();

        return redirect()->route('users.edit', ['user' => $users->id])
            ->withSuccess(__('User created successfully.'));
    }

    /**
     * Show user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    /**
     * Edit user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $ppids = DB::table('model_has_permissions')->select('permission_id')->where('model_id', '=', $user->id)->get();
        //return Permission::select('name')->whereIn('id',$ppids)->get();
        $rolearr = [];
        $roleData = [];
        $designationlist = User::all();
        foreach (DB::table('model_has_roles')->select('role_id')->where('model_id', '=', $user->id)->get() as $val) {
            $rolearr[] = $val->role_id;
        }
        if (count($rolearr) > 0) {
            $roleData = DB::table('role_has_permissions')->whereIn('role_id', $rolearr)->get();
            if (count($roleData) > 0) {
                foreach ($roleData as $key => $val) {
                    $roledataidsdata[] = $roleData[$key]->permission_id;
                }
                $permissionNamesec = Permission::select('name')->whereIn('id', $roledataidsdata)->get();
                foreach ($permissionNamesec as $keys => $vals) {;
                    $permissionNamesecs[] = $vals['name'];
                }
            } else {
                $permissionNamesecs[] = [];
            }
        } else {
            $permissionNamesecs[] = [];
            $roledataidsdata = [];
        }


        if (count($ppids) > 0) {
            foreach ($ppids as $val) {
                $pmidss[] = $val->permission_id;
            }
            $permissionName = Permission::select('name')->whereIn('id', $pmidss)->get();
            foreach ($permissionName as $key => $val) {;
                $permissionNames[] = $val['name'];
            }
        } else {
            $permissionNames[] = [];
        }

        //return $user->roles->pluck('name')->toArray();
        $permissions = Permission::get();
        $groups = Group::get();
        foreach ($groups as $key => $val) {
            $permissionids = GroupHasPermission::select('permission_id')->where('group_id', $val->id)->get();
            $permissionidss = Permission::select('id', 'name', 'guard_name')->whereIn('id', $permissionids)->get();
            $groupArr[$val->name][] = ["data" => $permissionidss];
        }

        $a = Role::select('id', 'name', 'guard_name', 'created_at', 'updated_at')->get();
        return view('users.edit', [
            'user' => $user,
            'userRole' => $a->map(function ($role) {
                return $role->name;
            })->toArray(),
            'roles' => Role::latest()->get(),
            'userPermission' => $permissionNames,
            'groupArr' => $groupArr,
            'permissionNamesecs' => $permissionNamesecs,
            'designationlist' => $designationlist,
        ]);
    }

    /**
     * Update user data
     *
     * @param User $user
     * @param UpdateUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, UpdateUserRequest $request)
    {
        // return $request->get('role');
        $user->update($request->validated());
        User::where('id', '=', $user->id)->update(['assign_by' => $request->designation]);
        DB::table('model_has_roles')->where('model_id', '=', $user->id)->delete();
        DB::table('model_has_permissions')->where('model_id', '=', $user->id)->delete();
        $user->assignRole([$request->get('role')]);

        $user->givePermissionTo([$request->get('grpermission')]);
        // $user->syncRoles($request->get('role'));

        return redirect()->route('users.index')
            ->withSuccess(__('User updated successfully.'));
    }

    /**
     * Delete user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->withSuccess(__('User deleted successfully.'));
    }


    public function designationList()
    {
        return view('designation.index');
    }

    public function designationUpdate($id)
    {
        $designation = Designation::find($id);
        return view('designation.edit', compact('designation'));
    }

    public function designationEdit(Request $request)
    {

        $count = Designation::select('name')->where('name', $request->name)->count();
        if ($count < 1) {
            Designation::where('id', '=', $request->id)->update([
                'name' => $request->name,
                'description' => $request->description
            ]);

            $designation = Designation::find($request->id);
            return redirect()->back()->with('success', 'designation name updated successfully');
        } else {
            Designation::where('id', '=', $request->id)->update([
                'description' => $request->description
            ]);

            return redirect()->back()
                ->with('success', 'designation name updated successfully');
        }
    }
}
