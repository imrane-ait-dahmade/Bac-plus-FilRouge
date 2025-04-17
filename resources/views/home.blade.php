@extends('Layouts.App')
@section('content')

    <section class=" py-16 px-8 text-center rounded-lg mb-8 border-l-4 border-custom-primary">
        <h1 class="text-4xl font-bold text-primary mb-4">Find the Best School for You</h1>
        <p class="text-xl text-light mb-6">Explore our recommendations and make an informed decision.</p>
        <a href="{{url('Auth/login')}}"><button class="bg-custom-primary hover:bg-custom-dark text-black font-bold py-3 px-6 rounded-lg transition duration-300 shadow-lg">
            Get Started
        </button></a>
    </section>

    <section class="mt-12">
        <h2 class="text-3xl font-bold text-white mb-8 text-center">Featured Schools</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-gray-700 border border-gray-600 p-6 rounded-lg text-center shadow-lg hover:shadow-xl transition duration-300 hover:border-custom-light">
                <img src="https://via.placeholder.com/300x200" alt="School 1" class="w-full h-auto rounded-md mb-4">
                <h3 class="text-xl font-bold text-white mb-2">School Name 1</h3>
                <p class="text-gray-300 mb-4">Brief description of the school.</p>
                <a href="#" class="text-custom-primary hover:text-custom-light font-medium transition duration-300">Learn More</a>
            </div>
            <div class="bg-gray-700 border border-gray-600 p-6 rounded-lg text-center shadow-lg hover:shadow-xl transition duration-300 hover:border-custom-light">
                <img src="https://via.placeholder.com/300x200" alt="School 2" class="w-full h-auto rounded-md mb-4">
                <h3 class="text-xl font-bold text-white mb-2">School Name 2</h3>
                <p class="text-gray-300 mb-4">Brief description of the school.</p>
                <a href="#" class="text-custom-primary hover:text-custom-light font-medium transition duration-300">Learn More</a>
            </div>
            <div class="bg-gray-700 border border-gray-600 p-6 rounded-lg text-center shadow-lg hover:shadow-xl transition duration-300 hover:border-custom-light">
                <img src="https://via.placeholder.com/300x200" alt="School 3" class="w-full h-auto rounded-md mb-4">
                <h3 class="text-xl font-bold text-white mb-2">School Name 3</h3>
                <p class="text-gray-300 mb-4">Brief description of the school.</p>
                <a href="#" class="text-custom-primary hover:text-custom-light font-medium transition duration-300">Learn More</a>
            </div>
        </div>
    </section>

    <section class="mt-12 p-8 bg-gray-800 border border-gray-600 rounded-lg">
        <h2 class="text-3xl font-bold text-white mb-6 text-center">Student Information Form</h2>
        <form id="studentForm">
            <div class="mb-6">
                <label for="name" class="block mb-2 font-bold text-gray-300">Name:</label>
                <input type="text" id="name" name="name" required
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-custom-primary">
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 font-bold text-gray-300">Email:</label>
                <input type="email" id="email" name="email" required
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-custom-primary">
            </div>
            <div class="mb-6">
                <label for="grade" class="block mb-2 font-bold text-gray-300">Grade:</label>
                <input type="number" id="grade" name="grade" min="1" max="12" required
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-custom-primary">
            </div>
            <button type="submit"
                    class="w-full bg-custom-primary hover:bg-custom-dark text-white font-bold py-3 px-6 rounded-md transition duration-300 shadow-lg">
                Submit
            </button>
        </form>
    </section>

    <section class="mt-12 p-8 bg-gray-800 border border-gray-600 rounded-lg">
        <h2 class="text-3xl font-bold text-white mb-6 text-center">What Students Say</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-gray-700 p-6 rounded-lg border-l-4 border-custom-primary">
                <p class="text-gray-200 mb-4">"This platform helped me find the perfect school! I'm so grateful."</p>
                <p class="text-right italic text-gray-400">- Jane Doe, Grade 12</p>
            </div>
            <div class="bg-gray-700 p-6 rounded-lg border-l-4 border-custom-primary">
                <p class="text-gray-200 mb-4">"I was struggling to choose a school, but this made the process so much easier."</p>
                <p class="text-right italic text-gray-400">- John Smith, Grade 10</p>
            </div>
            <div class="bg-gray-700 p-6 rounded-lg border-l-4 border-custom-primary">
                <p class="text-gray-200 mb-4">"Great recommendations and easy to use. Highly recommend!"</p>
                <p class="text-right italic text-gray-400">- Alice Johnson, Grade 11</p>
            </div>
        </div>
    </section>

    <div id="loginModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 overflow-auto">
        <div class="bg-gray-800 border border-gray-600 rounded-lg max-w-md mx-auto my-24 p-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-white">Login</h2>
                <span class="text-gray-400 text-3xl font-bold cursor-pointer hover:text-white">&times;</span>
            </div>
            <form id="loginForm">
                <div class="mb-6">
                    <label for="username" class="block mb-2 font-bold text-gray-300">Username:</label>
                    <input type="text" id="username" name="username" required
                           class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-custom-primary">
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 font-bold text-gray-300">Password:</label>
                    <input type="password" id="password" name="password" required
                           class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-custom-primary">
                </div>
                <button type="submit"
                        class="w-full bg-custom-primary hover:bg-custom-dark text-white font-bold py-3 px-6 rounded-md transition duration-300 shadow-lg">
                    Login
                </button>
            </form>
        </div>
    </div>
@endsection
