<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Service;
use DataTables;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.contact.index');
    }

    public function getData(Request $request)
    {
        $contacts = Contact::get()->reverse();

        // dd($categories);

        return DataTables::of($contacts)
            ->addIndexColumn()
            ->addColumn('name', function ($contacts) {
                return '<span class="badge bg-label-info">' . $contacts->name . '</span>';
            })
            ->addColumn('service', function ($contacts) {
                return Service::where('id', $contacts->service)->first()->title;
            })
            ->addColumn('status', function ($contacts) {
                if ($contacts->status == 1) {
                    return '<span class="badge bg-label-primary cursor-pointer" id="status" data-id="' . $contacts->id . '" data-status="' . $contacts->status . '">Active</span>';
                } else {
                    return '<span class="badge bg-label-danger cursor-pointer" id="status" data-id="' . $contacts->id . '" data-status="' . $contacts->status . '">Deactive</span>';
                }
            })

            ->rawColumns(['name', 'status'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $contact = new Contact();

        $contact->name                  = $request->name;
        $contact->email                 = $request->email;
        $contact->mobile                = $request->mobile;
        $contact->service               = $request->service;
        $contact->note                  = $request->note;
        $contact->status                = 1;

        $contact->save();

        return response()->json(['message' => 'successfully Contact Created', 'status' => true], 200);
    }

    /**
     * Display the specified resource.
     */
    public function adminContactStatus(Request $request)
    {
        $id = $request->id;
        $Current_status = $request->status;

        if ($Current_status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $page = Contact::find($id);
        $page->status = $status;
        $page->save();

        return response()->json(['message' => 'success', 'status' => $status,]);
    }
}
