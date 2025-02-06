<h1>User List</h1>
<a href="{{ route('users.create') }}">Create New User</a>
<ul>
    @foreach ($users as $user)
        <li>{{ $user->name }} ({{ $user->email }})
            <a href="{{ route('users.edit', $user->id) }}">Edit</a>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
