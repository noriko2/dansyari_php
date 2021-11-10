<!-- resources/views/dashboard.blade.phpで x-jet-welcome/として呼び出される中身 -->
<!-- ログイン時のメニュー -->

<div class="container">
    <div class="registration-container profile-container">
        <!-- プロフィール画像の表示 -->
        <div class="user_profile_image">
            <a href="{{ route('profile.show') }}">
                <img src="{{ Auth::user()->profile_photo_url }}" class="profile-image" alt="プロフィール画像">
            </a>
        </div>

        <!-- ユーザー名の表示 -->
        <h2 class="registration-head profile-name">
            {{ Auth::user()->name }}
        </h2>

        <div class="registration-form">
            <div class="single-content">
                <p class="mypage-item mypage-item-number">
                    断捨離数： {{ Auth::user()->posts()->count() }}点
                </p>
                <a href="{{ route('posts.create') }}" class="mypage-item btn-default btn-blu">断捨離を記録する</a>
                <a href="#" class="mypage-item btn-default btn-blu">断捨離を振り返る</a>
                <a href="/" class="mypage-item btn-default btn-blu">断捨離できるくんに相談</a>
                <a href="{{ route('profile.show') }}" class="btn-default btn-gray">アカウント情報の編集</a>
            </div>
        </div>
    </div>
</div>
