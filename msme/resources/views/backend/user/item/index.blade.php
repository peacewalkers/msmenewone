@extends('backend.user.layouts.app')

@section('styles')
@endsection

@section('content')

    <div class="row justify-content-between mt-5">
        <div class="col-7">
            <h1 class="h3 mb-2 text-gray-800">Your Business Listings</h1>
        </div>
        <div class="col-5 text-right">
            <a href="{{ route('user.items.create') }}" class="btn btn-info btn-icon-split">
                <span class="text">Add Your Business</span>
            </a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row bg-white pt-4 pl-3 pr-3 pb-4">
        <div class="col-12">


            <div class="row pt-4">
                <div class="col-12" style="font-size: 14px">
                    {{ $items_count . ' ' . __('category_description.records') }}
                </div>
            </div>

            <hr class="mt-1">

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>{{ __('backend.item.feature-image') }}</th>
                                <th>{{ __('backend.category.category') }}</th>
                                <th>{{ __('backend.item.title') }}</th>
                                <th>{{ __('backend.item.address') }}</th>
                                <th>{{ __('backend.city.city') }}</th>
                                <th>{{ __('backend.state.state') }}</th>
                                <th>{{ __('backend.item.status') }}</th>
                                <th>{{ __('backend.item.featured') }}</th>
                                <th>{{ __('backend.shared.action') }}</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>{{ __('backend.item.feature-image') }}</th>
                                <th>{{ __('backend.category.category') }}</th>
                                <th>{{ __('backend.item.title') }}</th>
                                <th>{{ __('backend.item.address') }}</th>
                                <th>{{ __('backend.city.city') }}</th>
                                <th>{{ __('backend.state.state') }}</th>
                                <th>{{ __('backend.item.status') }}</th>
                                <th>{{ __('backend.item.featured') }}</th>
                                <th>{{ __('backend.shared.action') }}</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($items as $key => $item)
                                <tr>
                                    <td>
                                        @if(!empty($item->item_image_tiny))
                                            <img src="{{ Storage::disk('public')->url('item/' . $item->item_image_tiny) }}" alt="Image" class="img-fluid rounded">
                                        @elseif(!empty($item->item_image))
                                            <img src="{{ Storage::disk('public')->url('item/' . $item->item_image) }}" alt="Image" class="img-fluid rounded">
                                        @else
                                            <img src="{{ asset('frontend/images/placeholder/full_item_feature_image_tiny.webp') }}" alt="Image" class="img-fluid rounded">
                                        @endif
                                    </td>
                                    <td>
                                        @foreach($item->allCategories()->get() as $key => $category)
                                            @if($item->allCategories()->get()->count() == $key + 1)
                                                {{ $category->category_name }}
                                            @else
                                                {{ $category->category_name . ", " }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $item->item_title }}</td>
                                    <td>{{ $item->item_address }}</td>
                                    <td>{{ $item->city->city_name }}</td>
                                    <td>{{ $item->state->state_name }}</td>
                                    <td>
                                        @if($item->item_status == \App\Item::ITEM_SUBMITTED)
                                            <span class="text-warning">{{ __('backend.item.submitted') }}</span>
                                        @elseif($item->item_status == \App\Item::ITEM_PUBLISHED)
                                            <span class="text-success">{{ __('backend.item.published') }}</span>
                                        @elseif($item->item_status == \App\Item::ITEM_SUSPENDED)
                                            <span class="text-danger">{{ __('backend.item.suspended') }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->item_featured == 1 ? 'Featured' : '' }}</td>
                                    <td>
                                        <a href="{{ route('user.items.edit', $item->id) }}" class="btn btn-primary btn-circle">
                                            <i class="fas fa-edit" style="font-size: 14px;"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    {{ $items->appends(['category' => $category_id, 'state' => $state_id])->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
        });
    </script>
@endsection
