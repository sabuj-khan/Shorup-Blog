<div class="menu_main">
    <ul>
       <li class="active"><a href="{{ url('/') }}">Home</a></li>
       <li><a href="{{ url('/about') }}">About</a></li>
       {{-- <li><a href="{{ url('/services') }}">Services</a></li> --}}
       <li><a href="{{ url('/blogs') }}">Blog</a></li>
       <li><a href="{{ url('/contact') }}">Contact us</a></li>

       @if (Route::has('login'))

       @auth
           {{-- <li>
                <x-app-layout>
                    
                </x-app-layout>
           </li> --}}
       
           <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>

           {{-- <li><a href="{{ url('27.0.0.1:8000/logout') }}">Log Out</a></li> --}}
      

       @else

       
       <li><a href="{{ url('/login') }}">Log In</a></li>
       <li><a href="{{ url('/register') }}">Register</a></li>

       @endauth

       @endif
    </ul>
 </div>


      