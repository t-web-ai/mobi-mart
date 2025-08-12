<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class UserListController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->filter;
        $search = $request->q;
        $users = User::when($filter == "username", function ($q) use ($search) {
            $q->where("name", "like", "%$search%");
        })
            ->when($filter == "email", function ($q) use ($search) {
                $q->where("email", "like", "%$search%");
            })
            ->when($filter == "address", function ($q) use ($search) {
                $q->where("address", "like", "%$search%");
            })
            ->paginate(10)
            ->appends(["q" => $search, "filter" => $filter]);
        return view("admin.auth.manage.users", [
            "users" => $users,
            "filter" => $filter
        ]);
    }

    public function destroy(Request $request, User $user)
    {
        $user->delete();
        return back();
    }
}
