@extends('layouts.admin')

@section('content')

<div class="bg-white p-6 rounded shadow max-w-3xl">

    <h2 class="mb-4 font-semibold">Website Settings</h2>

    <form method="POST" enctype="multipart/form-data"
          action="{{ route('admin.settings.update') }}">
        @csrf

        {{-- BASIC --}}
        <input type="text" name="site_name" placeholder="Site Name"
               value="{{ $setting->site_name ?? '' }}"
               class="w-full mb-3 border p-2">

        <input type="text" name="phone" placeholder="Phone"
               value="{{ $setting->phone ?? '' }}"
               class="w-full mb-3 border p-2">

        <input type="email" name="email" placeholder="Email"
               value="{{ $setting->email ?? '' }}"
               class="w-full mb-3 border p-2">

        <textarea name="address" placeholder="Address"
                  class="w-full mb-3 border p-2">{{ $setting->address ?? '' }}</textarea>

        {{-- SOCIAL --}}
        <h3 class="font-semibold mt-4">Social Links</h3>

        <input type="text" name="facebook" placeholder="Facebook URL"
               value="{{ $setting->facebook ?? '' }}" class="w-full mb-2 border p-2">

        <input type="text" name="instagram" placeholder="Instagram URL"
               value="{{ $setting->instagram ?? '' }}" class="w-full mb-2 border p-2">

        <input type="text" name="youtube" placeholder="YouTube URL"
               value="{{ $setting->youtube ?? '' }}" class="w-full mb-2 border p-2">

        <input type="text" name="twitter" placeholder="Twitter URL"
               value="{{ $setting->twitter ?? '' }}" class="w-full mb-2 border p-2">

        <input type="text" name="linkedin" placeholder="LinkedIn URL"
               value="{{ $setting->linkedin ?? '' }}" class="w-full mb-2 border p-2">

        <input type="text" name="whatsapp" placeholder="WhatsApp Number"
               value="{{ $setting->whatsapp ?? '' }}" class="w-full mb-3 border p-2">

        {{-- SEO --}}
        <h3 class="font-semibold mt-4">SEO</h3>

        <input type="text" name="meta_title"
               value="{{ $setting->meta_title ?? '' }}"
               placeholder="Meta Title"
               class="w-full mb-3 border p-2">

        <textarea name="meta_description"
                  class="w-full mb-3 border p-2"
                  placeholder="Meta Description">{{ $setting->meta_description ?? '' }}</textarea>

        {{-- FOOTER --}}
        <textarea name="footer_text"
                  class="w-full mb-3 border p-2"
                  placeholder="Footer Text">{{ $setting->footer_text ?? '' }}</textarea>

        {{-- LOGO --}}
        <label>Logo</label>
        <input type="file" name="logo" class="mb-3">

        {{-- FAVICON --}}
        <label>Favicon</label>
        <input type="file" name="favicon" class="mb-3">

        <button class="bg-blue-600 text-white px-4 py-2">Save</button>

    </form>

</div>

@endsection