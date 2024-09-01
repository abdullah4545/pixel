<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PricePlan;
use App\Models\Service;
use DataTables;

class PricePlanController extends Controller
{
    public function index()
    {
        return view('backend.pages.service.pricing-section');
    }


    public function get_all_pricing_service(Request $request)
    {
        $pricePlans = PricePlan::all();

        return DataTables::of($pricePlans)
            ->addIndexColumn()
            ->addColumn('pricing_image', function ($pricePlan) {
                return '<img src="' . asset($pricePlan->price_image) . '" alt="" style="width: 65px;">';
            })
            ->addColumn('service-name', function ($pricePlan) {
                return Service::where('id', $pricePlan->service_id)->first()->title;
            })
            ->addColumn('status', function ($pricePlan) {
                if ($pricePlan->status == 1) {
                    return '<span class="badge bg-label-primary cursor-pointer" id="status" data-id="' . $pricePlan->id . '" data-status="' . $pricePlan->status . '">Active</span>';
                } else {
                    return '<span class="badge bg-label-danger cursor-pointer" id="status" data-id="' . $pricePlan->id . '" data-status="' . $pricePlan->status . '">Deactive</span>';
                }
            })
            ->addColumn('action', function ($pricePlan) {
                return '
                <div class="">
                    <button type="button" class="btn_edit" id="editButton" data-id="' . $pricePlan->id . '"data-bs-toggle="modal" data-bs-target="#editModal">
                        <i class="bx bx-edit-alt"></i>
                    </button>

                    <button type="button" id="deleteBtn" data-id="' . $pricePlan->id . '" class="btn_delete">
                        <i class="bx bx-trash"></i>
                    </button>
                </div>';
            })

            ->escapeColumns([])
            ->make(true);
    }

    public function store(Request $request)
    {
        $pricePlan = new PricePlan();
        $pricePlan->service_id       = $request->service_id;
        $pricePlan->price_title      = $request->price_title;
        $pricePlan->price_desc       = $request->price_desc;
        $pricePlan->whatsapp         = $request->whatsapp;
        $pricePlan->price           = $request->price;
        $pricePlan->status           = $request->status;

        if ($request->file('price_image')) {
            $price_image = $request->file('price_image');
            $imageName          = microtime('.') . '.' . $price_image->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/service/';
            $price_image->move($imagePath, $imageName);

            $pricePlan->price_image   = $imagePath . $imageName;
        }


        $pricePlan->save();

        return response()->json(['message' => 'successfully Category Created', 'status' => true], 200);
    }

    /**
     * Display the specified resource.
     */
    public function adminPricePlanStatus(Request $request)
    {
        $id = $request->id;
        $Current_status = $request->status;

        if ($Current_status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $page = PricePlan::find($id);
        $page->status = $status;
        $page->save();

        return response()->json(['message' => 'success', 'status' => $status,]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pricePlan = PricePlan::find($id);
        return response()->json(['success' => $pricePlan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pricePlan = PricePlan::find($id);
        $pricePlan->price_title      = $request->price_title;
        $pricePlan->price_desc       = $request->price_desc;
        $pricePlan->whatsapp         = $request->whatsapp;
        $pricePlan->status           = $request->status;
        $pricePlan->price           = $request->price;
        $pricePlan->service_id       = $request->service_id;

        if ($request->file('price_image')) {
            $price_image = $request->file('price_image');

            if (!is_null($pricePlan->price_image) && file_exists($pricePlan->price_image)) {
                unlink($pricePlan->price_image);
            }

            $imageName          = microtime('.') . '.' . $price_image->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/service/';
            $price_image->move($imagePath, $imageName);

            $pricePlan->price_image   = $imagePath . $imageName;
        }

        $pricePlan->save();

        return response()->json(['message' => "success"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pricePlan = PricePlan::find($id);

        $pricePlan->delete();

        return response()->json(['message' => 'Price-Plan has been deleted.'], 200);
    }
}
