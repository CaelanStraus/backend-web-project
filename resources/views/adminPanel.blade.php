<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success" style="color: white;">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th style="color: white;">ID</th>
                    <th style="color: white;">Name</th>
                    <th style="color: white;">Email</th>
                    <th style="color: white;">Role</th>
                    <th style="color: white;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach (DB::table('users')->get() as $user)
                    <tr>
                        <td style="color: white;">{{ $user->id }}</td>
                        <td style="color: white;">{{ $user->name }}</td>
                        <td style="color: white;">{{ $user->email }}</td>
                        <td style="color: white;">{{ $user->role }}</td>
                        <td style="color: white;">
                            @if(auth()->user()->id !== $user->id) <!-- Check if the user is not the current authenticated user -->
                                <form id="deleteUserForm-{{ $user->id }}" method="post" action="{{ route('user.destroy', $user->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
