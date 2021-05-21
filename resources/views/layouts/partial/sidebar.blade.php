<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile d-flex no-block  m-t-20">
                        <div class="user-pic">
                            <img src="{{ asset('assets/images/users/male_avatar.svg') }}" alt="users"
                                class="rounded-circle" width="40" />
                        </div>
                        <div class="user-content hide-menu m-l-10">
                            <a class="" id="Userdd">
                                <h5 class="m-b-0 user-name font-medium">
                                    {{ auth()->user()->name ?? 'John Doe' }}
                                </h5>
                                <span
                                    class="op-5 user-email">{{ auth()->user()->email ?? 'no.email@mail.com' }}</span>
                            </a>

                        </div>
                    </div>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('home.languages.index') }}" aria-expanded="false">
                        <i class="mdi mdi-alphabetical"></i>
                        <span class="hide-menu">Language</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('home.countries.index') }}" aria-expanded="false">
                        <i class="mdi mdi-earth"></i>
                        <span class="hide-menu">Country</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('home.currencies.index') }}" aria-expanded="false">
                        <i class="mdi mdi-currency-usd"></i>
                        <span class="hide-menu">Currency</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('home.authors.index') }}" aria-expanded="false">
                        <i class="mdi mdi-human-male"></i>
                        <span class="hide-menu">Author</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="mdi mdi-book-multiple"></i>
                        <span class="hide-menu"> Books</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('home.books.create') }}" class="sidebar-link">
                                <i class="fas fa-user-circle"></i>
                                <span class="hide-menu"> Create Book </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('home.books.index') }}" class="sidebar-link">
                                <i class="fas fa-user-circle"></i>
                                <span class="hide-menu"> Book List
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
