<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProductUser;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Yoeunes\Toastr\Toastr;

class UsersController extends Controller
{
    public function index(){
        $roles = Role::whereNotIn("name", ['admin'])->get();
        $users = User::all();
        $productusers = ProductUser::all();
        return view("backend.pages.users",compact("users","roles",'productusers'));
    }

    public function assignRole(Request $request, User $user)
    {
        if ($user->hasRole($request->role)) {
        toastr()->error('This user already have this role!');
            return back()->with("message", 'role exists');
        }else{
            $user->assignRole($request->role);
        toastr()->success('role assigned  Successfully!');
        return back()->with("message", 'role assigned');
        }
    }
    public function removerole(User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            
                $user->removeRole($role);
            toastr()->warning('remove role user  Successfully!');
            return back();
        }
        return back();
    }
    public function destroy(User $user){
        $user->delete();
        toastr()->warning("user deleted Successfully !");
        return redirect()->back() ;
    }
}
