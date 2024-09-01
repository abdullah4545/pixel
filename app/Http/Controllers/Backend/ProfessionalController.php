<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Professional;

class ProfessionalController extends Controller
{
  /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professional = Professional::first();
        return view('backend.pages.professional.index', compact('professional'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $professional = new Professional();

        $professional->small_title         = $request->small_title;
        $professional->main_title          = $request->main_title;
        $professional->description         = $request->description;
        $professional->url                 = $request->url;
        $professional->color_theme         = $request->color_theme;
        $professional->status              = $request->status;


        if( $request->file('image') ){
            $image = $request->file('image');

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/professional/';
            $image->move($imagePath, $imageName);

            $professional->image   = $imagePath . $imageName;
        }

        $professional->save();

        $notification = array(
            'message'    => "Professional section content uploaded successfully.",
            'alert-type' => "success"
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $professional = Professional::find($id);

        $professional->small_title         = $request->small_title;
        $professional->main_title          = $request->main_title;
        $professional->description         = $request->description;
        $professional->url                 = $request->url;
        $professional->color_theme         = $request->color_theme;
        $professional->status              = $request->status;

        if( $request->file('image') ){
            $image = $request->file('image');

            if( !is_null($professional->image) && file_exists($professional->image) ){
                unlink($professional->image);
           }

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/professional/';
            $image->move($imagePath, $imageName);

            $professional->image   = $imagePath . $imageName;
        }

        $professional->save();

        $notification = array(
            'message'    => "Professional section content uploaded successfully.",
            'alert-type' => "success"
        );

        return redirect()->back()->with($notification);
    }

}
