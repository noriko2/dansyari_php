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
                            <p class="image-post">{{ $post->caption }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif

            </div>

        </div>　　　　
    </div>
</x-app-layout>
