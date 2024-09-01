<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BasicInfo;
use Illuminate\Support\Str;

class BasicInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $basicInfo = BasicInfo::first();
        return view('backend.pages.basic_setting.index', compact('basicInfo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $basicInfo = new BasicInfo();
        $basicInfo->whatsapp             = $request->whatsapp;
        $basicInfo->phone                = $request->phone;
        $basicInfo->phone_optional       = $request->phone_optional;
        $basicInfo->email                = $request->email;
        $basicInfo->email_optional       = $request->email_optional;
        $basicInfo->address              = Str::trim($request->address);
        $basicInfo->address_optional     = Str::trim($request->address_optional);
        $basicInfo->facebook             = $request->facebook;
        $basicInfo->twitter              = $request->twitter;
        $basicInfo->youtube              = $request->youtube;
        $basicInfo->linkedin             = $request->linkedin;
        $basicInfo->instagram            = $request->instagram;
        $basicInfo->pinterest            = $request->pinterest;
        $basicInfo->facebook_pixel       = Str::trim($request->facebook_pixel);
        $basicInfo->google_analytics     = Str::trim($request->google_analytics);

        if ($request->file('logo')) {
            $logo = $request->file('logo');

            $imageName          = microtime('.') . '.' . $logo->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/basicinfo/';
            $logo->move($imagePath, $imageName);

            $basicInfo->logo   = $imagePath . $imageName;
        }
        if ($request->file('mobile_logo')) {
            $mobile_logo = $request->file('mobile_logo');
            $imageNameml          = microtime('.') . '.' . $mobile_logo->getClientOriginalExtension();
            $imagePathml          = 'public/backend/image/basicinfo/';
            $mobile_logo->move($imagePathml, $imageNameml);
            $basicInfo->mobile_logo   = $imagePathml . $imageNameml;
        }

        // footer
        if ($request->file('footer_logo')) {
            $footer_logo = $request->file('footer_logo');
            $imageNamefl          = microtime('.') . '.' . $footer_logo->getClientOriginalExtension();
            $imagePathfl          = 'public/backend/image/basicinfo/';
            $footer_logo->move($imagePathfl, $imageNamefl);
            $basicInfo->footer_logo   = $imagePathfl . $imageNamefl;
        }
        $basicInfo->footer_text            = $request->footer_text;

        // meta
        if ($request->file('favicon')) {
            $favicon = $request->file('favicon');
            $imageNamefav          = microtime('.') . '.' . $favicon->getClientOriginalExtension();
            $imagePathfav          = 'public/backend/image/basicinfo/';
            $favicon->move($imagePathfav, $imageNamefav);
            $basicInfo->favicon   = $imagePathfav . $imageNamefav;
        }

        if ($request->file('meta_image')) {
            $meta_image = $request->file('meta_image');
            $imageNamemata          = microtime('.') . '.' . $meta_image->getClientOriginalExtension();
            $imagePathmata          = 'public/backend/image/basicinfo/';
            $meta_image->move($imagePathmata, $imageNamemata);
            $basicInfo->meta_image   = $imagePathmata . $imageNamemata;
        }

        $basicInfo->meta_image             = $request->meta_image;
        $basicInfo->meta_title             = $request->meta_title;
        $basicInfo->meta_keyword           = $request->meta_keyword;
        $basicInfo->meta_description       = $request->meta_description;

        $basicInfo->save();

        $notification = array(
            'message'    => "Basic Information has been Inserted successfully.",
            'alert-type' => "success"
        );

        return redirect()->route('admin.basic-info.index')->with($notification);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $basicInfo = BasicInfo::find($id);

        $basicInfo->whatsapp             = $request->whatsapp;
        $basicInfo->phone                = $request->phone;
        $basicInfo->phone_optional       = $request->phone_optional;
        $basicInfo->email                = $request->email;
        $basicInfo->email_optional       = $request->email_optional;
        $basicInfo->address              = Str::trim($request->address);
        $basicInfo->address_optional     = Str::trim($request->address_optional);
        $basicInfo->facebook             = $request->facebook;
        $basicInfo->twitter              = $request->twitter;
        $basicInfo->youtube              = $request->youtube;
        $basicInfo->linkedin             = $request->linkedin;
        $basicInfo->instagram            = $request->instagram;
        $basicInfo->pinterest            = $request->pinterest;
        $basicInfo->facebook_pixel       = Str::trim($request->facebook_pixel);
        $basicInfo->google_analytics     = Str::trim($request->google_analytics);


        if ($request->file('logo')) {
            $logo = $request->file('logo');

            if (!is_null($basicInfo->logo) && file_exists($basicInfo->logo)) {
                unlink($basicInfo->logo);
            }

            $imageName          = microtime('.') . '.' . $logo->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/basicInfo/';
            $logo->move($imagePath, $imageName);

            $basicInfo->logo   = $imagePath . $imageName;
        }

        if ($request->file('mobile_logo')) {
            $mobile_logo = $request->file('mobile_logo');
            $imageNameml          = microtime('.') . '.' . $mobile_logo->getClientOriginalExtension();
            $imagePathml          = 'public/backend/image/basicinfo/';
            $mobile_logo->move($imagePathml, $imageNameml);
            $basicInfo->mobile_logo   = $imagePathml . $imageNameml;
        }

        // contact
        if ($request->file('contact_image')) {
            $contact_image = $request->file('contact_image');
            $imageNamecontact          = microtime('.') . '.' . $contact_image->getClientOriginalExtension();
            $imagePathcontact          = 'public/backend/image/basicinfo/';
            $contact_image->move($imagePathcontact, $imageNamecontact);
            $basicInfo->contact_image   = $imagePathcontact . $imageNamecontact;
        }

        $basicInfo->contact_title          = $request->contact_title;
        $basicInfo->contact_description    = $request->contact_description;

        // footer
        if ($request->file('footer_logo')) {
            $footer_logo = $request->file('footer_logo');
            $imageNamefl          = microtime('.') . '.' . $footer_logo->getClientOriginalExtension();
            $imagePathfl          = 'public/backend/image/basicinfo/';
            $footer_logo->move($imagePathfl, $imageNamefl);
            $basicInfo->footer_logo   = $imagePathfl . $imageNamefl;
        }

        // page_ss
        if ($request->file('page_ss')) {
            $page_ss_logo = $request->file('page_ss');
            $imageNamepage_ss         = microtime('.') . '.' . $page_ss_logo->getClientOriginalExtension();
            $imagePathpage_ss       = 'public/backend/image/basicinfo/';
            $page_ss_logo->move($imagePathpage_ss, $imageNamepage_ss);
            $basicInfo->page_ss   = $imagePathpage_ss . $imageNamepage_ss;
        }

        $basicInfo->footer_text            = $request->footer_text;

        // meta
        if ($request->file('favicon')) {
            $favicon = $request->file('favicon');
            $imageNamefav          = microtime('.') . '.' . $favicon->getClientOriginalExtension();
            $imagePathfav          = 'public/backend/image/basicinfo/';
            $favicon->move($imagePathfav, $imageNamefav);
            $basicInfo->favicon   = $imagePathfav . $imageNamefav;
        }

        if ($request->file('meta_image')) {
            $meta_image = $request->file('meta_image');
            $imageNamemata          = microtime('.') . '.' . $meta_image->getClientOriginalExtension();
            $imagePathmata          = 'public/backend/image/basicinfo/';
            $meta_image->move($imagePathmata, $imageNamemata);
            $basicInfo->meta_image   = $imagePathmata . $imageNamemata;
        }

        $basicInfo->meta_title             = $request->meta_title;
        $basicInfo->meta_keyword           = $request->meta_keyword;
        $basicInfo->meta_description       = $request->meta_description;




        if ($request->file('servicepage')) {
            $servicepage = $request->file('servicepage');
            $imageNameservicepage          = microtime('.') . '.' . $servicepage->getClientOriginalExtension();
            $imagePathservicepage          = 'public/backend/image/basicinfo/';
            $servicepage->move($imagePathservicepage, $imageNameservicepage);
            $basicInfo->servicepage   = $imagePathservicepage . $imageNameservicepage;
        }

        if ($request->file('pricepage')) {
            $pricepage = $request->file('pricepage');
            $imageNamepricepage          = microtime('.') . '.' . $pricepage->getClientOriginalExtension();
            $imagePathpricepage          = 'public/backend/image/basicinfo/';
            $pricepage->move($imagePathpricepage, $imageNamepricepage);
            $basicInfo->pricepage   = $imagePathpricepage . $imageNamepricepage;
        }
        if ($request->file('projectpage')) {
            $projectpage = $request->file('projectpage');
            $imageNameprojectpage          = microtime('.') . '.' . $projectpage->getClientOriginalExtension();
            $imagePathprojectpage          = 'public/backend/image/basicinfo/';
            $projectpage->move($imagePathprojectpage, $imageNameprojectpage);
            $basicInfo->projectpage   = $imagePathprojectpage . $imageNameprojectpage;
        }
        if ($request->file('blogpage')) {
            $blogpage = $request->file('blogpage');
            $imageNameblogpage          = microtime('.') . '.' . $blogpage->getClientOriginalExtension();
            $imagePathblogpage          = 'public/backend/image/basicinfo/';
            $blogpage->move($imagePathblogpage, $imageNameblogpage);
            $basicInfo->blogpage   = $imagePathblogpage . $imageNameblogpage;
        }

        $basicInfo->save();

        $notification = array(
            'message'    => "Basic Information has been updated successfully.",
            'alert-type' => "success"
        );

        return redirect()->back()->with($notification);
    }
}