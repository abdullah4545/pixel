<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Safety;

class SafetyController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $safety = Safety::first();
        return view('backend.pages.safety.index', compact('safety'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $safety = new Safety();

        $safety->safty_content1          = $request->safty_content1;
        $safety->safty_content2          = $request->safty_content2;
        $safety->safty_content3          = $request->safty_content3;
        $safety->safty_content4          = $request->safty_content4;

        if( $request->file('safty_img1') ){
            $safty_img1 = $request->file('safty_img1');

            $imageName          = microtime('.') . '.' . $safty_img1->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/safty/';
            $safty_img1->move($imagePath, $imageName);

            $project->safty_img1   = $imagePath . $imageName;
        }

        if( $request->file('safty_img2') ){
            $safty_img2 = $request->file('safty_img2');

            $imageName          = microtime('.') . '.' . $safty_img2->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/safty/';
            $safty_img2->move($imagePath, $imageName);

            $project->safty_img1   = $imagePath . $imageName;
        }

        if( $request->file('safty_img3') ){
            $safty_img3 = $request->file('safty_img3');

            $imageName          = microtime('.') . '.' . $safty_img3->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/safty/';
            $safty_img3->move($imagePath, $imageName);

            $project->safty_img1   = $imagePath . $imageName;
        }

        if( $request->file('safty_img4') ){
            $safty_img4 = $request->file('safty_img4');

            $imageName          = microtime('.') . '.' . $safty_img4->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/safty/';
            $safty_img4->move($imagePath, $imageName);

            $project->safty_img1   = $imagePath . $imageName;
        }

        $safety->youtube_url             = $request->youtube_url;

        $safety->save();

        $notification = array(
            'message'    => "Safety section content uploaded successfully.",
            'alert-type' => "success"
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $safety = Safety::find($id);

        $safety->safty_content1          = $request->safty_content1;
        $safety->safty_content2          = $request->safty_content2;
        $safety->safty_content3          = $request->safty_content3;
        $safety->safty_content4          = $request->safty_content4;

        if( $request->file('safty_img1') ){
            $safty_img1 = $request->file('safty_img1');

            if( !is_null($safety->safty_img1) && file_exists($safety->safty_img1) ){
                unlink($safety->safty_img1);
             }

            $imageName          = microtime('.') . '.' . $safty_img1->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/safty/';
            $safty_img1->move($imagePath, $imageName);

            $safety->safty_img1   = $imagePath . $imageName;
        }

        if( $request->file('safty_img2') ){
            $safty_img2 = $request->file('safty_img2');

            if( !is_null($safety->safty_img2) && file_exists($safety->safty_img2) ){
                unlink($safety->safty_img2);
             }

            $imageName          = microtime('.') . '.' . $safty_img2->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/safty/';
            $safty_img2->move($imagePath, $imageName);

            $safety->safty_img2   = $imagePath . $imageName;
        }

        if( $request->file('safty_img3') ){
            $safty_img3 = $request->file('safty_img3');

            if( !is_null($safety->safty_img3) && file_exists($safety->safty_img3) ){
                unlink($safety->safty_img3);
            }

            $imageName          = microtime('.') . '.' . $safty_img3->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/safty/';
            $safty_img3->move($imagePath, $imageName);

            $safety->safty_img3   = $imagePath . $imageName;
        }

        if( $request->file('safty_img4') ){
            $safty_img4 = $request->file('safty_img4');

            if( !is_null($safety->safty_img4) && file_exists($safety->safty_img4) ){
                unlink($safety->safty_img4);
            }

            $imageName          = microtime('.') . '.' . $safty_img4->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/safty/';
            $safty_img4->move($imagePath, $imageName);

            $safety->safty_img4   = $imagePath . $imageName;
        }
        $safety->youtube_url          = $request->youtube_url;

        $safety->save();

        $notification = array(
            'message'    => "Safety section content Updated successfully.",
            'alert-type' => "success"
        );

        return redirect()->back()->with($notification);
    }
}
