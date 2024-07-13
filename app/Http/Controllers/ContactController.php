<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ContactController extends Controller
{
    public function index():Response{
        $user = Auth::user();
        $contact = Contact::all();

        return Inertia::render('Dashboard',[
            'contacts'=> $contact,
        ]);
    }

    public function create(): Response{
        return Inertia::render('Contact/Create');
    }

    public function store(ContactRequest $request): RedirectResponse{
        $contact = $request->validated();
        DB::beginTransaction();

        try {
            Contact::create($contact);
            DB::commit();
        }catch (Exception $e){
            DB::rollBack();
            dd($e);
        }
        return Redirect::route('dashboard');
    }
}
