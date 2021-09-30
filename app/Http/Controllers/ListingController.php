<?php

namespace App\Http\Controllers;

use App\Listing;
use App\Category;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EditListingRequests;
use App\Http\Requests\CreateListingRequests;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listings = Listing::all();
        $pageTitle = "Listing List";
        return view('admin.listings.index')
                    ->with([
                        'pageTitle' => $pageTitle,
                        'listings' => $listings,
                    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Add New Listing";
        
        return view('admin.listings.create')
                    ->with([
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
    public function store(CreateListingRequests $request)
    {
        $listing = Listing::create([
            'user_id' => auth()->user()->id,
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


        if($request->hasFile('featured_image')){
            $fileName = time(). "_". $request->file('featured_image')->getClientOriginalName();
            $request->file('featured_image')->storeAs('public/listings/images', $fileName);
            $listing->featured_image = $fileName;
            $listing->save();

            $listing->clearMediaCollection('thumb');

            $listing->addMediaFromRequest('featured_image')
                 ->toMediaCollection('thumb');
        }

        if($request->hasFile('image_2')){
            $fileName = time(). "_". $request->file('image_2')->getClientOriginalName();
            $request->file('image_2')->storeAs('public/listings/images', $fileName);
            $listing->image_2 = $fileName;
            $listing->save();
        }

        if($request->hasFile('image_3')){
            $fileName = time(). "_". $request->file('image_3')->getClientOriginalName();
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

        return redirect()
                    ->route('admin.listings.index')
                    ->with([
                        'success' => 'true',
                        'message' => 'Listing added Successfully.'
                    ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listing = Listing::findOrFail($id);
        $pageTitle = "Show Listing";
        return view('admin.listings.show')
                    ->with([
                        'pageTitle' => $pageTitle,
                        'listing' => $listing,
                    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = "Edit Listing";
        $listing = Listing::findOrFail($id);
        return view('admin.listings.edit')
                    ->with([
                        'pageTitle' => $pageTitle,
                        'categories' => Category::all(),
                        'listing' => $listing,
                    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditListingRequests $request, $id)
    {
        $listing = Listing::findOrFail($id);

        Listing::where('id', $id)->update([
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


        if($request->hasFile('featured_image')){        
            $fileName = time(). "_". $request->file('featured_image')->getClientOriginalName();
            $request->file('featured_image')->storeAs('public/listings/images', $fileName);
            $listing->featured_image = $fileName;
            $listing->save();

            $listing->clearMediaCollection('thumb');

            $listing->addMediaFromRequest('featured_image')
                 ->toMediaCollection('thumb');
        }

        if($request->hasFile('image_2')){
            $fileName = time(). "_". $request->file('image_2')->getClientOriginalName();
            $request->file('image_2')->storeAs('public/listings/images', $fileName);
            $listing->image_2 = $fileName;
            $listing->save();
        }

        if($request->hasFile('image_3')){
            $fileName = time(). "_". $request->file('image_3')->getClientOriginalName();
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

        return redirect()
                    ->route('admin.listings.index')
                    ->with([
                        'success' => 'true',
                        'message' => 'Listing updated Successfully.'
                    ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listing = Listing::findOrFail($id);
        $listing->clearMediaCollection('featured_image');
        Storage::delete('public/listings/images', $listing->featured_image);
        if(strlen($listing->image_2)!= 0){
            Storage::delete('public/listings/images', $listing->image_2);
        }
        if(strlen($listing->image_3)!= 0){
            Storage::delete('public/listings/images', $listing->image_3);
        }
        Listing::destroy($id);
        return redirect()->route('admin.listing.index')
                            ->with([
                                'success' => 'true',
                                'message' => 'Listing deleted Successfully.'
                            ]);
    }
}
