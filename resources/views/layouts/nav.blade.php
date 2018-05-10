<div class="blog-masthead">
    <div class="container">
      <nav class="nav blog-nav">
        <a class="nav-link @yield('home')" href="/">Home</a>
        <a class="nav-link @yield('create')" href="/posts/create">Create a Post</a>
        <a class="nav-link ml-auto" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
        </form>
      </nav>
    </div>
  </div>

  <div class="blog-header">
    <div class="container">
      @if(Auth::check())
        <h1 class="blog-title">{{ Auth::user()->name }}'s Blog</h1>
      @endif
    </div>
  </div>