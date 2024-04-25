@props(['route'])

<form {{ $attributes }} class="flex flex-row my-4 space-x-2">
    <input type="search" class="w-full rounded-lg focus:border-primary focus:ring-primary"
        placeholder="{{ __('Search...') }}" name="search">
    <x-primary-button>Search</x-primary-button>
</form>
