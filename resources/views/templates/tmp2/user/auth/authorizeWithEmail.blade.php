@extends(activeTemplate().'layouts.user-master')

@section('panel')


    <div class="signin-section pt-5" >
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-4 col-md-6 col-sm-8">
<!--//User not banned-->
                 @if($user)
                 
                 @if($user->ev)
                 <p>Verification successful!</p>
                 
                 @endif
                 @endif
                  

                </div>

            </div>
        </div>
    </div>
@endsection


@push('style-lib')
    <link rel="stylesheet" href="{{asset(activeTemplate(true) .'users/css/signin.css')}}"/>
    <link rel="stylesheet" href="{{asset(activeTemplate(true) .'users/css/bootstrap-pincode-input.css')}}"/>
@endpush

@push('script-lib')
    <script src="{{asset(activeTemplate(true) .'users/js/bootstrap-pincode-input.js')}}"></script>
@endpush

@push('style')
    <style>

        .pincode-input-container{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pincode-input-container .pincode-input-text {
            margin-left: 5px;
            text-align: center;
            font-weight: 600;
            font-size: 18px;
            background: #00000030;
            border: 1px solid #6670ec;
            color: #d4d4d4;
            width: 45px !important;
        }
        .login-area .login-form .frm-grp input {
            padding:inherit;

        }
        .pincode-input-text, .form-control.pincode-input-text {
            width: 50px;
            height: 60px !important;
        }
    </style>
@endpush





