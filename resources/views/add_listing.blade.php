@extends('layout')
@section('title', $pageTitle)
@section('content')
<div class="sub_header_in">
    <div class="container">
        <h1>Add Listing</h1>
    </div>
</div>


<main>
    <div class="container margin_60_35">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8 pr-xl-5">
                <div class="main_title_3">
                    <span></span>
                    <h2>Submit Listing</h2>
                    <p>Submit a product or service and our team will approve it for listing</p>
                </div>
                <form method="post" action="{{ route('save_listing') }}" enctype="multipart/form-data">
                    @csrf
                    <h5 class="h5">Basic Info</h5>
                    <hr>
                    <div class="form-group">
                        <label class="form-control-label" for="name">Name</label>
                        <input value="{{ old('name') }}" required="" type="text" name="name" class="form-control"
                            placeholder="Name">
                        @error('name')
                            <div class="text-danger my-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="formGroupExampleInput2">Description</label>
                        <textarea name="description" placeholder="Listing description" class="form-control">{!! old('description') !!}</textarea>
                        @error('description')
                            <div class="text-danger my-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="condition">Condition</label>
                            <select class="form-control condition" required name="condition">
                                <option {{ old('condition') == 'new' ? 'selected' : '' }} value="new">New</option>
                                <option {{ old('condition') == 'preowned' ? 'selected' : '' }} value="preowned">Preowned
                                </option>
                            </select>
                            @error('condition')
                                <div class="text-danger my-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="title">Category </label>
                            <select class="form-control category" name="category" required="">
                                <option value="">Select category</option>
                                @foreach ($categories as $category)
                                    <option {{ old('category') == $category->id ? 'selected' : '' }}
                                        value="{{ $category->id }}">{{ ucwords($category->category) }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="text-danger my-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <h5 class="h5 mt-4">Contact Info</h5>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="cell_number">Cell Number</label>
                            <input pattern="[\+]\d{9,14}" title="Please, enter phone number in international format." value="{{ old('cell_number') }}" required="" type="text" name="cell_number"
                                class="form-control" placeholder="Enter mobile number">
                            @error('cell_number')
                                <div class="text-danger my-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="whatsapp_number">WhatsApp Number
                                <i>(Optional)</i></label>
                            <input pattern="[\+]\d{9,14}" title="Please, enter phone number in international format." value="{{ old('whatsapp_number') }}"  type="text" name="whatsapp_number"
                                class="form-control" placeholder="Enter Whatsapp Number">
                            @error('whatsapp_number')
                                <div class="text-danger my-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="location">Location
                                </label>
                            <input value="{{ old('location') }}" required="" type="text" name="location"
                                class="form-control" placeholder="Enter Location">
                            @error('location')
                                <div class="text-danger my-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="email">Email Address<i>(Optional)</i></label>
                            <input value="{{ old('email') }}" type="email" name="email" class="form-control"
                                placeholder="Enter Email Address">
                            @error('email')
                                <div class="text-danger my-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <h5 class="h5 mt-4">Pricing</h5>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="price">Price</label>
                            <input value="{{ old('price') }}" required="" type="number" step="0.01" name="price"
                                class="form-control" placeholder="Enter Price">
                            @error('price')
                                <div class="text-danger my-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="currency">Currency</label>
                            <select class="form-control currency" required name="currency">
                                <option {{ old('currency') == 'USD' ? 'selected' : '' }} value="USD">USD (United States
                                    Dollar)</option>
                                <option {{ old('currency') == 'ZAR' ? 'selected' : '' }} value="ZAR">ZAR (South African
                                    Rand)</option>
                                <option {{ old('currency') == 'ZWL' ? 'selected' : '' }} value="ZWL">ZWL (Zimbabwean
                                    Dollar)</option>

                            </select>
                            @error('currency')
                                <div class="text-danger my-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <h5 class="h5 mt-4">Images</h5>
                    <hr>
                    <div class="form-group">
                        <label class="form-control-label" for="title">Select Featured Image *</label>
                        <div class="custom-file">
                            <input value="{{ old('featured_image') }}" required="" type="file" accept="image/*"
                                class="custom-file-input" name="featured_image">
                            <label class="custom-file-label" for="featured_image">Choose file</label>
                        </div>
                        @error('featured_image')
                            <div class="text-danger my-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="title">Select Another Image <i>(Optional)</i></label>
                            <div class="custom-file">
                                <input value="{{ old('image_2') }}" type="file" accept="image/*" class="custom-file-input"
                                    name="image_2">
                                <label class="custom-file-label" for="image_2">Choose file</label>
                            </div>
                            @error('image_2')
                                <div class="text-danger my-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="title">Select Another Image <i>(Optional)</i></label>
                            <div class="custom-file">
                                <input value="{{ old('image_3') }}" type="file" accept="image/*" class="custom-file-input"
                                    name="image_3">
                                <label class="custom-file-label" for="image_3">Choose file</label>
                            </div>
                            @error('image_3')
                                <div class="text-danger my-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>



                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="title">Select Another Image <i>(Optional)</i></label>
                            <div class="custom-file">
                                <input value="{{ old('image_4') }}" type="file" accept="image/*" class="custom-file-input"
                                    name="image_4">
                                <label class="custom-file-label" for="image_4">Choose file</label>
                            </div>
                            @error('image_4')
                                <div class="text-danger my-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="title">Select Another Image <i>(Optional)</i></label>
                            <div class="custom-file">
                                <input value="{{ old('image_5') }}" type="file" accept="image/*" class="custom-file-input"
                                    name="image_5">
                                <label class="custom-file-label" for="image_5">Choose file</label>
                            </div>
                            @error('image_5')
                                <div class="text-danger my-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="title">Select Another Image <i>(Optional)</i></label>
                            <div class="custom-file">
                                <input value="{{ old('image_6') }}" type="file" accept="image/*" class="custom-file-input"
                                    name="image_6">
                                <label class="custom-file-label" for="image_6">Choose file</label>
                            </div>
                            @error('image_6')
                                <div class="text-danger my-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="title">Select Another Image <i>(Optional)</i></label>
                            <div class="custom-file">
                                <input value="{{ old('image_7') }}" type="file" accept="image/*" class="custom-file-input"
                                    name="image_7">
                                <label class="custom-file-label" for="image_7">Choose file</label>
                            </div>
                            @error('image_7')
                                <div class="text-danger my-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="title">Select Another Image <i>(Optional)</i></label>
                            <div class="custom-file">
                                <input value="{{ old('image_8') }}" type="file" accept="image/*" class="custom-file-input"
                                    name="image_8">
                                <label class="custom-file-label" for="image_8">Choose file</label>
                            </div>
                            @error('image_8')
                                <div class="text-danger my-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="title">Select Another Image <i>(Optional)</i></label>
                            <div class="custom-file">
                                <input value="{{ old('image_9') }}" type="file" accept="image/*" class="custom-file-input"
                                    name="image_9">
                                <label class="custom-file-label" for="image_9">Choose file</label>
                            </div>
                            @error('image_9')
                                <div class="text-danger my-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <input value="0" required="" type="hidden" name="status">
                    <input value="1" required="" type="hidden" name="priority">

                    <div class="form-group">
                        <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        
        </div>
    </div>
    <!-- /container -->
</main>
@endsection
