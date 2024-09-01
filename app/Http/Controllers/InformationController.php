<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Information;
use App\Models\React;
use App\Models\Service;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($slug)
    {
        if ($slug == 'about_us') {
            $title = 'About US';
        } else if ($slug == 'contact_us') {
            $title = 'Contact Us';
        } else if ($slug == 'terms_codition') {
            $title = 'Terms & Conditions';
        } else if ($slug == 'privacy_policy') {
            $title = 'Privacy Policy';
        } else if ($slug == 'faq') {
            $title = 'Faq';
        } else {
        }

        $value = Information::where('key', $slug)->first();
        return view('backend.pages.information.index', ['title' => $title, 'slug' => $slug, 'value' => $value]);
    }

    public function contact(Request $request)
    {
        $contact = new Contact();

        $contact->name                  = $request->name;
        $contact->email                 = $request->email;
        $contact->mobile                = $request->mobile;
        $contact->service               = $request->service;
        $contact->note                  = $request->note;
        $contact->status                = 1;

        $contact->save();

        return response()->json(['message' => 'successfully submitted informtion', 'status' => true], 200);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function categoryservice($slug)
    {
        $category = Category::where('cat_slug', $slug)->first();
        $services = Service::where('category_id', $category->id)->get();
        return view('frontend.pages.static_pages.categoryservice', ['services' => $services, 'category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function givereact(Request $request, $slug)
    {

        if ($slug == 'like') {
            $ex = React::where('user_id', $request->ip())->where('service_id', $request->service_id)->where('sigment', 'like')->first();
            if (isset($ex)) {
                $ex->delete();
                $data = [
                    'total' => React::where('service_id', $request->service_id)->where('sigment', 'like')->get()->count(),
                    'service_id' => $request->service_id,
                    'sigment' => 'unlike',
                ];
                return response()->json($data, 200);
            } else {
                $like = new React();
                $like->service_id = $request->service_id;
                $like->user_id = $request->ip();
                $like->sigment = $slug;
                $like->save();
                $data = [
                    'total' => React::where('service_id', $request->service_id)->where('sigment', 'like')->get()->count(),
                    'service_id' => $request->service_id,
                    'sigment' => 'like',
                ];
                return response()->json($data, 200);
            }
        } else {
            $ex = React::where('user_id', $request->ip())->where('service_id', $request->service_id)->where('sigment', 'love')->first();
            if (isset($ex)) {
                $ex->delete();
                $data = [
                    'total' => React::where('service_id', $request->service_id)->where('sigment', 'love')->get()->count(),
                    'service_id' => $request->service_id,
                    'sigment' => 'unlove',
                ];
                return response()->json($data, 200);
            } else {
                $like = new React();
                $like->service_id = $request->service_id;
                $like->user_id = $request->ip();
                $like->sigment = $slug;
                $like->save();
                $data = [
                    'total' => React::where('service_id', $request->service_id)->where('sigment', 'love')->get()->count(),
                    'service_id' => $request->service_id,
                    'sigment' => 'love',
                ];
                return response()->json($data, 200);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function search(Request $request)
    {
        $searchs = Service::where('title', 'LIKE', '%' . $request->search . '%')->get();
        return view('frontend.pages.search', ['searchs' => $searchs, 'title' => $request->search]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Information $information)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $value = Information::where('key', $slug)->first();
        $value->value = $request->value;
        $value->meta_title = $request->meta_title;
        $value->meta_keyword = $request->meta_keyword;
        $value->meta_description = $request->meta_description;
        if ($request->page_banner) {
            $blogpageImg = $request->file('page_banner');
            $name = time() . "_" . $blogpageImg->getClientOriginalName();
            $uploadPath = ('public/images/banner/');
            $blogpageImg->move($uploadPath, $name);
            $blogpageImgUrl = $uploadPath . $name;
            $value->page_banner = $blogpageImgUrl;
        }
        $value->update();
        return redirect()->back()->with('message', 'Info Update Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Information $information)
    {
        //
    }
}
