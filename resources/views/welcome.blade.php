<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="manifest" href="{{ asset('mix-manifest.json') }}">
    <title>Boi Chai</title>
</head>

<body>

    <noscript><strong>We're sorry but BooksQL doesn't work properly without JavaScript enabled. Please enable it to
            continue.</strong></noscript>
    <div id="app" class="font-sans antialiased text-black">
        <div id="nav" class="bg-purple-500">
            <div class="container flex items-center justify-between py-6">
                <div><a href="/"><img src="{{ asset('assets/images/logo.svg') }}" alt="logo"></a></div>
                <div>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/home') }}" class="text-white hover:text-gray-200">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="text-white hover:text-gray-200">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-white hover:text-gray-200">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
        <div class="home">
            <div>
                <div class="hero bg-gray-100 mb-24">
                    <div class="container flex flex-col lg:flex-row lg:justify-between py-10">
                        <div class="mt-10">
                            <h1 class="text-3xl w-full lg:w-3/4 mb-4"> Book Recommendation site </h1>
                            <p class="leading-normal w-full lg:w-3/4 mb-6"> Built with Laravel</p>
                            <div class="flex items-center"><a href="#"
                                    class="bg-purple-600 text-white rounded px-4 py-4 mr-4 hover:bg-purple">View
                                    Books</a><a href="#"
                                    class="border border-purple-600 border-solid rounded text-purple-600 px-4 py-4 hover:bg-purple-600 hover:text-white">View
                                    Screencasts</a></div>
                        </div>
                        <div class="mt-10 lg:mt-0">
                            <img src="{{ asset('assets/images/hero.svg') }}" alt="hero image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container text-center lg:text-left">
                <div class="flex flex-wrap -mx-4">
                    <div class="w-full lg:w-3/4 px-4 mb-12">
                        <div>
                            <div>
                                <div class="flex flex-wrap">
                                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                                        <div class="sm:mx-auto md:mx-auto text-left"><a href="/books/3" class=""><img
                                                    src="https://res.cloudinary.com/dqzxpn5db/image/upload/v1547790672/booksql/sapiens.jpg"
                                                    alt="Cover image" class="h-64 mb-2"></a>
                                            <div><a href="/books/3"
                                                    class="text-lg font-bold text-black hover:text-gray-700 mb-1 block">
                                                    Sapiens </a>
                                                <div class="text-gray-800">Yuval Noah Harari</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                                        <div class="sm:mx-auto md:mx-auto text-left"><a href="/books/4" class=""><img
                                                    src="https://res.cloudinary.com/dqzxpn5db/image/upload/v1547790672/booksql/steve-jobs.jpg"
                                                    alt="Cover image" class="h-64 mb-2"></a>
                                            <div><a href="/books/4"
                                                    class="text-lg font-bold text-black hover:text-gray-700 mb-1 block">
                                                    Steve Jobs </a>
                                                <div class="text-gray-800">Walter Isaacson</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                                        <div class="sm:mx-auto md:mx-auto text-left"><a href="/books/5" class=""><img
                                                    src="https://res.cloudinary.com/dqzxpn5db/image/upload/v1547790672/booksql/jab-jab-jab-right-hook.jpg"
                                                    alt="Cover image" class="h-64 mb-2"></a>
                                            <div><a href="/books/5"
                                                    class="text-lg font-bold text-black hover:text-gray-700 mb-1 block">
                                                    Jab, Jab, Jab, Right Hook </a>
                                                <div class="text-gray-800">Gary Vaynerchuk</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                                        <div class="sm:mx-auto md:mx-auto text-left"><a href="/books/6" class=""><img
                                                    src="https://res.cloudinary.com/dqzxpn5db/image/upload/v1547790672/booksql/tribe-of-mentors.jpg"
                                                    alt="Cover image" class="h-64 mb-2"></a>
                                            <div><a href="/books/6"
                                                    class="text-lg font-bold text-black hover:text-gray-700 mb-1 block">
                                                    Tribe of Mentors </a>
                                                <div class="text-gray-800">Tim Ferris</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                                        <div class="sm:mx-auto md:mx-auto text-left"><a href="/books/7" class=""><img
                                                    src="https://res.cloudinary.com/dqzxpn5db/image/upload/v1547790672/booksql/the-millionaire-fastlane.jpg"
                                                    alt="Cover image" class="h-64 mb-2"></a>
                                            <div><a href="/books/7"
                                                    class="text-lg font-bold text-black hover:text-gray-700 mb-1 block">
                                                    The
                                                    Millionaire Fastlane </a>
                                                <div class="text-gray-800">MJ DeMarco</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                                        <div class="sm:mx-auto md:mx-auto text-left"><a href="/books/8" class=""><img
                                                    src="https://res.cloudinary.com/dqzxpn5db/image/upload/v1547790671/booksql/hooked.jpg"
                                                    alt="Cover image" class="h-64 mb-2"></a>
                                            <div><a href="/books/8"
                                                    class="text-lg font-bold text-black hover:text-gray-700 mb-1 block">
                                                    Hooked: How to Build Habit-Forming Products </a>
                                                <div class="text-gray-800">Nir Eyal</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                                        <div class="sm:mx-auto md:mx-auto text-left"><a href="/books/9" class=""><img
                                                    src="https://res.cloudinary.com/dqzxpn5db/image/upload/v1547790671/booksql/good-to-great.jpg"
                                                    alt="Cover image" class="h-64 mb-2"></a>
                                            <div><a href="/books/9"
                                                    class="text-lg font-bold text-black hover:text-gray-700 mb-1 block">
                                                    Good to Great </a>
                                                <div class="text-gray-800">Jim Collins</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                                        <div class="sm:mx-auto md:mx-auto text-left"><a href="/books/10" class=""><img
                                                    src="https://res.cloudinary.com/dqzxpn5db/image/upload/v1547790671/booksql/how-to-win-friends-and-influence-people.jpg"
                                                    alt="Cover image" class="h-64 mb-2"></a>
                                            <div><a href="/books/10"
                                                    class="text-lg font-bold text-black hover:text-gray-700 mb-1 block">
                                                    How
                                                    to win friends and influence people </a>
                                                <div class="text-gray-800">Dale Carnegie</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                                        <div class="sm:mx-auto md:mx-auto text-left"><a href="/books/11" class=""><img
                                                    src="https://res.cloudinary.com/dqzxpn5db/image/upload/v1547790672/booksql/tools-of-titans.jpg"
                                                    alt="Cover image" class="h-64 mb-2"></a>
                                            <div><a href="/books/11"
                                                    class="text-lg font-bold text-black hover:text-gray-700 mb-1 block">
                                                    Tools of Titans </a>
                                                <div class="text-gray-800">Tim Ferris</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                                        <div class="sm:mx-auto md:mx-auto text-left"><a href="/books/12" class=""><img
                                                    src="https://res.cloudinary.com/dqzxpn5db/image/upload/v1547790672/booksql/influence.jpg"
                                                    alt="Cover image" class="h-64 mb-2"></a>
                                            <div><a href="/books/12"
                                                    class="text-lg font-bold text-black hover:text-gray-700 mb-1 block">
                                                    Influence </a>
                                                <div class="text-gray-800">Robert B. Cialdini</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                                        <div class="sm:mx-auto md:mx-auto text-left"><a href="/books/13" class=""><img
                                                    src="https://res.cloudinary.com/dqzxpn5db/image/upload/v1547790672/booksql/the-personal-mba.jpg"
                                                    alt="Cover image" class="h-64 mb-2"></a>
                                            <div><a href="/books/13"
                                                    class="text-lg font-bold text-black hover:text-gray-700 mb-1 block">
                                                    The
                                                    Personal MBA </a>
                                                <div class="text-gray-800">Josh Kaufman</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                                        <div class="sm:mx-auto md:mx-auto text-left"><a href="/books/14" class=""><img
                                                    src="https://res.cloudinary.com/dqzxpn5db/image/upload/v1547790672/booksql/the-80-20-principle.jpg"
                                                    alt="Cover image" class="h-64 mb-2"></a>
                                            <div><a href="/books/14"
                                                    class="text-lg font-bold text-black hover:text-gray-700 mb-1 block">
                                                    The
                                                    80/20 Principle </a>
                                                <div class="text-gray-800">Richard Koch</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                                        <div class="sm:mx-auto md:mx-auto text-left"><a href="/books/15" class=""><img
                                                    src="https://res.cloudinary.com/dqzxpn5db/image/upload/v1547790672/booksql/the-10x-rule.jpg"
                                                    alt="Cover image" class="h-64 mb-2"></a>
                                            <div><a href="/books/15"
                                                    class="text-lg font-bold text-black hover:text-gray-700 mb-1 block">
                                                    The
                                                    10X Rule </a>
                                                <div class="text-gray-800">Grant Cardone</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                                        <div class="sm:mx-auto md:mx-auto text-left"><a href="/books/16" class=""><img
                                                    src="https://res.cloudinary.com/dqzxpn5db/image/upload/v1547790672/booksql/start-with-why.jpg"
                                                    alt="Cover image" class="h-64 mb-2"></a>
                                            <div><a href="/books/16"
                                                    class="text-lg font-bold text-black hover:text-gray-700 mb-1 block">
                                                    Start with Why </a>
                                                <div class="text-gray-800">Simon Sinek</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                                        <div class="sm:mx-auto md:mx-auto text-left"><a href="/books/17" class=""><img
                                                    src="https://res.cloudinary.com/dqzxpn5db/image/upload/v1547790672/booksql/smarter-faster-better.jpg"
                                                    alt="Cover image" class="h-64 mb-2"></a>
                                            <div><a href="/books/17"
                                                    class="text-lg font-bold text-black hover:text-gray-700 mb-1 block">
                                                    Smarter Faster Better </a>
                                                <div class="text-gray-800">Charles Duhigg</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                                        <div class="sm:mx-auto md:mx-auto text-left"><a href="/books/18" class=""><img
                                                    src="https://res.cloudinary.com/dqzxpn5db/image/upload/v1547790672/booksql/springboard.jpg"
                                                    alt="Cover image" class="h-64 mb-2"></a>
                                            <div><a href="/books/18"
                                                    class="text-lg font-bold text-black hover:text-gray-700 mb-1 block">
                                                    Springboard </a>
                                                <div class="text-gray-800">G. Richard Shell</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                                        <div class="sm:mx-auto md:mx-auto text-left"><a href="/books/19" class=""><img
                                                    src="https://res.cloudinary.com/dqzxpn5db/image/upload/v1547790672/booksql/secret-sauce.jpg"
                                                    alt="Cover image" class="h-64 mb-2"></a>
                                            <div><a href="/books/19"
                                                    class="text-lg font-bold text-black hover:text-gray-700 mb-1 block">
                                                    Secret Sauce </a>
                                                <div class="text-gray-800">Austen Allred</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                                        <div class="sm:mx-auto md:mx-auto text-left"><a href="/books/20" class=""><img
                                                    src="https://res.cloudinary.com/dqzxpn5db/image/upload/v1547790672/booksql/netflixed.jpg"
                                                    alt="Cover image" class="h-64 mb-2"></a>
                                            <div><a href="/books/20"
                                                    class="text-lg font-bold text-black hover:text-gray-700 mb-1 block">
                                                    Netflixed </a>
                                                <div class="text-gray-800">Gina Keating</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                                        <div class="sm:mx-auto md:mx-auto text-left"><a href="/books/21" class=""><img
                                                    src="https://res.cloudinary.com/dqzxpn5db/image/upload/v1547790672/booksql/marketing-for-developers.jpg"
                                                    alt="Cover image" class="h-64 mb-2"></a>
                                            <div><a href="/books/21"
                                                    class="text-lg font-bold text-black hover:text-gray-700 mb-1 block">
                                                    Marketing for Developers </a>
                                                <div class="text-gray-800">Justin Jackson</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                                        <div class="sm:mx-auto md:mx-auto text-left"><a href="/books/22" class=""><img
                                                    src="https://res.cloudinary.com/dqzxpn5db/image/upload/v1547790665/booksql/drive.jpg"
                                                    alt="Cover image" class="h-64 mb-2"></a>
                                            <div><a href="/books/22"
                                                    class="text-lg font-bold text-black hover:text-gray-700 mb-1 block">
                                                    Drive </a>
                                                <div class="text-gray-800">Daniel H. Pink</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                                        <div class="sm:mx-auto md:mx-auto text-left"><a href="/books/23" class=""><img
                                                    src="https://res.cloudinary.com/dqzxpn5db/image/upload/v1547790665/booksql/deep-work.jpg"
                                                    alt="Cover image" class="h-64 mb-2"></a>
                                            <div><a href="/books/23"
                                                    class="text-lg font-bold text-black hover:text-gray-700 mb-1 block">
                                                    Deep Work </a>
                                                <div class="text-gray-800">Cal Newport</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                                        <div class="sm:mx-auto md:mx-auto text-left"><a href="/books/24" class=""><img
                                                    src="https://res.cloudinary.com/dqzxpn5db/image/upload/v1547790665/booksql/crushing-it.jpg"
                                                    alt="Cover image" class="h-64 mb-2"></a>
                                            <div><a href="/books/24"
                                                    class="text-lg font-bold text-black hover:text-gray-700 mb-1 block">
                                                    Crushing It </a>
                                                <div class="text-gray-800">Gary Vaynerchuk</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                                        <div class="sm:mx-auto md:mx-auto text-left"><a href="/books/1" class=""><img
                                                    src="https://res.cloudinary.com/dqzxpn5db/image/upload/v1547790672/booksql/the-lean-startup.jpg"
                                                    alt="Cover image" class="h-64 mb-2"></a>
                                            <div><a href="/books/1"
                                                    class="text-lg font-bold text-black hover:text-gray-700 mb-1 block">
                                                    The
                                                    Lean Startup </a>
                                                <div class="text-gray-800">Eric Ries</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!---->
                            <!---->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-purple-500 text-white mt-12 py-12 text-center">
            <h1 class="text-bold text-xl">© Develop By Bappi Saha</h1>
        </div>
    </div>
    <script src="/js/chunk-vendors.b1f0425a.js"></script>
    <script src="/js/app.cdc50d99.js"></script>
</body>

</html>
