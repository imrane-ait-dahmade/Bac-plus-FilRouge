@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-900 text-white">
        <div class="container mx-auto px-4 py-8">
            <!-- Hero Section -->
            <section class="py-16 px-8 text-center rounded-lg mb-8 border-l-4 border-blue-500 bg-gray-800">
                <h1 class="text-4xl font-bold text-white mb-4">Find the Best School for You</h1>
                <p class="text-xl text-gray-300 mb-6">Explore our recommendations and make an informed decision.</p>
                <a href="{{ url('auth/login') }}">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300 shadow-lg">
                        Get Started
                    </button>
                </a>
            </section>

            <!-- Featured Schools -->
            <section class="mt-12">
                <h2 class="text-3xl font-bold text-white mb-8 text-center">Featured Schools</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach(range(1, 3) as $i)
                        <div class="bg-gray-800 border border-gray-700 p-6 rounded-lg text-center shadow-lg hover:shadow-xl transition duration-300 hover:border-blue-400">
                            <img src="https://via.placeholder.com/300x200" alt="School {{ $i }}" class="w-full h-auto rounded-md mb-4">
                            <h3 class="text-xl font-bold text-white mb-2">School Name {{ $i }}</h3>
                            <p class="text-gray-300 mb-4">Brief description of the school.</p>
                            <a href="#" class="text-blue-400 hover:text-blue-300 font-medium transition duration-300">Learn More</a>
                        </div>
                    @endforeach
                </div>
            </section>

            <!-- Student Information Form -->
            <section class="mt-12 p-8 bg-gray-800 border border-gray-700 rounded-lg">
                <h2 class="text-3xl font-bold text-white mb-6 text-center">Student Information Form</h2>
                <form id="studentForm" action="{{ route('student.store') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="block mb-2 font-bold text-gray-300">Name:</label>
                        <input type="text" id="name" name="name" required
                               class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 font-bold text-gray-300">Email:</label>
                        <input type="email" id="email" name="email" required
                               class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-6">
                        <label for="grade" class="block mb-2 font-bold text-gray-300">Grade:</label>
                        <input type="number" id="grade" name="grade" min="1" max="12" required
                               class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <button type="submit"
                            class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-md transition duration-300 shadow-lg">
                        Submit
                    </button>
                </form>
            </section>

            <!-- Testimonials -->
            <section class="mt-12 p-8 bg-gray-800 border border-gray-700 rounded-lg">
                <h2 class="text-3xl font-bold text-white mb-6 text-center">What Students Say</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @php
                        $testimonials = [
                            ['quote' => 'This platform helped me find the perfect school! I\'m so grateful.', 'author' => 'Jane Doe, Grade 12'],
                            ['quote' => 'I was struggling to choose a school, but this made the process so much easier.', 'author' => 'John Smith, Grade 10'],
                            ['quote' => 'Great recommendations and easy to use. Highly recommend!', 'author' => 'Alice Johnson, Grade 11']
                        ];
                    @endphp

                    @foreach($testimonials as $testimonial)
                        <div class="bg-gray-700 p-6 rounded-lg border-l-4 border-blue-500">
                            <p class="text-gray-200 mb-4">"{{ $testimonial['quote'] }}"</p>
                            <p class="text-right italic text-gray-400">- {{ $testimonial['author'] }}</p>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>

    <!-- Login Modal -->
    <div id="loginModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 overflow-auto">
        <div class="bg-gray-800 border border-gray-600 rounded-lg max-w-md mx-auto my-24 p-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-white">Login</h2>
                <span class="text-gray-400 text-3xl font-bold cursor-pointer hover:text-white" id="closeLoginModal">&times;</span>
            </div>
            <form id="loginForm" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="username" class="block mb-2 font-bold text-gray-300">Username:</label>
                    <input type="text" id="username" name="username" required
                           class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 font-bold text-gray-300">Password:</label>
                    <input type="password" id="password" name="password" required
                           class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-md transition duration-300 shadow-lg">
                    Login
                </button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Login Modal Toggle
        document.querySelectorAll('.open-login-modal').forEach(button => {
            button.addEventListener('click', function() {
                document.getElementById('loginModal').classList.remove('hidden');
            });
        });

        document.getElementById('closeLoginModal').addEventListener('click', function() {
            document.getElementById('loginModal').classList.add('hidden');
        });

        // Close modal when clicking outside
        document.getElementById('loginModal').addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.add('hidden');
            }
        });
    </script>
@endsection
