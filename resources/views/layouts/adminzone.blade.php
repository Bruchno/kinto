<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Simple Sidebar - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="/assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/styles.css" rel="stylesheet" />

    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
              <br>
              <a href="{{ route('home')}}"><button type="button" class="btn btn-light">На сайт</button></a>
              <br>

@if(Auth::check())
              <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                  <div class="flex justify-between h-16">

                      <!-- Settings Dropdown -->
                      <div class="hidden sm:flex sm:items-center sm:ml-6">
                          <x-dropdown align="right" width="48">
                              <x-slot name="trigger">
                                  <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                      <div>{{ Auth::user()->name }}</div>

                                      <div class="ml-1">
                                          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                          </svg>
                                      </div>
                                  </button>
                              </x-slot>

                              <x-slot name="content">
                                  <!-- Authentication -->
                                  <form method="POST" action="{{ route('logout') }}">
                                      @csrf

                                      <x-dropdown-link :href="route('logout')"
                                              onclick="event.preventDefault();
                                                          this.closest('form').submit();">
                                          {{ __('Log Out') }}lll
                                      </x-dropdown-link>
                                  </form>
                              </x-slot>
                          </x-dropdown>
                      </div>

                      <!-- Hamburger -->

                  </div>
              </div>

              <!-- Responsive Navigation Menu -->
              <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

                  <!-- Responsive Settings Options -->
                  <div class="pt-4 pb-1 border-t border-gray-200">
                      <div class="px-4">
                          <div class="font-medium text-base text-gray-800">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                          </div>

                      </div>

                      <div class="mt-3 space-y-1">
                          <!-- Authentication -->

                      </div>
                  </div>
              </div>

                <!-- <div class="sidebar-heading border-bottom bg-light">Start Bootstrap</div> -->
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('product.index') }}">Товари</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('category.index') }}">Категорії товарів</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('team.index') }}">Команда</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('users') }}">Користувачі</a>
                </div>
            </div>
              @endif
            <!-- Page content wrapper-->


                <!-- Page content-->
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="/js/scripts.js"></script>
    </body>
</html>
