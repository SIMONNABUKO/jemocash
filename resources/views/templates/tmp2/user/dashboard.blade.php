@extends(activeTemplate() .'layouts.app')

@section('content')

<!--Refferral link section Added by Simon -->

 <div class="row">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title font-weight-normal">@lang('Referral Link')</h4>
                </div>

                <div class="card-body">

                    <form id="copyBoard" >
                        <div class="form-row align-items-center">
                            <div class="col-md-10 my-1">
                                <input value="{{url('/')}}/user/register/{{auth()->user()->username}}" type="url" id="ref" class="form-control from-control-lg" readonly>
                            </div>
                            <div class="col-md-2 my-1">
                                <button   type="button" @click="copyBtnClick" data-copytarget="#ref" id="copybtn" class="btn btn-primary btn-block"> <i class="fa fa-copy"></i> Copy</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
        
        <!--End of Refferral link section Added by Simon -->
        @if(auth()->user()->plan_id < 1)
        <div class='container-fluid' style='background:#fff'>
                 <div class="col-xl-12col-lg-12 col-sm-12 my-3">
            <p style='font-size:medium'>Your account is not active. You are not eligible to earn here. Please deposit <strong>$10</strong> and upgrade your account. After upgrading your account, you will be eligible to earn via referrals.</p>
             <div class="pricingTable-signup">
                        <a class="btn btn-primary" href="/acc/user/plan" >@lang('Upgrade Now')</a>
                    </div>
        </div>
        </div>
        @endif

    <div class="row">
        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice border-radius-5"  data-bg="2ecc71" data-before="27ae60"
                 style="background: #2ecc71; --before-bg-color:#27ae60;">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold">{{$general->cur_sym}}{{formatter_money(Auth::user()->balance)}} </h2>
                    <h4 class="mb-3">@lang('Current Balance')</h4>
                    <a href="{{route('user.deposit.history')}}" class="btn btn-sm btn-neutral">@lang('View all')</a>
                </div>
                <div class="icon">
                    <i class="fa fa-money"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-primary border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold">{{$general->cur_sym}}{{formatter_money($total_deposit)}} </h2>
                    <h4 class="mb-3">@lang('Total Deposit')</h4>
                    <a href="{{route('user.deposit.history')}}" class="btn btn-sm btn-neutral">@lang('View all')</a>
                </div>
                <div class="icon">
                    <i class="fa fa-money"></i>
                </div>
            </div>
        </div>


        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-info border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold">{{$general->cur_sym}}{{formatter_money($total_withdraw)}} </h2>
                    <h4 class="mb-3">@lang('Total Withdraw')</h4>
                    <a href="{{route('user.withdraw')}}" class="btn btn-sm btn-neutral">@lang('View all')</a>
                </div>
                <div class="icon">
                    <i class="fa fa-money"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-warning border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold">{{$general->cur_sym}}{{formatter_money($ref_com)}}</h2>
                    <h4 class="mb-3">@lang('Total Referral Commission')</h4>
                    <a href="{{route('user.level.com')}}" class="btn btn-sm btn-neutral">@lang('View all')</a>
                </div>
                <div class="icon">
                    <i class="fa fa-money"></i>
                </div>
            </div>
        </div>


        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-info border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold">{{$general->cur_sym}}{{formatter_money($level_com)}}</h2>
                    <h4 class="mb-3">@lang('Total Level Commission')</h4>
                    <a href="{{route('user.level.com')}}" class="btn btn-sm btn-neutral">@lang('View all')</a>
                </div>
                <div class="icon">
                    <i class="fa fa-money"></i>
                </div>
            </div>
        </div>


        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-dark border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold">{{$general->cur_sym}}{{formatter_money($total_epin_recharge)}}</h2>
                    <h4 class="mb-3">@lang('Total E-Pin Recharged')</h4>
                    <a href="{{route('user.e_pin.recharge')}}" class="btn btn-sm btn-neutral">@lang('View all')</a>
                </div>
                <div class="icon">
                    <i class="fa fa-cart-plus"></i>
                </div>
            </div>
        </div>


        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-default border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold">{{$general->cur_sym}}{{formatter_money($total_epin_generate)}}</h2>
                    <h4 class="mb-3">@lang('Total E-Pin Generated')</h4>
                    <a href="{{route('user.e_pin.generated')}}" class="btn btn-sm btn-neutral">@lang('View all')</a>
                </div>
                <div class="icon">
                    <i class="fa fa-plus-circle"></i>
                </div>
            </div>
        </div>



        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-blue border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold">{{$general->cur_sym}}{{formatter_money($total_bal_transfer)}}</h2>
                    <h4 class="mb-3">@lang('Total Transferred Balance')</h4>
                    <a href="{{route('user.balance.tf.log')}}" class="btn btn-sm btn-neutral">@lang('View all')</a>
                </div>
                <div class="icon">
                    <i class="fa fa-random"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-red border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold">{{$total_direct_ref}}</h2>
                    <h4 class="mb-3">@lang('Total My Direct Referral')</h4>
                    <a href="{{route('user.ref.index')}}" class="btn btn-sm btn-neutral">@lang('View all')</a>
                </div>
                <div class="icon">
                    <i class="fa fa-sitemap"></i>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('js')
    <script>
        (function() {
            'use strict';
            document.body.addEventListener('click', copy, true);
            function copy(e) {
                var
                    t = e.target,
                    c = t.dataset.copytarget,
                    inp = (c ? document.querySelector(c) : null);
                if (inp && inp.select) {
                    inp.select();
                    try {
                        document.execCommand('copy');
                        inp.blur();
                        t.classList.add('copied');
                        setTimeout(function() { t.classList.remove('copied'); }, 1500);
                    }catch (err) {
                        alert('please press Ctrl/Cmd+C to copy');
                    }
                }
            }
        })();
    </script>
    
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5eb18b67a1bad90e54a1ea8a/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
@endpush
