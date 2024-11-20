<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class VerifiedUserController extends Controller
{
    public function index()
    {
        $users = User::join('documents', 'users.id', '=', 'documents.user_id')
        ->select('users.id', 'users.name', 'users.email', 'documents.document_url', 'users.email_verified_at')
        ->get();
                     
        return view('admin.verified_users.index', compact('users'));
    }
}