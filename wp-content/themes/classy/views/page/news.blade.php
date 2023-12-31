{{-- Template Name: News Archive --}}

@extends('layout.default')

@section('content')
    <div class="container">

        <h1 class="h2 h2--mt-0">{!! get_field('news_title', 'options') !!}</h1>

        <!--tags-->
        @if($tags)
            <div class="news-tags-wrapper">
                <form id="tagsForm">
                    <ul class="news-tags">
                        @foreach($tags as $index => $tag)
                            <li class="news-tag {{ $index > 5 ? 'hidden' : null }}">
                                <label class="news-tag-checkbox">
                                    <input type="checkbox" name="tags[]" value="{{ $tag->slug }}">
                                    <span>{{ $tag->name }}
                                        <svg class="news-tag-checkbox-cross" width="8" height="8" viewBox="0 0 8 8" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M0.15621 0.15621C0.364489 -0.0520699 0.702177 -0.0520699 0.910457 0.15621L7.84379 7.08954C8.05207 7.29782 8.05207 7.63551 7.84379 7.84379C7.63551 8.05207 7.29782 8.05207 7.08954 7.84379L0.15621 0.910457C-0.0520699 0.702177 -0.0520699 0.364489 0.15621 0.15621Z"
                                              fill="white"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M7.84379 0.15621C7.63551 -0.0520699 7.29782 -0.0520699 7.08954 0.15621L0.156209 7.08954C-0.0520706 7.29782 -0.0520706 7.63551 0.156209 7.84379C0.364489 8.05207 0.702177 8.05207 0.910457 7.84379L7.84379 0.910457C8.05207 0.702177 8.05207 0.364489 7.84379 0.15621Z"
                                              fill="white"/>
                                    </svg>
                                    </span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                    @if(count($tags) > 6)
                        <div class="tags-control">
                            <button class="tags-control-button" id="showMore">
                                + {{ count($tags) - 5 - 1 }} {{ (count($tags) - 5 - 1 > 1) ? $tags_text_plural : $tags_text_singular }}</button>
                            <button class="tags-control-button hidden" id="showLess">{{$show_less_tags_text}}</button>
                        </div>
                    @endif
                </form>
            </div>
    @endif
    <!--!tags-->
        <div id="pageContent">
            <div class="news-list-wrapper">
                <div class="news-list">
                    @foreach($news as $news_item)
                        <a href="{{ $news_item->permalink() }}" class="news">
                            <div class="news__img">
                                <div class="img__inner b-lazy" data-src="{{ $news_item->getAcfImage()->src('large') }}">
                                </div>
                            </div>

                            <div class="news__content">


                                <div class="news__title">
                                    {!! $news_item->title() !!}
                                </div>

                            </div>
                            <div class="news__date">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.4" clip-path="url(#clip0_2_3054)">
                                        <path d="M11.0717 1.03702V1.11202H11.1467H11.883C12.8657 1.11202 13.6643 1.91067 13.6643 2.89332V12.1437C13.6643 13.1263 12.8657 13.925 11.883 13.925H2.11412C1.13146 13.925 0.332813 13.1263 0.332813 12.1437V2.89332C0.332813 1.91067 1.13146 1.11202 2.11412 1.11202H2.8504H2.9254V1.03702V0.518509C2.9254 0.274742 3.12514 0.075 3.36891 0.075C3.61269 0.075 3.81246 0.27475 3.81246 0.518509V1.03702V1.11202H3.88746H10.1097H10.1847V1.03702V0.518509C10.1847 0.274742 10.3844 0.075 10.6282 0.075C10.8719 0.075 11.0717 0.27475 11.0717 0.518509V1.03702ZM2.9254 2.07408V1.99908H2.8504H2.11412C1.6216 1.99908 1.21987 2.4008 1.21987 2.89332V4.40741V4.48241H1.29487H12.7022H12.7772V4.40741V2.89332C12.7772 2.4008 12.3755 1.99908 11.883 1.99908H11.1467H11.0717V2.07408V2.59259C11.0717 2.83635 10.8719 3.0361 10.6282 3.0361C10.3844 3.0361 10.1847 2.83635 10.1847 2.59259V2.07408V1.99908H10.1097H3.88742H3.81242V2.07408V2.59259C3.81242 2.83635 3.61268 3.0361 3.36891 3.0361C3.12514 3.0361 2.9254 2.83635 2.9254 2.59259V2.07408ZM1.29487 5.36943H1.21987V5.44443V12.1437C1.21987 12.6362 1.6216 13.0379 2.11412 13.0379H11.8831C12.3756 13.0379 12.7773 12.6362 12.7773 12.1437V5.44443V5.36943H12.7023H1.29487Z"
                                              fill="#272727" stroke="white" stroke-width="0.15"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_2_3054">
                                            <rect width="14" height="14" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>


                                {{   date("d.m.Y",strtotime($news_item->post_date)) }}
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            {!! $pagination_layout !!}
        </div>
    </div>
@stop
