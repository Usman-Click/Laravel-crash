@if (session()->has('success'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
        class="bg-laravel px-28 py-4 fixed top-0 left-1/2 text-white">
        {{ session('success') }}
    </div>
@endif
