<section class="header" style="background-image: url('/images/banner-masjid.jpg')">
    <div class="container">
        <h1 class="mb-0">{{ $pageTitle ?? '' }}</h1>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <?php $segments = ''; ?>
            @foreach(Request::segments() as $segment)
                <?php $segments .= '/'.$segment; ?>
                <li class="breadcrumb-item {{ (request()->is($segment)) ? 'active' : '' }}">
                    <a href="{{ $segments }}">{{ str_replace("-"," ",$segment)}}</a>
                </li>
            @endforeach
        </ol>
    </div>
</section>