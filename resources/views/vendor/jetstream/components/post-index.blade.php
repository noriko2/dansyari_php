<x-app-layout>
    <div class="container">
        <div class="registration-container image-container">
            <div class="user_profile_image">
                <img src="{{ Auth::user()->profile_photo_url }}" class="profile-image" alt="プロフィール画像">
            </div>
            <h2 class="registration-head image-head">断捨離したもの記録</h2>
            <div class="image-form">
                @if ($posts->isEmpty())
                <div class="top-visual-inner">
                    <div class="post-nothing-1">
                        <img src="/images/robot.png" id="robot-img" alt="断捨離できるくん">
                    </div>
                    <div class="post-nothing-2">
                        <p>断捨離記録は、まだないよ</p>
                    </div>
                </div>
                @else
                <div class="image-column">
                    @foreach ($posts as $post)
                    <div class="image-group">
                        <div class="image-item">
                            <img src="{{ $post->post_image }}" class="image-post">
                        </div>
                        <div class="image-caption">
                            <p>{{$post->created_at->format('Y年m月d日')}}の記録</p>
                            <p>{{ $post->caption }}</p>
                            <div class="post-delete">
                                <form method="post" action="{{ route('posts.destroy', $post) }}">
                                    @csrf @method('delete')
                                    <input type="submit" value="記録を削除" class="btn-default btn-gray btn-delete">
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif

            </div>

            <!-- ページネーション -->
            {{ $posts->links() }}
        </div>　　　　
    </div>
</x-app-layout>
