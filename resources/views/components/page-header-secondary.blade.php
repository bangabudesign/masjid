<section class="header-secondary" style="background-image: url('/images/banner-masjid.jpg')">
    <div class="container">
        <div class="d-md-flex align-items-center">
            <h1 class="mb-0">{{ $pageTitle ?? '' }}</h1>
            <ol class="breadcrumb mb-0 ml-md-auto">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <?php $segments = ''; ?>
                @foreach(Request::segments() as $segment)
                    <?php $segments .= '/'.$segment; ?>
                    <li class="breadcrumb-item {{ (request()->is($segments)) ? 'active' : '' }}">
                        <a href="{{ $segments }}">{{ str_replace("-"," ",$segment)}}</a>
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
</section>