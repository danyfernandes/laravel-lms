<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>
    </header>

    <form method="post" action="{{ route('admin.users.destroy', $user->id) }}">
        @csrf
        @method('delete')
        <x-danger-button>{{ __('Delete Account') }}</x-danger-button>
    </form>
</section>
