@extends('layouts.app')

@section('content')
    <style>
        /* Base Styles */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
            background-size: 300% 300%;
            animation: gradientBG 6s ease infinite;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 3em;
            margin: 20px 0;
            animation: fadeInDown 1s ease;
        }

        .search-form {
            text-align: center;
            margin-bottom: 30px;
            animation: fadeIn 1s ease-in-out;
        }

        .search-form input {
            padding: 10px;
            width: 300px;
            border: 2px solid #ff758c;
            border-radius: 5px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .search-form input:focus {
            outline: none;
            border-color: #fc5c7d;
            box-shadow: 0 4px 15px rgba(252, 92, 125, 0.3);
        }

        .search-form button {
            padding: 10px 20px;
            background: linear-gradient(45deg, #36d1dc, #5b86e5);
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .search-form button:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(91, 134, 229, 0.5);
        }

        .event-card {
            background: #fff;
            padding: 20px;
            margin: 20px auto;
            border-radius: 10px;
            max-width: 600px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 1s ease;
        }

        .event-card h2 {
            color: #333;
            margin-bottom: 10px;
        }

        .event-card p {
            margin-bottom: 10px;
            color: #666;
        }

        .event-card a, .event-card button {
            display: inline-block;
            padding: 10px 15px;
            margin-right: 5px;
            background: linear-gradient(45deg, #ff758c, #ff7eb3);
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .event-card a:hover, .event-card button:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(255, 117, 140, 0.5);
        }

        .btn-danger {
            background: linear-gradient(45deg, #ff5f6d, #ffc371);
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

        /* Animations */
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

    <h1>Event List</h1>

    <!-- Search Form -->
    <div class="search-form">
        <form action="{{ route('events.index') }}" method="GET">
            <input type="text" name="search" placeholder="Search events..." value="{{ request('search') }}">
            <button type="submit">Search</button>
        </form>
    </div>

    <!-- Event Cards -->
    @foreach ($events as $event)
        <div class="event-card">
            <h2>{{ $event->event_name }}</h2>
            <p><strong>Date:</strong> {{ $event->event_date }}</p>
            <p><strong>Location:</strong> {{ $event->location }}</p>
            <p>{{ $event->description }}</p>
            
            <!-- Conditional Buttons for Owner -->
            @if ($event->user_id === auth()->id())
                <a href="{{ route('events.edit', $event) }}">Edit</a>
                <form action="{{ route('events.destroy', $event) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-danger">Delete</button>
                </form>
            @endif
            
        </div>
    @endforeach

    <!-- Dashboard Button -->
    @include('components.dashboard-button')

    <!-- Pagination Links -->
    <div class="pagination">
        {{ $events->links('pagination::bootstrap-4') }}
    </div>
@endsection
