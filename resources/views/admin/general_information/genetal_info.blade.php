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
                            <a class="nav-link mb-2" id="social-links-tab" data-bs-toggle="pill" href="#social-links" role="tab" aria-controls="social-links" aria-selected="false">Social Links</a>
                            <a class="nav-link mb-2" id="app-link-tab" data-bs-toggle="pill" href="#app-link" role="tab" aria-controls="app-link" aria-selected="false">App Link</a>
                            <a class="nav-link mb-2" id="app-version-tab" data-bs-toggle="pill" href="#app-version" role="tab" aria-controls="app-version" aria-selected="false">App Version</a>
                            <a class="nav-link mb-2" id="delivery-return-policy-tab" data-bs-toggle="pill" href="#delivery-return-policy" role="tab" aria-controls="delivery-return-policy" aria-selected="false">Delivery And Return Policy</a>
                            <a class="nav-link mb-2" id="coupons-tc-tab" data-bs-toggle="pill" href="#coupons-tc" role="tab" aria-controls="coupons-tc" aria-selected="false">Coupons T&C</a>
                            <a class="nav-link mb-2" id="delivery-charges-tab" data-bs-toggle="pill" href="#delivery-charges" role="tab" aria-controls="delivery-charges" aria-selected="false">Delivery Charges</a>
                            <a class="nav-link mb-2" id="billing-details-tab" data-bs-toggle="pill" href="#billing-details" role="tab" aria-controls="billing-details" aria-selected="false">Billing Details</a>
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


                                            <div class="ckeditor-classic mb-4" id="ckeditor-classic1">

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


                                            <div class="ckeditor-classic mb-4" id="ckeditor-classic2">

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
                                {!! Form::open(['route' => 'general-information.store', 'method' => 'post']) !!}

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div>
                                                {!! Form::label('facebook', 'Facebook', ['class' => 'form-label']) !!}
                                                {!! Form::text('facebook', null, ['class' => 'form-control', 'required', 'placeholder' => 'Facebook']) !!}
                                            </div>

                                            @error('facebook')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <div>
                                                {!! Form::label('instagram', 'Instagram', ['class' => 'form-label']) !!}
                                                {!! Form::text('instagram', null, ['class' => 'form-control', 'required', 'placeholder' => 'Instagram']) !!}
                                            </div>

                                            @error('instagram')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <div>
                                                {!! Form::label('twitter', 'Twitter', ['class' => 'form-label']) !!}
                                                {!! Form::text('twitter', null, ['class' => 'form-control', 'required', 'placeholder' => 'Twitter']) !!}
                                            </div>

                                            @error('twitter')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="text-start mb-4">
                                        {!! Form::submit('Submit', ['class' => 'btn btn-success w-sm float-right', 'id' => "submit"]); !!}
                                    </div>


                                {!! Form::close() !!}
                            </div>

                            <!-- App Link Tab -->
                            <div class="tab-pane fade" id="app-link" role="tabpanel" aria-labelledby="app-link-tab">
                                {!! Form::open(['route' => 'general-information.store', 'method' => 'post']) !!}

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div>
                                                {!! Form::label('android', 'Android', ['class' => 'form-label']) !!}
                                                {!! Form::text('android', null, ['class' => 'form-control', 'required', 'placeholder' => 'Android']) !!}
                                            </div>

                                            @error('android')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <div>
                                                {!! Form::label('ios', 'iOS', ['class' => 'form-label']) !!}
                                                {!! Form::text('ios', null, ['class' => 'form-control', 'required', 'placeholder' => 'iOS']) !!}
                                            </div>

                                            @error('ios')
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
                                {!! Form::open(['route' => 'general-information.store', 'method' => 'post']) !!}

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div>
                                                {!! Form::label('android Versions', 'Android Versions', ['class' => 'form-label']) !!}
                                                {!! Form::text('android_version', null, ['class' => 'form-control', 'required', 'placeholder' => 'Android Versions']) !!}
                                            </div>

                                            @error('android')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <div>
                                                {!! Form::label('ios Versions', 'iOS Versions', ['class' => 'form-label']) !!}
                                                {!! Form::text('ios_version', null, ['class' => 'form-control', 'required', 'placeholder' => 'iOS Versions']) !!}
                                            </div>

                                            @error('ios')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-start mb-4">
                                        {!! Form::submit('Submit', ['class' => 'btn btn-success w-sm float-right', 'id' => "submit"]); !!}
                                    </div>


                                {!! Form::close() !!}
                            </div>

                            <!-- Delivery And Return Policy Tab -->
                            <div class="tab-pane fade" id="delivery-return-policy" role="tabpanel" aria-labelledby="delivery-return-policy-tab">
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


                                            <div class="ckeditor-classic mb-4" id="ckeditor-classic4">

                                            </div>


                                        </div>
                                    </div>

                                    <div class="text-start mb-4">
                                        {!! Form::submit('Submit', ['class' => 'btn btn-success w-sm float-right', 'id' => "submit"]); !!}
                                    </div>


                                {!! Form::close() !!}
                            </div>

                            <!-- Coupons T&C Tab -->
                            <div class="tab-pane fade" id="coupons-tc" role="tabpanel" aria-labelledby="coupons-tc-tab">
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


                                            <div class="ckeditor-classic mb-4" id="ckeditor-classic5">

                                            </div>


                                        </div>
                                    </div>

                                    <div class="text-start mb-4">
                                        {!! Form::submit('Submit', ['class' => 'btn btn-success w-sm float-right', 'id' => "submit"]); !!}
                                    </div>


                                {!! Form::close() !!}
                            </div>

                            <!-- Delivery Charges Tab -->
                            <div class="tab-pane fade" id="delivery-charges" role="tabpanel" aria-labelledby="delivery-charges-tab">
                                {!! Form::open(['route' => 'general-information.store', 'method' => 'post']) !!}

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div>
                                                {!! Form::label('delivery_charges', 'Delivery Charges', ['class' => 'form-label']) !!}
                                                {!! Form::text('delivery_charges', null, ['class' => 'form-control', 'required', 'placeholder' => 'Delivery Charges']) !!}
                                            </div>

                                            @error('delivery_charges')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <div>
                                                {!! Form::label('delivery_free_above', 'Delivery Free Above', ['class' => 'form-label']) !!}
                                                {!! Form::text('delivery_free_above', null, ['class' => 'form-control', 'required', 'placeholder' => 'Delivery Free Above']) !!}
                                            </div>

                                            @error('delivery_free_above')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-start mb-4">
                                        {!! Form::submit('Submit', ['class' => 'btn btn-success w-sm float-right', 'id' => "submit"]); !!}
                                    </div>


                                {!! Form::close() !!}
                            </div>

                            <!-- Billing Details Tab -->
                            <div class="tab-pane fade" id="billing-details" role="tabpanel" aria-labelledby="billing-details-tab">
                                {!! Form::open(['route' => 'general-information.store', 'method' => 'post']) !!}

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div>
                                                {!! Form::label('bank_name', 'Bank Name', ['class' => 'form-label']) !!}
                                                {!! Form::text('bank_name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Bank Name']) !!}
                                            </div>

                                            @error('bank_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <div>
                                                {!! Form::label('beneficiary_name', 'Beneficiary Name', ['class' => 'form-label']) !!}
                                                {!! Form::text('beneficiary_name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Beneficiary Name']) !!}
                                            </div>

                                            @error('beneficiary_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <div>
                                                {!! Form::label('account_number', 'Account Number', ['class' => 'form-label']) !!}
                                                {!! Form::text('account_number', null, ['class' => 'form-control', 'required', 'placeholder' => 'Account Number']) !!}
                                            </div>

                                            @error('account_number')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <div>
                                                {!! Form::label('ifsc', 'IFSC', ['class' => 'form-label']) !!}
                                                {!! Form::text('ifsc', null, ['class' => 'form-control', 'required', 'placeholder' => 'IFSC']) !!}
                                            </div>

                                            @error('ifsc')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <div>
                                                {!! Form::label('company_name', 'Company Name', ['class' => 'form-label']) !!}
                                                {!! Form::text('company_name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Company Name']) !!}
                                            </div>

                                            @error('company_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <div>
                                                {!! Form::label('company_address', 'Company Address', ['class' => 'form-label']) !!}
                                                {!! Form::textarea('company_address', null, ['class' => 'form-control', 'required', 'placeholder' => 'Company Address']) !!}
                                            </div>

                                            @error('company_address')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <div>
                                                {!! Form::label('company_phone', 'Company Phone', ['class' => 'form-label']) !!}
                                                {!! Form::text('company_phone', null, ['class' => 'form-control', 'required', 'placeholder' => 'Company Phone']) !!}
                                            </div>

                                            @error('company_phone')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <div>
                                                {!! Form::label('company_email', 'Company Email', ['class' => 'form-label']) !!}
                                                {!! Form::email('company_email', null, ['class' => 'form-control', 'required', 'placeholder' => 'Company Email']) !!}
                                            </div>

                                            @error('company_email')
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
                    </div><!--  end col -->
                </div><!--end row-->
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!--end col-->

</div><!--end row-->


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
            ClassicEditor
            .create(document.querySelector('#ckeditor-classic1'))
            .then(function (editor) {
                editor.ui.view.editable.element.style.height = '200px';
            })
            .catch(function (error) {
                console.error(error);
            });
            ClassicEditor
            .create(document.querySelector('#ckeditor-classic2'))
            .then(function (editor) {
                editor.ui.view.editable.element.style.height = '200px';
            })
            .catch(function (error) {
                console.error(error);
            });
            ClassicEditor
            .create(document.querySelector('#ckeditor-classic3'))
            .then(function (editor) {
                editor.ui.view.editable.element.style.height = '200px';
            })
            .catch(function (error) {
                console.error(error);
            });
            ClassicEditor
            .create(document.querySelector('#ckeditor-classic4'))
            .then(function (editor) {
                editor.ui.view.editable.element.style.height = '200px';
            })
            .catch(function (error) {
                console.error(error);
            });
            ClassicEditor
            .create(document.querySelector('#ckeditor-classic5'))
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



