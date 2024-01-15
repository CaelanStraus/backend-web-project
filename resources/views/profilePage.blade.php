<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="mb-0">{{ $user->name }}</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <p class="form-control-static">{{ $user->email }}</p>
                        </div>
                        <div class="form-group">
                            <label for="role">Role:</label>
                            <p class="form-control-static">{{ $user->role }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
