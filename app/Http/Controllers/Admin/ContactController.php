<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\ContactRepository;

class ContactController extends Controller
{
    private $contactRepository;

    public function __construct(ContactRepository $contactRepository) 
    {
        $this->contactRepository = $contactRepository;
    }
    
    public function index()
    {
        $contacts = $this->contactRepository->get([
            'order' => 'created_at desc'
        ]);

        return view('admin.contact.index', [
            'contacts' => $contacts
        ]);
    }
    
    public function destroy(Contact $contact)
    {
        try {
            DB::beginTransaction();
            
            //Delete a record from a specific table
            $contact->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return to_route('admin.contact.index')->with([
            'message' => 'Contact has been successfully deleted.'
        ]);
    }
}
