@extends('layouts.app')
@section('title','个人主页')
@section('content')
<div class="fly-home fly-panel" style="background-image: url();">
    <img src="{{ $user->avatar }}" alt="{{ $user->name }}">
    {{-- <i class="iconfont icon-renzheng" title="Fly社区认证"></i> --}}
    <h1>
        {{ $user->name }}

        @if($user->sex === 0)
        <i class="iconfont icon-nan"></i>

        @else
        <i class="iconfont icon-nv"></i>
        @endif
        {{-- <i class="layui-badge fly-badge-vip">VIP3</i> --}}
        <!--
    <span style="color:#c00;">（管理员）</span>
    <span style="color:#5FB878;">（社区之光）</span>
    <span>（该号已被封）</span>
    -->
    </h1>

    {{-- <p style="padding: 10px 0; color: #5FB878;">认证信息：{{ $user->provider }}</p> --}}

    <p class="fly-home-info">
        <i class="iconfont icon-kiss" title="飞吻"></i><span style="color: #FF7200;">{{ $user->love }} 飞吻</span>
        <i class="iconfont icon-shijian"></i><span>{{ $user->created_at->diffForHumans() }} 加入</span>
        <i class="iconfont icon-chengshi"></i><span>来自{{ $user->city }}</span>
    </p>

    <p class="fly-home-sign">（{{ $user->description }}）</p>

    <div class="fly-sns" data-user="">
        <a href="javascript:;" class="layui-btn layui-btn-primary fly-imActive" data-type="addFriend">加为好友</a>
        <a href="javascript:;" class="layui-btn layui-btn-normal fly-imActive" data-type="chat">发起会话</a>
    </div>

</div>

<div class="layui-container">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md6 fly-home-jie">
            <div class="fly-panel">
                <h3 class="fly-panel-title">{{ $user->name }} 最近的提问</h3>
                <ul class="jie-row">
                    @foreach($topics as $topic)
                    <li>
                        @if($topic->good_topic)
                        <span class="fly-jing">精</span>
                        @endif
                        <a href="{{ $topic->link()  }}" class="jie-title">{{ $topic->title }}</a>
                        <i>{{ $topic->created_at_human }}</i>
                        <em class="layui-hide-xs">{{ $topic->view_count }}阅/{{ $topic->reply_count }}答</em>
                    </li>
                    @endforeach
                    <!-- <div class="fly-none" style="min-height: 50px; padding:30px 0; height:auto;"><i style="font-size:14px;">没有发表任何求解</i></div> -->
                </ul>
            </div>
        </div>

        <div class="layui-col-md6 fly-home-da">
            <div class="fly-panel">
                <h3 class="fly-panel-title">{{ $user->name }} 最近的回答</h3>
                <ul class="home-jieda">

                    @if(count($replies))
                    @foreach($replies as $replie)
                    <li>
                        <p>
                            <span>{{ $replie->updated_at->diffForHumans() }}</span>
                            在<a href="{{ $replie->topic->link() }}" target="_blank">{{ $replie->topic->title }}</a>中回答：
                        </p>
                        <div class="home-dacontent">
                            {!! $replie->content !!}
                        </div>
                    </li>
                    @endforeach
                    @else

                   <div class="fly-none" style="min-height: 50px; padding:30px 0; height:auto;"><span>没有回答任何问题</span></div>
                   @endif
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection