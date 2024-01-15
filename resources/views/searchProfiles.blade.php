<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <div class="container">
        <div class="mb-4">
            <input type="text" id="searchInput" placeholder="Search users...">
            <button onclick="searchUsers()">Search</button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th style="color: white;">Name</th>
                    <th style="color: white;">Profile</th>
                </tr>
            </thead>
            <tbody>
                @foreach (DB::table('users')->get() as $user)
                    <tr>
                        <td style="color: white;">{{ $user->name }}</td>
                        <td style="color: white;">
                            <a href="{{ route('profile.showUserProfile', ['id' => $user->id]) }}" class="text-blue-500">View Profile</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function searchUsers() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.querySelector(".table");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</x-app-layout>
