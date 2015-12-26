@if(isset($list))
    @foreach($list as $val)
        <div class="row">
            <div class="col-md-3 text-center">
                @if ($val->image)
                    @if(!empty($val->content))
                        <a href="{{$val->url}}" title="{{$val->title}}">
                            <img style="width: 100%;max-width: 250px;"
                                 data-src="/{{image_thumb_resize_canvas($val->image,250,250)}}"
                                 src="/{{image_thumb_resize_canvas($val->image,250,250)}}"
                                 alt="{{$val->title}}"
                                 class="img-rounded">
                        </a>
                    @else
                        <img style="width: 100%;max-width: 250px;"
                             data-src="/{{image_thumb_resize_canvas($val->image,250,250)}}"
                             src="/{{image_thumb_resize_canvas($val->image,250,250)}}"
                             alt="{{$val->title}}"
                             class="img-rounded">
                    @endif
                @endif
            </div>
            <div class="col-md-9">
                <div class="caption">
                    <h3>{{$val->title}}</h3>

                    <p>{!! $val->field('description',$val->description) !!}</p>
                    <hr/>
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="row">
                                @if ($val->user)
                                    <div class="col-xs-2 text-center">
                                        <img
                                                data-src="/{{image_thumb_resize_canvas($val->user->avatar,50,50)}}"
                                                src="/{{image_thumb_resize_canvas($val->user->avatar,50,50)}}"
                                                alt="{{$val->user->name}}"
                                                class="img-circle">
                                    </div>
                                    <div class="col-xs-10">
                                        <small>Автор:
                                            <a href="/profile/{{$val->user->id}}">{{$val->user->name}}</a>
                                        </small><br>
                                        <small>Опубликовано: {{$val->publish->diffForHumans()}}</small><br>
                                        @if($val->tag)
                                            <small>Теги:@foreach($val->tag as $tag)
                                                    <a href="/tags/{{$tag->id}}">{{$tag->lable}}</a>
                                                @endforeach</small>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-3 text-center">
                            @if(!empty($val->content))
                                <p>
                                    <a href="{{$val->url}}" class="btn btn-primary" role="button">Подробнее</a>
                                </p>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <hr />
    @endforeach
    {!! $list->appends(Input::all())->render() !!}
@endif