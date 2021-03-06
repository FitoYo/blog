@extends('layout')

@section('meta-title', $post->title)
@section('meta-description', $post->excerpt)


@section('content')
  <article class="post image-w-text container">
    <div class="content-post">
      <header class="container-flex space-between">
        <div class="date">
          <span class="c-gris">{{ $post->published_at->format('M d') }}</span>
        </div>
        <div class="post-category">
          <span class="category">{{ $post->category->name }}</span>
        </div>
      </header>
      <h1>{{ $post->title }} .</h1>
        <div class="divider"></div>
        <div class="image-w-text">
        	{!! $post->body !!}
        </div>

        <footer class="container-flex space-between">
          <div class="buttons-social-media-share">
            <ul class="share-buttons">
              <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ request()->fullUrl() }}&title={{ $post->title }}" title=" compartir Share on Facebook" target="_blank"><img alt="Share on Facebook" src="{{ asset('img/Facebook.png') }}"></a></li>
              <li><a href="https://twitter.com/intent/tweet?url={{ request()->fullUrl() }}&text={{ $post->title }}" target="_blank" title="Tweet"><img alt="Tweet" src="{{ asset('img/Twitter.png') }}"></a></li>
              <li><a href="https://plus.google.com/share?url={{ request()->fullUrl() }}" target="_blank" title="Share on Google+"><img alt="Compartir share Google+" src="{{ asset('img/Google-plus.png') }}"></a></li>
              <li><a href="http://pinterest.com/pin/create/button/?url={{ request()->fullUrl() }}&description={{ $post->title }}" target="_blank" title="Pin it"><img alt="Pin it" src="{{ asset('img/Pinterest.png') }}"></a></li>
            </ul>
          </div>
          <div class="tags container-flex">
			@foreach ($post->tags as $tag)
                <span class="tag c-gray-1 text-capitalize">#{{ $tag->name }}  </span>
      @endforeach
     </div>
      </footer>
      <div class="comments">
      <div class="divider"></div>
        <div id="disqus_thread"></div>
        @include('partials.disqus-script')
      </div><!-- .comments -->
    </div>
  </article>
@endsection

@push('script')
<script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
@endpush