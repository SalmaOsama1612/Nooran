@extends('layouts.master')

@section('content')

<section class="structure-section">

    <div class="structure-container">

        <div class="structure-heading">
            <span>جمعية نوران التعليمية</span>
            <h1>الهيكل التنظيمي</h1>
            <div class="structure-line"></div>
        </div>

        @php
            $roots = $structures->whereNull('parent_id')->sortBy('sort_order');
        @endphp

        <div class="organization-chart">

            @foreach($roots as $root)

                <div class="structure-level">

                    <div class="structure-box structure-main">
                        @if($root->image)
                            <img src="{{ asset('storage/' . $root->image) }}" alt="{{ $root->name }}">
                        @endif

                        <strong>{{ $root->name }}</strong>

                        @if($root->position)
                            <span>{{ $root->position }}</span>
                        @endif
                    </div>

                </div>

                @php
                    $children = $structures
                        ->where('parent_id', $root->id)
                        ->sortBy('sort_order');
                @endphp

                @if($children->count())

                    <div class="structure-connector"></div>

                    <div class="structure-level structure-children">

                        @foreach($children as $child)

                            <div class="structure-item">

                                <div class="structure-box">

                                    @if($child->image)
                                        <img src="{{ asset('storage/' . $child->image) }}" alt="{{ $child->name }}">
                                    @endif

                                    <strong>{{ $child->name }}</strong>

                                    @if($child->position)
                                        <span>{{ $child->position }}</span>
                                    @endif

                                </div>

                                @php
                                    $grandChildren = $structures
                                        ->where('parent_id', $child->id)
                                        ->sortBy('sort_order');
                                @endphp

                                @if($grandChildren->count())

                                    <div class="structure-connector"></div>

                                    <div class="structure-subchildren">

                                        @foreach($grandChildren as $grandChild)

                                            <div class="structure-box">

                                                @if($grandChild->image)
                                                    <img src="{{ asset('storage/' . $grandChild->image) }}" alt="{{ $grandChild->name }}">
                                                @endif

                                                <strong>{{ $grandChild->name }}</strong>

                                                @if($grandChild->position)
                                                    <span>{{ $grandChild->position }}</span>
                                                @endif

                                            </div>

                                        @endforeach

                                    </div>

                                @endif

                            </div>

                        @endforeach

                    </div>

                @endif

            @endforeach

        </div>

    </div>

</section>

@endsection