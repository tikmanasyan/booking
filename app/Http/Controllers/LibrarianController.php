<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibrarianController extends Controller
{
    public function index() {
        $librarians = DB::table("users")->where("role_id", "<>", 1)->get();
        return view("admin.librarians.LibrariansList", compact('librarians'));
    }

    public function store(RegisterRequest $request) {

    }

    public function edit($id) {

    }

    public function update(RegisterRequest $request, $id) {

    }

    public function destroy($id) {

    }
}
