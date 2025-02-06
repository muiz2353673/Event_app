<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Event Management App</title>
    <style>
        /* Base Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: #333;
            color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
            margin-right: 15px;
            font-size: 18px;
        }
        .navbar a:hover {
            color: #ff9a9e;
        }

        /* Header */
        .header {
            text-align: center;
            padding: 50px 20px;
            color: #fff;
        }
        .header h1 {
            font-size: 3em;
        }

        /* Sections */
        .section {
            margin: 20px;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .section h2 {
            color: #333;
        }

        /* Buttons */
        button, .link-button {
            display: inline-block;
            padding: 10px 20px;
            background: linear-gradient(45deg, #ff758c, #ff7eb3);
            color: #fff;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover, .link-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(255, 117, 140, 0.5);
        }
        .link-button {
            text-decoration: none;
        }
        .btn-danger {
            background: red;
        }

        /* Pagination Styles */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0;
            animation: fadeIn 1s ease-in-out;
        }

        .pagination .page-item {
            margin: 0 5px;
        }

        .pagination .page-link {
            display: inline-block;
            padding: 10px 15px;
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .pagination .page-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(37, 117, 252, 0.5);
        }

        .pagination .active .page-link {
            background: linear-gradient(45deg, #ff758c, #ff7eb3);
            box-shadow: 0 5px 15px rgba(255, 117, 140, 0.5);
        }

        
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div>Welcome, {{ Auth::user()->name }}</div>
        <div>
            <a href="#events">Events</a>
            <a href="#profile">Profile</a>
            <!-- "View All Events" Button -->
            <a href="{{ route('events.index') }}" class="link-button">View All Events</a>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn">Logout</button>
            </form>
        </div>
    </div>

    <!-- Header -->
    <div class="header">
        <h1>Welcome to the Event Management App</h1>
        <p>Manage your events with style!</p>
    </div>

    <!-- Events Section -->
    <div id="events" class="section">
        <h2>All Events</h2>
        <form action="{{ route('events.index') }}" method="GET" style="margin-bottom: 20px;">
            <input type="text" name="search" placeholder="Search events..." value="{{ request('search') }}" style="padding: 10px;">
            <button type="submit" class="btn">Search</button>
        </form>
        <a href="{{ route('events.create') }}" class="link-button">Add New Event</a>
        
        @if ($events->isEmpty())
            <p>No events found.</p>
        @else
            @foreach ($events as $event)
                <div class="section">
                    <h3>{{ $event->event_name }}</h3>
                    <p>{{ $event->description }}</p>
                    <p><strong>Date:</strong> {{ $event->event_date }}</p>
                    <p><strong>Location:</strong> {{ $event->location }}</p>
                    <p><strong>Created By:</strong> {{ $event->user->name }}</p>

                    <!-- Conditional Edit/Delete for Owner -->
                    @if ($event->user_id === auth()->id())
                        <a href="{{ route('events.edit', $event) }}" class="link-button">Edit</a>
                        <form action="{{ route('events.destroy', $event) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger">Delete</button>
                        </form>
                    @endif
                </div>
            @endforeach
            <div class="pagination">
        {{ $events->links('pagination::bootstrap-4') }}
    </div>
        @endif
    </div>

    <!-- Profile Section -->
    <div id="profile" class="section">
        <h2>Your Profile</h2>
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            <input type="text" name="name" value="{{ Auth::user()->name }}" placeholder="Your Name" style="padding: 10px; width: 100%; margin-bottom: 10px;">
            <input type="email" name="email" value="{{ Auth::user()->email }}" placeholder="Your Email" style="padding: 10px; width: 100%; margin-bottom: 10px;">
            <button type="submit" class="btn">Update Profile</button>
        </form>
    </div>

</body>
</html>
