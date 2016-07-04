<div class="panel panel-default front-panel">
    <div class="panel-heading">
        Adăugat de <a href="{{ url('/user', [urlencode($aforism->user->name)]) }}">{{ $aforism->user->name }}</a>
         în 
        @foreach($aforism->tags as $tag)
            <a href="{{url('/etichete', [$tag->slug])}}">{{$tag->name}}</a>
        @endforeach
    </div>

    <div class="panel-body panel-front">{!! $aforism->content !!}
        @if(!empty($aforism->răspuns))
        <br />
        <div class="rotate">Răspuns:{{ $aforism->răspuns }}</div>
        @endif
    </div>
    <div class="panel-footer">
        @if (Auth::check())
            pe {{ $aforism->created_at->format('j M, Y, g:i a') }} 
            <div class="pull-right">
                @if($aforismLikeCount = $aforism->likeCount)
                    <div class="badge" id="badge-{{ $aforism->id }}">{{ $aforismLikeCount }}</div>
                @endif
                <button type="submit" class="btn-naked {{ $favorited = in_array($aforism->id,$favorites) ? 'favorited' : 'not-favorited' }} 
                    pull-right ajax-like" id="{{ $aforism->id }}">
                    <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>    
                </button>
            </div>
        @else
            pe {{ $aforism->created_at->format('j M, Y, g:i a') }} 
            <div class="pull-right">
                @if($aforismLikeCount = $aforism->likeCount)
                    <div class="badge">{{ $aforismLikeCount }}</div>
                @endif
                    <a class="btn btn-default btn-sm btn-naked not-favorited pull-right" href="{{ url('/login') }}"> 
                        <span class="glyphicon glyphicon-heart" aria-hidden="true">
                    </a>
            </div>
         @endif
    </div>
</div>