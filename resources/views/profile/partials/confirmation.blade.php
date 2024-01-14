<x-app-layout>
    <div class="container">
        <h2 style="color: white;">Confirmation Page</h2>

        <p style="color: white;">Are you sure you want to delete this user?</p>

        <form method="post" action="{{ route('user.destroy', $userId) }}">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</x-app-layout>
