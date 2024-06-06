@extends('layout')
@section('content')
<div class="row container" id="wrapper">    
    <div class="halim-panel-filter">
        <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
            <div class="ajax"></div>
        </div>
    </div>
    {{-- <div class="col-xs-12 carausel-sliderWidget">
        <section id="halim-advanced-widget-4">
            <div class="section-heading">
                <a href="danhmuc.php" title="Phim Chiếu Rạp">
                <span class="h-text">Phim Chiếu Rạp</span>
                </a>
                <ul class="heading-nav pull-right hidden-xs">
                <li class="section-btn halim_ajax_get_post" data-catid="4" data-showpost="12" data-widgetid="halim-advanced-widget-4" data-layout="6col"><span data-text="Chiếu Rạp"></span></li>
                </ul>
            </div>
            <div id="halim-advanced-widget-4-ajax-box" class="halim_box">
                <article class="col-md-2 col-sm-4 col-xs-6 thumb grid-item post-38424">
                <div class="halim-item">
                    <a class="halim-thumb" href="{{ route('movie') }}" title="MAI">
                        <figure><img class="lazy img-responsive" src="{{ asset('images/MAI.jpg') }}" alt="MAI" title="MAI"></figure>
                        <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                        <div class="icon_overlay"></div>
                        <div class="halim-post-title-box">
                            <div class="halim-post-title ">
                            <p class="entry-title">MAI</p>
                            <p class="original_title">Hài Tết 2024</p>
                            </div>
                        </div>
                    </a>
                </div>
                </article>                
            </div>
        </section>
        <div class="clearfix"></div>
    </div> --}}
    <div id="halim_related_movies-2xx" class="wrap-slider">
        <div class="section-bar clearfix">
            <h3 class="section-title"><span>PHIM HOT</span></h3>
        </div>
        <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
            @foreach ($film_hot as $hot)               
            
            <article class="thumb grid-item post-38498">
                <div class="halim-item">
                    <a class="halim-thumb" href="{{ route('movie', $hot->slug) }}" title="{{ $hot->title }}">
                        <figure><img class="lazy img-responsive"
                                src="{{ asset('uploads/movies/'. $hot->image) }}"
                                alt="Đại Thánh Vô Song" title="{{ $hot->title }}"></figure>
                        <span class="status">
                            @if ($hot->resolution == 0)
                                HD
                            @elseif ($hot->resolution == 1)
                                SD
                            @elseif ($hot->resolution == 2)
                                HDCam
                            @elseif ($hot->resolution == 3)
                                Cam
                            @else
                                FullHD
                            @endif    
                        </span>
                        <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                            @if ($hot->subtitle == 0)
                                Phụ đề
                            @else
                                Thuyết minh
                            @endif
                        </span>
                        <div class="icon_overlay"></div>
                        <div class="halim-post-title-box">
                            <div class="halim-post-title ">
                                <p class="entry-title">{{ $hot->title }}</p>
                                <p class="original_title">{{ $hot->name_eng }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </article>
            @endforeach
        </div>        
    </div>
    
    <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
        @foreach ($category as $cate)
        <section id="halim-advanced-widget-2">
            <div class="section-heading">
                <a href="{{ route('category', $cate->slug) }}" title="{{ $cate->title }}">
                <span class="h-text">{{ $cate->title }}</span>
                </a>
            </div>            
            <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
                @foreach ($cate->movie->take(10) as $movie)
                <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                <div class="halim-item">
                    <a class="halim-thumb" href="{{ route('movie', $movie->slug) }}">
                        <figure><img class="lazy img-responsive" src="{{ asset('uploads/movies/'. $movie->image) }}" alt="{{ $movie->title }}" title="{{ $movie->title }}"></figure>
                        <span class="status">
                            @if ($movie->resolution == 0)
                                HD
                            @elseif ($movie->resolution == 1)
                                SD
                            @elseif ($movie->resolution == 2)
                                HDCam
                            @elseif ($movie->resolution == 3)
                                Cam
                            @else
                                FullHD
                            @endif    
                        </span>
                        <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                            @if ($movie->subtitle == 0)
                                Phụ đề
                            @else
                                Thuyết minh
                            @endif
                        </span> 
                        <div class="icon_overlay"></div>
                        <div class="halim-post-title-box">
                            <div class="halim-post-title ">
                            <p class="entry-title">{{ $movie->title }}</p>
                            <p class="original_title">{{ $movie->name_eng }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                </article>
                @endforeach
            </div>            
        </section>                
        <div class="clearfix"></div>
        @endforeach
    </main>
    <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
        <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
            <div class="section-bar clearfix">
                <div class="section-title">
                <span>Top Views</span>
                <ul class="halim-popular-tab" role="tablist">
                    <li role="presentation" class="active">
                        <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="today">Day</a>
                    </li>
                    <li role="presentation">
                        <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="week">Week</a>
                    </li>
                    <li role="presentation">
                        <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="month">Month</a>
                    </li>
                    <li role="presentation">
                        <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="all">All</a>
                    </li>
                </ul>
                </div>
            </div>
            <section class="tab-content">
                <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                <div class="halim-ajax-popular-post-loading hidden"></div>
                <div id="halim-ajax-popular-post" class="popular-post">
                    <div class="item post-37176">
                        <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                            <div class="item-link">
                            <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798" class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                            <span class="is_trailer">Trailer</span>
                            </div>
                            <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                        </a>
                        <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                        <div style="float: left;">
                            <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                            <span style="width: 0%"></span>
                            </span>
                        </div>
                    </div>
                    <div class="item post-37176">
                        <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                            <div class="item-link">
                            <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798" class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                            <span class="is_trailer">Trailer</span>
                            </div>
                            <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                        </a>
                        <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                        <div style="float: left;">
                            <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                            <span style="width: 0%"></span>
                            </span>
                        </div>
                    </div>
                    <div class="item post-37176">
                        <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                            <div class="item-link">
                            <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798" class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                            <span class="is_trailer">Trailer</span>
                            </div>
                            <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                        </a>
                        <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                        <div style="float: left;">
                            <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                            <span style="width: 0%"></span>
                            </span>
                        </div>
                    </div>
                    <div class="item post-37176">
                        <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                            <div class="item-link">
                            <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798" class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                            <span class="is_trailer">Trailer</span>
                            </div>
                            <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                        </a>
                        <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                        <div style="float: left;">
                            <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                            <span style="width: 0%"></span>
                            </span>
                        </div>
                    </div>
                    <div class="item post-37176">
                        <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                            <div class="item-link">
                            <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798" class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                            <span class="is_trailer">Trailer</span>
                            </div>
                            <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                        </a>
                        <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                        <div style="float: left;">
                            <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                            <span style="width: 0%"></span>
                            </span>
                        </div>
                    </div>
                    <div class="item post-37176">
                        <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                            <div class="item-link">
                            <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798" class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                            <span class="is_trailer">Trailer</span>
                            </div>
                            <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                        </a>
                        <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                        <div style="float: left;">
                            <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                            <span style="width: 0%"></span>
                            </span>
                        </div>
                    </div>
                    <div class="item post-37176">
                        <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                            <div class="item-link">
                            <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798" class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                            <span class="is_trailer">Trailer</span>
                            </div>
                            <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                        </a>
                        <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                        <div style="float: left;">
                            <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                            <span style="width: 0%"></span>
                            </span>
                        </div>
                    </div>
                </div>
                </div>
            </section>
            <div class="clearfix"></div>
        </div>
    </aside>
</div>
@endsection