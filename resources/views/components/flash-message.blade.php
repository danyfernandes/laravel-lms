@if (session()->has('message'))
    <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
        <div class="fixed top-1 left-1/2 transform -translate-x-1/2 text-green-600 bg-green-200 rounded-xl p-3">
            {{ session('message') }}
        </div>
    </div>
@endif
