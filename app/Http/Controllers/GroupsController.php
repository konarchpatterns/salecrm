<?php

namespace App\Http\Controllers;

use App\Models\GroupHasPermission;
use Illuminate\Http\Request;
use DB;
use Spatie\Permission\Models\Role;
use App\Models\Group;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $groups = Group::orderBy('id', 'DESC')->paginate(5);
        return view('groups.index', compact('groups'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::find($id);
        $groupPermissions = GroupHasPermission::where('group_id', '=', $group->id)->pluck('permission_id')->toArray();
        $groupPermissionsIntersect = GroupHasPermission::where('group_id', '!=', $group->id)->pluck('permission_id')->toArray();

        $permissions = Permission::select("*")->whereNotIn('id', $groupPermissionsIntersect)->get();
        return view('groups.edit', compact('group', 'groupPermissions', 'permissions'));
    }
    public function update(request $request)
    {

        GroupHasPermission::select('id')->where('group_id', '=', $request->groupid)->delete();
        if ($request->permission != null) {
            $permissionid = Permission::select('id')->whereIn('name', $request->permission)->get();
            // $countgroupid=GroupHasPermission::select('id')->whereIn('permission_id',$permissionid)->get();
            // if($countgroupid<1)
            // {

            $this->validate($request, [
                'name' => 'required',
                'description' => 'required',
                'permission' => 'required',
            ]);
            Group::where('id', $request->groupid)->Update(['name' => $request->name, 'description' => $request->description]);

            foreach ($permissionid as $val) {
                //  $permission=Permission::select('id')->where('name','=',$val->id)->first();
                GroupHasPermission::create([
                    "group_id" => $request->groupid,
                    "permission_id" => $val->id
                ]);
            }



            return redirect()->route('groups.index')
                ->with('success', 'Group updated successfully');
            // }
            // else{
            //     return redirect()->back()
            //     ->with('success','some permissions are already allocated to the group');
            // }
        } else {

            return redirect()->route('groups.index')
                ->with('success', 'Group updated successfully');
        }
    }

    public function show($id)
    {
        $group = Group::find($id);
        $groupPermissions = Permission::select("permissions.id", "permissions.name", "permissions.guard_name")
            ->join('group_has_permissions', 'group_has_permissions.permission_id', '=', 'permissions.id')->where('group_has_permissions.group_id', '=', $id)->get();

        return view('groups.show', compact('group', 'groupPermissions'));
    }


    public function destroy($id)
    {
        GroupHasPermission::select("*")->where('group_id', $id)->delete();
        Group::find($id)->delete();
        $groups = Group::orderBy('id', 'DESC')->paginate(5);
        return redirect()->route('groups.index')
            ->with('success', 'Group deleted successfully');
    }
}
