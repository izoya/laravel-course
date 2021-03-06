@extends('layouts.admin')

@section('content')
{{-- TITLE --}}
<div class="row">
    <div class="col">
        <h1 class="h1 pb-4">
            @if(empty($feed)) {{ __('pages.admin.addResource') }}
            @else {{ __('pages.admin.editResource') }}
            @endif
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-6">
        {{-- FORM --}}
        <form method="post" enctype="multipart/form-data"
              action="@if(empty($feed)) {{ route('admin.feed.store') }}">
                      @else {{ route('admin.feed.update', $feed) }} "> @method('PUT')
                      @endif
              @csrf
            {{-- title --}}
            <div class="form-group mt-3">
                <label for="title">{{ __('pages.forms.title') }}</label>
                <input type="text" class="form-control" name="title" id="title"
                       value="{{ old('title', optional($feed)->title) }}">
                @error('title') <small class="form-text text-danger">{{ $message }}</small>@enderror
            </div>
            {{-- link --}}
            <div class="form-group">
                <label for="link">{{ __('pages.admin.rssLink') }}</label>
                <input type="text" class="form-control" name="link" id="link"
                       value="{{ old('link', optional($feed)->link) }}" required>
                @error('link') <small class="form-text text-danger">{{ $message }}</small>@enderror
            </div>
            {{-- category --}}
            <div class="form-group">
                <label for="category">{{ __('pages.forms.category') }}</label>
                <input type="text" class="form-control" name="category" id="category"
                       value="{{ old('category', optional($feed)->category) }}" list="cat-list">
                <datalist id="cat-list">
                    @foreach($categories as $cat)
                        <option value="{{ $cat->title }}">{{ $cat->title }}</option>
                    @endforeach
                </datalist>
                @error('category') <small class="form-text text-danger">{{ $message }}</small>@enderror
            </div>
            {{-- submit --}}
            <button type="submit" class="btn btn-primary">
                @if(empty($feed)) {{ __('elements.button.create') }}
                @else {{ __('elements.button.save') }}
                @endif</button>
        </form>
    </div>
</div>
@endsection
