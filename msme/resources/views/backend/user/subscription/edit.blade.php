@extends('backend.user.layouts.app')

@section('styles')
    <link href="{{ asset('msmelist')}}/css/pricing.css" rel="stylesheet">
@endsection

@section('content')

    <div class="row justify-content-between mt-5">
        <div class="col-9">

        </div>
        <div class="col-3 text-right">
            <a href="{{ route('user.subscriptions.index') }}" class="btn btn-info btn-icon-split">
                <span class="text">Go Back</span>
            </a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row bg-white pt-4 pl-3 pr-3 pb-4">
        <div class="col-12">
            @if($subscription->plan->plan_type == \App\Plan::PLAN_TYPE_PAID)
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ __('backend.subscription.switch-plan-help') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif

                <section class="pricing-tables content-area">
                    <div class="container">
                        <!-- Main title -->
                        <div class="main-title text-center">
                            <p>Upgrade your Listings</p>
                        </div>
                        <div class="row">
                            @foreach($all_plans as $key => $plan)
                                <div class="col-sm-12 col-lg-4 col-md-4">
                                    <div class="pricing">
                                        <div class="price-header">
                                            <div class="title">{{ $plan->plan_name }}</div>
                                            <div class="price"><span> ₹ </span>{{$plan->plan_price}}</div>
                                        </div>
                                        <div class="content">
                                            <ul>
                                                <li>Featured Listings: {{ empty($plan->plan_max_featured_listing) ? __('backend.plan.unlimited') : $plan->plan_max_featured_listing }}</li>
                                                <li>
                                                    @if($plan->plan_period == \App\Plan::PLAN_LIFETIME)
                                                        Listing Duration: {{ __('backend.plan.lifetime') }}
                                                    @elseif($plan->plan_period == \App\Plan::PLAN_MONTHLY)
                                                        Listing Duration: {{ __('backend.plan.monthly') }}
                                                    @elseif($plan->plan_period == \App\Plan::PLAN_QUARTERLY)
                                                        Listing Duration: {{ __('backend.plan.quarterly') }}
                                                    @elseif($plan->plan_period == \App\Plan::PLAN_YEARLY)
                                                        Listing Duration: {{ __('backend.plan.yearly') }}
                                                    @endif
                                                </li>
                                                <li>Plan Details: </li>
                                            </ul>
                                            <div class="button">
                                                <form method="POST" action="{{ route('user.razorpay.checkout.do', ['plan_id'=>$plan->id, 'subscription_id'=>$subscription->id]) }}" class="">
                                                    @csrf
                                                    <button class="btn btn-outline pricing-btn"  {{ $subscription->plan->plan_type == \App\Plan::PLAN_TYPE_PAID ? 'disabled' : '' }}>Upgrade Now </button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {

            @if($setting_site_bank_transfer_enable == \App\Setting::SITE_PAYMENT_BANK_TRANSFER_ENABLE)

            $(".bank_transfer_tab").on('shown.bs.tab', function (e) {
                e.target // newly activated tab
                e.relatedTarget // previous active tab

                var data_input_id = $(e.target).attr("data-input-id");

                $("#" + data_input_id).val(e.target.text);
            });

            @endif

        });
    </script>
@endsection
