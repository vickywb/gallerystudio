<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\ContactRepository;
use App\Http\Requests\ContactStoreRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    private $contactRepository;

    public function __construct(ContactRepository $contactRepository) 
    {
        $this->contactRepository = $contactRepository;
    }

    public function index()
    {
        return view('frontend.contact');
    }

    public function store(ContactStoreRequest $request, Contact $contact)
    {
        //Store data in variable data
        $data = $request->only([
            'name', 'email', 'subject', 'message'
        ]);

        try {
            DB::beginTransaction();

            //Store the new data
            $contact = new Contact($data);
            $contact = $this->contactRepository->store($contact);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return to_route('contact')->with([
            'success' => 'Your Message is successfully send, please be patient we will reply your message ASAP! Thankyou.'
        ]);
    }
}
