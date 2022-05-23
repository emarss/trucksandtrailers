<?php

namespace App\Http\Controllers;

use App\Listing;
use App\Category;
use App\Feedback;
use App\Newsletter;
use Illuminate\Http\Request;
use App\Http\Requests\FeedbackRequest;
use App\Http\Requests\SubscribeRequest;
use App\Http\Requests\CreateListingRequests;

class HomeController extends Controller
{
    public function index()
    {
        $pageTitle = "Buy and Sell Trucks & Trailers";
        $listings = Listing::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->orderBy('priority', 'desc')
            ->paginate(15);
        return view('index')
            ->withPageTitle($pageTitle)
            ->withListings($listings);
    }

    public function addListing()
    {
        $pageTitle = "Add Listing";
        return view('add_listing')
            ->withPageTitle($pageTitle)->with([
                'categories' => Category::all(),
                'pageTitle' => $pageTitle,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveListing(CreateListingRequests $request)
    {
        $listing = Listing::create([
            'user_id' => 1,
            'name' => $request->input("name"),
            'description' => $request->input("description"),
            'condition' => $request->input("condition"),
            'whatsapp_number' => $request->input("whatsapp_number"),
            'cell_number' => $request->input("cell_number"),
            'email' => $request->input("email"),
            'location' => $request->input("location"),
            'category' => $request->input("category"),
            'price' => $request->input("price"),
            'status' => $request->input("status"),
            'priority' => $request->input("priority"),
            'currency' => $request->input("currency")
        ]);


        if ($request->hasFile('featured_image')) {
            $fileName = time() . "_" . $request->file('featured_image')->getClientOriginalName();
            $request->file('featured_image')->storeAs('public/listings/images', $fileName);
            $listing->featured_image = $fileName;
            $listing->save();

            $listing->clearMediaCollection('thumb');

            $listing->addMediaFromRequest('featured_image')
                ->toMediaCollection('thumb');
        }

        if ($request->hasFile('image_2')) {
            $fileName = time() . "_" . $request->file('image_2')->getClientOriginalName();
            $request->file('image_2')->storeAs('public/listings/images', $fileName);
            $listing->image_2 = $fileName;
            $listing->save();
        }

        if ($request->hasFile('image_3')) {
            $fileName = time() . "_" . $request->file('image_3')->getClientOriginalName();
            $request->file('image_3')->storeAs('public/listings/images', $fileName);
            $listing->image_3 = $fileName;
            $listing->save();
        }

        if($request->hasFile('image_4')){
            $fileName = time(). "_". $request->file('image_4')->getClientOriginalName();
            $request->file('image_4')->storeAs('public/listings/images', $fileName);
            $listing->image_4 = $fileName;
            $listing->save();
        }

        if($request->hasFile('image_5')){
            $fileName = time(). "_". $request->file('image_5')->getClientOriginalName();
            $request->file('image_5')->storeAs('public/listings/images', $fileName);
            $listing->image_5 = $fileName;
            $listing->save();
        }
        if($request->hasFile('image_6')){
            $fileName = time(). "_". $request->file('image_6')->getClientOriginalName();
            $request->file('image_6')->storeAs('public/listings/images', $fileName);
            $listing->image_6 = $fileName;
            $listing->save();
        }

        if($request->hasFile('image_7')){
            $fileName = time(). "_". $request->file('image_7')->getClientOriginalName();
            $request->file('image_7')->storeAs('public/listings/images', $fileName);
            $listing->image_7 = $fileName;
            $listing->save();
        }
        if($request->hasFile('image_8')){
            $fileName = time(). "_". $request->file('image_8')->getClientOriginalName();
            $request->file('image_8')->storeAs('public/listings/images', $fileName);
            $listing->image_8 = $fileName;
            $listing->save();
        }

        if($request->hasFile('image_9')){
            $fileName = time(). "_". $request->file('image_9')->getClientOriginalName();
            $request->file('image_9')->storeAs('public/listings/images', $fileName);
            $listing->image_9 = $fileName;
            $listing->save();
        }


        return back()->with([
            'feedback' => 'true',
            'title' => 'Listing Saved!',
            'message' => 'Your listing has been saved successfully. Thank you.'
        ]);
    }


    public function category($category)
    {
        $categoryObj = Category::where('category', $category)->first();

        $listings = Listing::where('category', $categoryObj->id)
                                ->paginate(15);


        $pageTitle = $listings->total() . " results found.";

        return view('search')
            ->with([
                'prevCategory' => $categoryObj->id,
                'prevSearch' => "",
                'listings' => $listings,
                'pageTitle' => $pageTitle,
            ]);
    }

    public function listingShow($slug)
    {
        $listing = Listing::where('slug', $slug)->first();
        $pageTitle = "listing->title";
        return view('listing-show')
            ->withListing($listing)
            ->withPageTitle($pageTitle);
    }


    public function contact()
    {
        $pageTitle = "Contact Us";
        return view('contact')
            ->withPageTitle($pageTitle);
    }

    public function about()
    {
        $pageTitle = "About Us";
        return view('about')
            ->withPageTitle($pageTitle);
    }

    public function terms()
    {
        $pageTitle = "Terms of Use";
        return view('terms')
            ->withPageTitle($pageTitle);
    }

    public function privacy()
    {
        $pageTitle = "Privacy Policy";
        return view('privacy')
            ->withPageTitle($pageTitle);
    }

    public function cookies()
    {
        $pageTitle = "Cookies Policy";
        return view('cookies')
            ->withPageTitle($pageTitle);
    }

    public function login()
    {
        $pageTitle = "Login Page";
        return view('auth.login')
            ->withPageTitle($pageTitle);
    }


    public function searchListings(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category');



        if ($category > 0) {
            $listings = Listing::where('category', $category)
                ->where(function ($query) use ($search) {
                    return $query->where('name', "LIKE", "%" . $search . "%")
                    ->orWhere('description', "LIKE", "%" . $search . "%");
                })
                ->paginate(15);
        } else {
            $listings = Listing::where('name', "LIKE", "%" . $search . "%")->orWhere('description', "LIKE", "%" . $search . "%")->paginate(15);
        }

        $pageTitle = $listings->total() . " results found.";

        return view('search')
            ->with([
                'prevCategory' => $category,
                'prevSearch' => $search,
                'listings' => $listings,
                'pageTitle' => $pageTitle,
            ]);
    }


    public function feedback(FeedbackRequest $request)
    {
        Feedback::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
        ]);

        return back()->with([
            'feedback' => 'true',
            'title' => 'Subscription sent!',
            'message' => 'You message has been saved Successfully. Our team will respond to you very soon.'
        ]);
    }

    public function newsletter(SubscribeRequest $request)
    {
        Newsletter::create([
            'email' => $request->input('email_newsletter'),
        ]);

        return back()->with([
            'feedback' => 'true',
            'title' => 'Subscription sent!',
            'message' => 'Thank you for subscribing to our newsletter.'
        ]);
    }
}
