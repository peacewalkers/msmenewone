@extends('backend.user.layouts.app')

@section('styles')
    <!-- Custom styles for this page -->
    <link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/plan-details.css') }}" rel="stylesheet">
@endsection

@section('content')

    @if($paid_subscription_days_left == 1)
        <div class="alert alert-warning" role="alert">
            {{ __('backend.subscription.subscription-end-soon-day') }}
        </div>
    @elseif($paid_subscription_days_left > 1 && $paid_subscription_days_left <= \App\Subscription::PAID_SUBSCRIPTION_LEFT_DAYS)
        <div class="alert alert-warning" role="alert">
            {{ __('backend.subscription.subscription-end-soon-days', ['days_left' => $paid_subscription_days_left]) }}
        </div>
    @endif

    <div class="row justify-content-between mt-5">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800">Listing Subscriptions</h1>
        </div>
        <div class="col-3 text-right">
            <a href="{{ route('user.subscriptions.edit', $subscription->id) }}" class="btn btn-info btn-icon-split">

                <span class="text">Buy Premium Listings</span>
            </a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row bg-white pt-4 pl-3 pr-3 pb-4">
        <div class="col-12">

            <div class="row mb-4">
                <div class="col-6">
                    <div class="row mb-3">
                        <div class="col-12">
                            <span class="text-gray-800">{{ __('backend.plan.plan-info') }}</span>
                        </div>
                    </div>
                    <div class="row plan-head">
                        <div class="col-4">
                            <span> Plan Name:
                                </span>
                        </div>
                        <div class="col-8">
                            <span> {{ $subscription->plan->plan_name }}</span>
                        </div>
                    </div>
                    <div class="row plan-head">
                        <div class="col-4">
                            <span> Plan Type:</span>
                        </div>
                        <div class="col-8">
                            @if($subscription->plan->plan_type == \App\Plan::PLAN_TYPE_FREE)
                                <span>Free Plan</span>
                            @else
                                <span> {{ __('backend.plan.paid-plan') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row plan-head">
                        <div class="col-4">
                           <span>  {{ __('backend.plan.features') }}:</span>
                        </div>
                        <div class="col-8">
                            <span>   {{ $subscription->plan->plan_features }}</span>
                        </div>
                    </div>
                    <div class="row plan-head">
                        <div class="col-4">
                           <span>  {{ __('backend.plan.price') }}:</span>
                        </div>
                        <div class="col-8">
                            <span>  {{ $subscription->plan->plan_price }}</span>
                        </div>
                    </div>
                    <div class="row plan-head">
                        <div class="col-4">
                           <span>  {{ __('backend.plan.period') }}:</span>
                        </div>
                        <div class="col-8">
                            @if($subscription->plan->plan_period == \App\Plan::PLAN_LIFETIME)
                                <span>  {{ __('backend.plan.lifetime') }}</span>
                            @elseif($subscription->plan->plan_period == \App\Plan::PLAN_MONTHLY)
                                        <span>   {{ __('backend.plan.monthly') }}</span>
                            @elseif($subscription->plan->plan_period == \App\Plan::PLAN_QUARTERLY)
                                                <span>  {{ __('backend.plan.quarterly') }}</span>
                            @elseif($subscription->plan->plan_period == \App\Plan::PLAN_YEARLY)
                                                        <span>   {{ __('backend.plan.yearly') }} </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="row mb-3">
                        <div class="col-12">
                            <span class="text-gray-800">{{ __('backend.subscription.subscription') }}</span>
                        </div>
                    </div>
                    <div class="row plan-head">
                        <div class="col-5">
                          <span>  {{ __('backend.plan.maximum-featured-listing') }}: </span>
                        </div>
                        <div class="col-7">
                            <span>  {{ $subscription->subscription_max_featured_listing >= 0 ? $subscription->subscription_max_featured_listing : __('backend.plan.unlimited') }} </span>
                        </div>
                    </div>
                    <div class="row plan-head">
                        <div class="col-5">
                            <span>{{ __('backend.subscription.started-at') }}: </span>
                        </div>
                        <div class="col-7">
                            <span>{{ $subscription->subscription_start_date }} </span>
                        </div>
                    </div>
                    <div class="row plan-head">
                        <div class="col-5">
                            <span>{{ __('backend.subscription.end-at') }}: </span>
                        </div>
                        <div class="col-7">
                            <span> {{ $subscription->subscription_end_date }} </span>
                        </div>
                    </div>
                    @if($subscription->plan->plan_type == \App\Plan::PLAN_TYPE_PAID)
                    <div class="row mt-3">
                        <div class="col-12">

                            @if($subscription->subscription_pay_method == \App\Subscription::PAY_METHOD_RAZORPAY)
                                <form method="POST" action="{{ route('user.razorpay.recurring.cancel') }}">
                                    @csrf
                                    <input type="hidden" name="subscription_id" value="{{ $subscription->id }}">
                                    <button type="submit" class="btn btn-danger text-white">
                                        {{ __('backend.subscription.cancel-subscription') }}
                                    </button>
                                    <small class="form-text text-muted">
                                        {{ __('backend.subscription.cancel-subscription-help') }}
                                    </small>
                                </form>
                            @elseif($subscription->subscription_pay_method == \App\Subscription::PAY_METHOD_STRIPE)
                                <form method="POST" action="{{ route('user.stripe.recurring.cancel') }}">
                                    @csrf
                                    <input type="hidden" name="subscription_id" value="{{ $subscription->id }}">
                                    <button type="submit" class="btn btn-danger text-white">
                                        {{ __('backend.subscription.cancel-subscription') }}
                                    </button>
                                    <small class="form-text text-muted">
                                        {{ __('backend.subscription.cancel-subscription-help') }}
                                    </small>
                                </form>
                            @elseif($subscription->subscription_pay_method == \App\Subscription::PAY_METHOD_BANK_TRANSFER)
                                <form method="POST" action="{{ route('user.banktransfer.recurring.cancel') }}">
                                    @csrf
                                    <input type="hidden" name="subscription_id" value="{{ $subscription->id }}">
                                    <button type="submit" class="btn btn-danger text-white">
                                        {{ __('backend.subscription.cancel-subscription') }}
                                    </button>
                                    <small class="form-text text-muted">
                                        {{ __('backend.subscription.cancel-subscription-help') }}
                                    </small>
                                </form>
                            @else
                                <form method="POST" action="{{ route('user.paypal.recurring.cancel') }}">
                                    @csrf
                                    <input type="hidden" name="subscription_id" value="{{ $subscription->id }}">
                                    <button type="submit" class="btn btn-danger text-white">
                                        {{ __('backend.subscription.cancel-subscription') }}
                                    </button>
                                    <small class="form-text text-muted">
                                        {{ __('backend.subscription.cancel-subscription-help') }}
                                    </small>
                                </form>
                            @endif

                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <hr/>
            <div class="row mb-4">
                <div class="col-12">
                    <div class="row mb-3">
                        <div class="col-12">
                            <span class="text-gray-800">Invoices</span>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>{{ __('backend.subscription.invoice-num') }}</th>
                                            <th>{{ __('backend.subscription.title') }}</th>
                                            <th>{{ __('backend.subscription.description') }}</th>
                                            <th>{{ __('backend.subscription.amount') }}</th>
                                            <th>{{ __('backend.subscription.status') }}</th>
                                            <th>{{ __('backend.subscription.date') }}</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>{{ __('backend.subscription.invoice-num') }}</th>
                                            <th>{{ __('backend.subscription.title') }}</th>
                                            <th>{{ __('backend.subscription.description') }}</th>
                                            <th>{{ __('backend.subscription.amount') }}</th>
                                            <th>{{ __('backend.subscription.status') }}</th>
                                            <th>{{ __('backend.subscription.date') }}</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($invoices as $key => $invoice)
                                            <tr>
                                                <td>{{ $invoice->invoice_num }}</td>
                                                <td>{{ $invoice->invoice_item_title }}</td>
                                                <td>{{ $invoice->invoice_item_description }}</td>
                                                <td>{{ $invoice->invoice_amount }}</td>
                                                <td>{{ $invoice->invoice_status }}</td>
                                                <td>{{ $invoice->created_at }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                </div>

            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endsection
