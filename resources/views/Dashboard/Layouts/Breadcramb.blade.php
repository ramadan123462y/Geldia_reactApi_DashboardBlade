<div class="pagetitle">
    <h1>@yield('title_page')</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">@yield('one')</li>
            <li class="breadcrumb-item active">@yield('two')</li>
        </ol>
    </nav>
</div>
