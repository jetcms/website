@if(isset($list))
    @foreach($list as $val)
        <div class="row">
            <div class="col-md-4">
                @if ($val->image)
                <div class="thumbnail">
                        <img
                                data-src="/{{image_thumb_fit($val->image,200,200)}}"
                                src="/{{image_thumb_fit($val->image,200,200)}}"
                                alt="{{$val->title}}"
                                class="img-rounded">
                </div>
                @endif
            </div>
            <div class="col-md-8">
                <div class="caption">
                    <h3>{{$val->title}}</h3>

                    <p>{{$val->description}}</p>

                    <div class="row">
                        <div class="col-md-6">
                            @if ($val->user)
                                <p>Автор: <a href="/profile/{{$val->user->id}}">{{$val->user->name}}</a>

                                    <img
                                            data-src="/{{image_thumb_fit($val->user->avatar,40,40)}}"
                                            src="/{{image_thumb_fit($val->user->avatar,40,40)}}"
                                            alt="{{$val->user->name}}"
                                            class="img-circle">
                                </p>
                            @endif
                        </div>
                        <div class="col-md-6 text-right">
                            <p>
                                <a href="{{$val->url}}" class="btn btn-primary" role="button">Подробнее</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <hr />
    @endforeach
    {!! $list->appends(Input::all())->render() !!}
@endif