<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index(Request $request)
    {
        $query = Contacts::query();
        
        if ($request->has('name') && $request->input('name') != '') {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }
        $query->orderBy('id', 'desc');
        $contacts = $query->paginate(10);

        return view('admin.contact.index', compact('contacts'));
    }
}
