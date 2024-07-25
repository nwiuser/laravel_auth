<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\RegisteredUserController;

class StudentController extends Controller
{

    public function showForm($role){
        $controller = new RegisteredUserController();
        return $controller->create($role);
    }

    public function storeStudent(Request $request){
        return RegisteredUserController::store($request, $request->role);
    }
}
