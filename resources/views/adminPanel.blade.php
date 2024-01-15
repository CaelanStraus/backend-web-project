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
                        <td style="color: white;">
                            @if(Auth::check())
                                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                    <x-nav-link :href="route('profile.showUserProfile', ['id' => $user->id])">
                                        {{ $user->name }}
                                    </x-nav-link>

                                </div>
                            @endif
                        </td>

                        <td style="color: white;">{{ $user->email }}</td>
                        <td style="color: white;">{{ $user->role }}</td>
                        <td style="color: white;">
                            @if(auth()->user()->id !== $user->id) <!-- Check if the user is not the current authenticated user -->
                                <form id="deleteUserForm-{{ $user->id }}" method="post" action="{{ route('user.destroy', $user->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                                @if(auth()->user()->role === 'admin' && $user->role === 'user')
                                    <form id="promoteUserForm-{{ $user->id }}" method="post" action="{{ route('user.promote', $user->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Promote</button>
                                    </form>
                                @elseif(auth()->user()->role === 'admin' && $user->role === 'admin')
                                    <form id="demoteUserForm-{{ $user->id }}" method="post" action="{{ route('user.demote', $user->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-warning">Demote</button>
                                    </form>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
