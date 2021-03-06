@extends(activeTemplate() .'layouts.app')



@section('content')

    <div class="row">
        @foreach($plans as $data)
            <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                <div class="pricingTable">
                    <div class="pricingTable-header">
                        <h3 class="title">@lang($data->name)</h3>
                    </div>
                    <div class="price-value">
                        <span class="currency">{{$general->cur_sym}}</span>
                        <span class="amount">{{$data->price}}</span>
                    </div>
                    <div class="price-body text-center">
                        <ul class="margin-bottom-30">
                            <li>
                                <h4 class="pb-3"> @lang('Direct Referral Bonus') </h4>
                                <h5> {{$general->cur_sym}}{{$data->ref_bonus}} <span
                                            class='sec-color'> @lang('No Limit!')</span> </h5>
                               </li>
                            

                           

                        </ul>
                    </div>

                    <div class="pricingTable-signup">
                        <a href="#confBuyModal{{$data->id}}" data-toggle="modal">@lang('Subscribe Now')</a>
                    </div>
                </div>
            </div>

                    <div class="modal fade" id="confBuyModal{{$data->id}}" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel"> @lang('Confirm Subscription '.$data->name)?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <h5 class="text-danger text-center">{{__($data->price)}} {{$general->cur_text}} @lang('will subtract from your balance')</h5>
                        </div>
                        <form method="post" action="{{route('user.plan.purchase')}}">
                            @csrf
                            <div class="modal-footer">
                                <button type="submit" name="plan_id" value="{{$data->id}}"
                                        class="btn btn-primary bold uppercase"><i
                                            class="fa fa-send"></i> @lang('Subscribe')</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                            class="fa fa-times"></i> @lang('Close')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        @endforeach
    </div>


@endsection


@push('style')

@endpush
