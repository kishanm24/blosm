@extends('layouts.master')

@section('title') General Information @lang('translation.create-general-information') @endsection
@section('css')
{{-- <link href="{{ URL::asset('build/libs/dropzone/dropzone.css') }}" rel="stylesheet"> --}}
@endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Admin @endslot
@slot('title') General Information Listing @endslot
@endcomponent

<div class="row">
    <div class="col-xxl-12">
        {{-- <h5 class="mb-3">Vertical Nav Tabs</h5> --}}
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-2">
                        <div class="nav flex-column nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            {{-- <a class="nav-link mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
                            <a class="nav-link mb-2" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                            <a class="nav-link mb-2" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                            <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a> --}}

                            <a class="nav-link mb-2 active" id="general-tab" data-bs-toggle="pill" href="#general" role="tab" aria-controls="general" aria-selected="true">General</a>
                            <a class="nav-link mb-2" id="about-us-tab" data-bs-toggle="pill" href="#about-us" role="tab" aria-controls="about-us" aria-selected="false">About Us</a>
                            <a class="nav-link mb-2" id="terms-and-condition-tab" data-bs-toggle="pill" href="#terms-and-condition" role="tab" aria-controls="terms-and-condition" aria-selected="false">Terms and Condition</a>
                            <a class="nav-link mb-2" id="privacy-policy-tab" data-bs-toggle="pill" href="#privacy-policy" role="tab" aria-controls="privacy-policy" aria-selected="false">Privacy Policy</a>
                            <a class="nav-link mb-2" id="social-tab" data-bs-toggle="pill" href="#social" role="tab" aria-controls="social" aria-selected="false">Social Links</a>
                            <a class="nav-link mb-2" id="app-link-tab" data-bs-toggle="pill" href="#app-link" role="tab" aria-controls="app-link" aria-selected="false">App Link</a>
                            <a class="nav-link mb-2" id="app-version-tab" data-bs-toggle="pill" href="#app-version" role="tab" aria-controls="app-version" aria-selected="false">App Version</a>
                            <a class="nav-link mb-2" id="delivery-return-tab" data-bs-toggle="pill" href="#delivery-return" role="tab" aria-controls="delivery-return" aria-selected="false">Delivery And Return Policy</a>
                            <a class="nav-link mb-2" id="coupons-tab" data-bs-toggle="pill" href="#coupons" role="tab" aria-controls="coupons" aria-selected="false">Coupons T&C</a>
                            <a class="nav-link mb-2" id="delivery-charges-tab" data-bs-toggle="pill" href="#delivery-charges" role="tab" aria-controls="delivery-charges" aria-selected="false">Delivery Charges</a>
                            <a class="nav-link mb-2" id="billing-tab" data-bs-toggle="pill" href="#billing" role="tab" aria-controls="billing" aria-selected="false">Billing Details</a>
                        </div>
                    </div><!-- end col -->
                    <div class="col-md-10">
                        <div class="tab-content mt-4 mt-md-0" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                                {!! Form::open(['route' => 'general-information.store', 'method' => 'post']) !!}

                                    <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div>
                                        {!! Form::label('system_email', 'System E-mail', ['class' => 'form-label']) !!}
                                        {!! Form::text('system_email', null, ['class' => 'form-control', 'required', 'placeholder' => 'System E-mail']) !!}
                                    </div>

                                    @error('system_email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div>
                                        {!! Form::label('contact_no', 'Contact No', ['class' => 'form-label']) !!}
                                        {!! Form::text('contact_no', null, ['class' => 'form-control', 'required', 'placeholder' => 'Contact No']) !!}
                                    </div>

                                    @error('contact_no')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div>
                                        {!! Form::label('meta_title', 'Meta Title', ['class' => 'form-label']) !!}
                                        {!! Form::text('meta_title', null, ['class' => 'form-control', 'required', 'placeholder' => 'Meta Title']) !!}
                                    </div>

                                    @error('meta_title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div>
                                        {!! Form::label('meta_keywords', 'Meta Keywords', ['class' => 'form-label']) !!}
                                        {!! Form::text('meta_keywords', null, ['class' => 'form-control', 'required', 'placeholder' => 'Meta Keywords']) !!}
                                    </div>

                                    @error('meta_keywords')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div>
                                        {!! Form::label('meta_description', 'Meta Description', ['class' => 'form-label']) !!}
                                        {!! Form::textarea('meta_description', null, ['class' => 'form-control', 'required', 'placeholder' => 'Meta Description']) !!}
                                    </div>

                                    @error('meta_description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="text-start mb-4">
                                {!! Form::submit('Submit', ['class' => 'btn btn-success w-sm float-right', 'id' => "submit"]); !!}
                            </div>


                                {!! Form::close() !!}
                    </div>

                            </div>
                            {{-- <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <div class="d-flex mb-2">
                                    <div class="flex-shrink-0">
                                        <img src="{{ URL::asset('build/images/small/img-5.jpg') }}" alt="" width="150" class="rounded">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="mb-0"> I also decreased the transparency in the text so that the mountains come through the text, bringing the quote truly to life. Make sure that the placement of your text is pleasing to look at, and you try to achieve symmetry for this effect.</p>
                                    </div>
                                </div>
                                <p class="mb-0">
                                    You've probably heard that opposites attract. The same is true for fonts. Don't be afraid to combine font styles that are different but complementary. You can always play around with the text that is overlaid on an image.
                                </p>
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                <div class="d-flex mb-2">
                                    <div class="flex-shrink-0">
                                        <img src="{{ URL::asset('build/images/small/img-6.jpg') }}" alt="" width="150" class="rounded">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="mb-0">In this image, you can see that the line height has been reduced significantly, and the size was brought up exponentially. Experiment and play around with the fonts that you already have in the software you’re working with reputable font websites.</p>
                                    </div>
                                </div>
                                <p class="mb-0">
                                    They highly encourage that you use different fonts in one design, but do not over-exaggerate and go overboard This may be the most commonly encountered tip I received from the designers I spoke with.
                                </p>
                            </div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                <div class="d-flex mb-2">
                                    <div class="flex-shrink-0">
                                        <img src="{{ URL::asset('build/images/small/img-7.jpg') }}" alt="" width="150" class="rounded">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="mb-0">When designing, the goal is to draw someone’s attention and portray to them what you’re trying to say. You can make a big statement by using little tricks, like this one. Use contrasting fonts. you can use a bold sanserif font with a cursive.</p>
                                    </div>
                                </div>
                                <p class="mb-0">
                                    If you’re using multiple elements, make sure that your principal object is larger than the others, as the eye of your viewer will automatically be drawn to the larger of the two objects.
                                </p>
                            </div> --}}

                            <!-- About Us Tab -->
                            <div class="tab-pane fade" id="about-us" role="tabpanel" aria-labelledby="about-us-tab">
                                {!! Form::open(['route' => 'general-information.store', 'method' => 'post']) !!}

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div>
                                            {!! Form::label('title', 'Title', ['class' => 'form-label']) !!}
                                            {!! Form::text('title', null, ['class' => 'form-control', 'required',"placeholder" => "Title"]) !!}
                                        </div>

                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-4">


                                        <div class="ckeditor-classic mb-4" id="ckeditor-classic">

                                        </div>


                                    </div>
                                </div>

                                <div class="text-start mb-4">
                                    {!! Form::submit('Submit', ['class' => 'btn btn-success w-sm float-right', 'id' => "submit"]); !!}
                                </div>


                                    {!! Form::close() !!}
                        </div>


                            <!-- Terms and Conditions Tab -->
                            <div class="tab-pane fade" id="terms-and-condition" role="tabpanel" aria-labelledby="terms-and-condition-tab">
                                {!! Form::open(['route' => 'general-information.store', 'method' => 'post']) !!}

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div>
                                                {!! Form::label('title', 'Title', ['class' => 'form-label']) !!}
                                            {!! Form::text('title', null, ['class' => 'form-control', 'required',"placeholder" => "Title"]) !!}
                                            </div>

                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-4">


                                            <div class="ckeditor-classic mb-4" id="ckeditor-classic">

                                            </div>


                                        </div>
                                    </div>

                                    <div class="text-start mb-4">
                                        {!! Form::submit('Submit', ['class' => 'btn btn-success w-sm float-right', 'id' => "submit"]); !!}
                                    </div>


                                        {!! Form::close() !!}
                            </div>

                            <!-- Privacy Policy Tab -->
                            <div class="tab-pane fade" id="privacy-policy" role="tabpanel" aria-labelledby="privacy-policy-tab">
                                {!! Form::open(['route' => 'general-information.store', 'method' => 'post']) !!}

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div>
                                                {!! Form::label('title', 'Title', ['class' => 'form-label']) !!}
                                            {!! Form::text('title', null, ['class' => 'form-control', 'required',"placeholder" => "Title"]) !!}
                                            </div>

                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-4">


                                            <div class="ckeditor-classic mb-4" id="ckeditor-classic">

                                            </div>


                                        </div>
                                    </div>

                                    <div class="text-start mb-4">
                                        {!! Form::submit('Submit', ['class' => 'btn btn-success w-sm float-right', 'id' => "submit"]); !!}
                                    </div>


                                        {!! Form::close() !!}
                            </div>

                            <!-- Social Links Tab -->
                            <div class="tab-pane fade" id="social-links" role="tabpanel" aria-labelledby="social-links-tab">
                                Add your content for the Social Links tab here -->
                            </div>

                            <!-- App Link Tab -->
                            <div class="tab-pane fade" id="app-link" role="tabpanel" aria-labelledby="app-link-tab">
                                {!! Form::open(['route' => 'general-information.store', 'method' => 'post']) !!}

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div>
                                            {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
                                            {!! Form::text('name', null, ['class' => 'form-control', 'required',"placeholder" => "Name"]) !!}
                                        </div>

                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="text-start mb-4">
                                    {!! Form::submit('Submit', ['class' => 'btn btn-success w-sm float-right', 'id' => "submit"]); !!}
                                </div>


                                {!! Form::close() !!}
                            </div>

                            <!-- App Version Tab -->
                            <div class="tab-pane fade" id="app-version" role="tabpanel" aria-labelledby="app-version-tab">
                                Add your content for the App Version tab here -->
                            </div>

                            <!-- Delivery And Return Policy Tab -->
                            <div class="tab-pane fade" id="delivery-return-policy" role="tabpanel" aria-labelledby="delivery-return-policy-tab">
                                Add your content for the Delivery And Return Policy tab here -->
                            </div>

                            <!-- Coupons T&C Tab -->
                            <div class="tab-pane fade" id="coupons-tc" role="tabpanel" aria-labelledby="coupons-tc-tab">
                                Add your content for the Coupons T&C tab here -->
                            </div>

                            <!-- Delivery Charges Tab -->
                            <div class="tab-pane fade" id="delivery-charges" role="tabpanel" aria-labelledby="delivery-charges-tab">
                                Add your content for the Delivery Charges tab here -->
                            </div>

                            <!-- Billing Details Tab -->
                            <div class="tab-pane fade" id="billing-details" role="tabpanel" aria-labelledby="billing-details-tab">
                                Add your content for the Billing Details tab here -->
                            </div>
                        </div>
                    </div><!--  end col -->
                </div><!--end row-->
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!--end col-->

</div><!--end row-->

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="live-preview">
                    {!! Form::open(['route' => 'general-information.store', 'method' => 'post']) !!}

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div>
                                {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'required',"placeholder" => "Name"]) !!}
                            </div>

                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-4">


                            <div class="ckeditor-classic mb-4" id="ckeditor-classic">

                            </div>
                           <!-- <div id="editor"></div> -->
                            <div>
                                {!! Form::label('description', 'Description', ['class' => 'form-label']) !!}
                                {!! Form::text('description', "", ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="text-start mb-4">
                        {!! Form::submit('Create', ['class' => 'btn btn-success w-sm', 'id' => "submit"]); !!}
                    </div>


                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
<script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );

            ClassicEditor
            .create(document.querySelector('#ckeditor-classic'))
            .then(function (editor) {
                editor.ui.view.editable.element.style.height = '200px';
            })
            .catch(function (error) {
                console.error(error);
            });
    </script>
{{-- <script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script> --}}
{{-- <script src="{{ URL::asset('build/js/pages/ecommerce-product-create.init.js') }}"></script> --}}

<script src="{{ URL::asset('build/js/app.js') }}"></script>



@endsection



