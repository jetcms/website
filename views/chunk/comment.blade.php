@if (isset($comments))

    @foreach ($comments as $key=>$val)
        @if (isset($val->user))
            <a name="comment-{{$key+1}}" class="comment-margin-top"></a>
            <div class="media">
                <div class="pull-left">
                    <a href="/profile/{{$val->user->id}}">
                        <img
                                class="media-object img-circle avatar-menu"
                                src="/{{image_thumb_fit($val->user->avatar,80,80)}}"
                                alt="{{$val->user->name}}">

                    </a>
                    <a href="{{Request::url()}}#comment-{{$key+1}}">
                        <small>#comment-{{$key+1}}</small>
                    </a>
                </div>
                <div class="media-body">
                    <p>{!! $val->content !!}</p>
                    <hr />
                    <h5 class="media-heading"> <small>{{$val->user->name}} | добавлено
                            {{$val->updated_at->diffForHumans()}}</small></h5>
                    @if(Auth::check())
                        @if(Auth::user()->id != $val->user->id)
                            <a href="{{Request::url()}}?reply={{$val->id}}#view-comment-form">Ответить</a>
                        @endif
                        @if(Auth::user()->id == $val->user->id)
                            <a href="{{url('comment/remove')}}/{{$val->id}}">Удалить</a>
                        @endif
                    @endif
                    @if ($val->reply_id)
                        <small class="pull-right">ответ на <a
                                    href="#comment-{{$val->reply_id}}">comment-{{$val->reply_id}}</a></small>
                    @endif

                </div>

            </div>

            <hr/>
        @else

            <a name="comment-{{$key+1}}" class="comment-margin-top"></a>
            <div class="media">
                <div class="pull-left">

                    <img
                        class="media-object img-circle avatar-menu"
                        src="/{{image_thumb_fit('img/avatar.png',80,80)}}"
                        alt="Удален">

                    <a href="{{Request::url()}}#comment-{{$key+1}}">
                        <small>#comment-{{$key+1}}</small>
                    </a>
                </div>
                <div class="media-body">
                    <p>{!! $val->content !!}</p>
                    <hr />
                    <h5 class="media-heading"> <small>Пользователь удален | добавлено
                            {{$val->updated_at->diffForHumans()
                    }}</small></h5>

                    @if ($val->reply_id)
                        <small class="pull-right">ответ на <a
                                    href="#comment-{{$val->reply_id}}">comment-{{$val->reply_id}}</a></small>
                    @endif

                </div>

            </div>

            <hr/>

        @endif
    @endforeach

@endif

<a name="view-comment-form" class="comment-margin-top"></a>
<form role="form" method="POST" action="/comment/add">
    @if (Input::has('reply'))
        <small>ответ на <a  href="#comment-{{Input::get('reply')}}">comment-{{Input::get('reply')}}</a></small>
    @endif
    <div class="form-group">
            <textarea
                    name="comment"
                    rows="10"
                    class="form-control"
                    placeholder="Оставьте свой коментарий здесь"></textarea>
    </div>

    <input name="reply_id" type="hidden" value="{{Input::get('reply')}}">
    <input name="_token" type="hidden" value="{{csrf_token()}}">
    <input name="page_id" type="hidden" value="{{$page->id}}">
    <input name="url" type="hidden" value="{{Request::url()}}">
    @if (Auth::check())
        <button type="submit" class="btn btn-success">Коментировать</button>
    @else
        <a  href="/auth/login" class="btn btn-success">Коментировать</a>
    @endif
</form>