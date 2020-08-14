@extends(activeTemplate() .'layouts.app')
@section('style')

@stop
@section('content')

    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body text-center border-bottom">
                    @if(Auth::user()->image)
                    
                    <img src="{{ get_image(config('constants.user.profile.path') .'/'. Auth::user()->image) }}"
                         alt="profile-image" class="user-image">
                    @else
                    <img src="data:image/png;base64,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"
                         alt="profile-image" class="user-image">
                    @endif
                    
                    <h5 class="card-title mt-3">{{ Auth::user()->name }}</h5>
                </div>
                <div class="card-body">
                    <p class="clearfix">
                        <span class="float-left">@lang('Username')</span>
                        <span class="float-right font-weight-bold"><a
                                href="{{ route('admin.users.detail', Auth::user()->id) }}">{{ Auth::user()->username }}</a></span>
                    </p>
                    <p class="clearfix">
                        <span class="float-left">@lang('E-mail')</span>
                        <span class="float-right text-muted">{{ Auth::user()->email }}</span>
                    </p>
                    <p class="clearfix">
                        <span class="float-left">@lang('Phone')</span>
                        <span class="float-right text-muted">{{ Auth::user()->mobile ?: 'Not available'}}</span>
                    </p>
                    <p class="clearfix">
                        <span class="float-left">@lang('Balance')</span>
                        <span
                            class="float-right text-muted">{{ $general->cur_sym }}{{ formatter_money(Auth::user()->balance) }}</span>
                    </p>


                    @if(auth()->user()->ref_id != 0)
                        <p class="clearfix">
                            <span class="float-left">@lang('Referred By')</span>
                            <span class="float-right text-muted">

                            <span
                                class="badge badge-pill badge-info">{{ \App\User::find(auth()->user()->ref_id)->fullname }}</span>
                    </span>
                        </p>
                    @endif

                    @if(auth()->user()->position_id != 0)
                        <p class="clearfix">
                            <span class="float-left">@lang('Position Under')</span>
                            <span class="float-right text-muted">

                                <span
                                    class="badge badge-pill badge-info">{{ \App\User::find(auth()->user()->position_id)->fullname }}</span>


                    </span>
                        </p>
                    @endif

                    <p class="clearfix">
                        <span class="float-left">@lang('Status')</span>
                        <span class="float-right text-muted">
                        @switch(Auth::user()->status)
                                @case(1)
                                <span class="badge badge-pill badge-success">@lang('Active')</span>
                                @break
                                @case(2)
                                <span class="badge badge-pill badge-danger">@lang('Banned')</span>
                                @break
                            @endswitch
                    </span>
                    </p>

                </div>
            </div>

        </div>
        <div class="col-lg-8 col-md-8">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                        <li class="nav-item open">
                            <a href="#0" data-target="#edit" data-toggle="pill" class="nav-link active"><i
                                    class="fa fa-pencil-square-o"></i> <span class="hidden-xs">Edit</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="#0" data-target="#messages" data-toggle="pill" class="nav-link"><i
                                    class="fa fa-key"></i> <span class="hidden-xs">Change Password</span></a>
                        </li>

                    </ul>
                    <div class="tab-content p-3">
                        <div class="tab-pane active" id="edit">

                            <form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('First Name') <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text" name="firstname"
                                                       value="{{ auth()->user()->firstname }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('Last Name') <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text" name="lastname"
                                                       value="{{ auth()->user()->lastname }}" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('Email') <span class="text-danger">*</span></label>
                                                <input class="form-control" type="email"
                                                       value="{{ auth()->user()->email }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('Phone') </label>
                                                <input class="form-control" type="text" name="mobile"
                                                       value="{{ auth()->user()->mobile }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>@lang('Profile Picture') </label>
                                                <input class="form-control" type="file" name="image">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label>@lang('Address')</label>
                                        <br>
                                        <small>@lang('Street')</small>
                                        <input class="form-control" type="text"
                                               value="{{ auth()->user()->address->address }}" name="address"
                                               placeholder="Street">
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-lg-3">
                                            <small>@lang('City')</small>
                                            <input class="form-control" type="text"
                                                   value="{{ auth()->user()->address->city }}" name="city"
                                                   placeholder="City">
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <small>@lang('State')</small>
                                            <input class="form-control" type="text"
                                                   value="{{ auth()->user()->address->state }}" name="state"
                                                   placeholder="State">
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <small>@lang('Zip/Postal')</small>
                                            <input class="form-control" type="text"
                                                   value="{{ auth()->user()->address->zip }}" name="zip"
                                                   placeholder="Zip/Postal">
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <small>@lang('Country')</small>
                                            <select name="country"
                                                    class="form-control"> @include('partials.country') </select>
                                        </div>
                                    </div>


                                </div>
                                <div class="card-footer">
                                    <div class="form-group row">
                                        <div class="col-lg-12 text-center">
                                            <input type="submit" class="btn btn-block btn-primary mt-2"
                                                   value="@lang('Save Changes')">
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="tab-pane" id="messages">

                            <form action="{{route('user.password.update')}}" method="post">
                                @csrf
                                @method('put')
                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 col-form-label form-control-label">@lang('Current Password')</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="current" type="password" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 col-form-label form-control-label">@lang('New Password')</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="password" type="password" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 col-form-label form-control-label">@lang('Confirm Password')</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="password_confirmation" type="password"
                                               required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="@lang('Cancel')">
                                        <input type="submit" class="btn btn-primary" value="@lang('Save Changes')">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection


@push('style')
    <style>
        .user-image {
            width: 200px;
            height: 200px;
        }
    </style>

    <script>
        $("select[name=country]").val("{{ Auth::user()->address->country }}");
    </script>

@endpush
