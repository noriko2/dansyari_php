<x-app-layout>
    <!-- バリデーション失敗時のエラーメッセージ -->
    @error('caption')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="container">
        <div class="registration-container">
            <h2 class="registration-head">断捨離を記録する</h2>

            <div class="registration-form">
                <div class="single-content">
                    <form method="POST" action="{{ route('posts.store') }}">
                        @csrf
                        <div class="field form-group">
                            <p>断捨離したアイテム画像を選択してください<br>
                                <small>( ※１アイテム１画像でお願いします )</small>
                            </p>
                            <input type="file">
                        </div>
                        <div class="field form-group">
                            <textarea name="caption" placeholder="メモを残す...(任意)&#13;&#10;例) ナイキスニーカー。靴の中に穴があいていたため断捨離。" class="post-memo"></textarea>
                        </div>
                        <div class=" field form-group">
                            <input type="submit" value="記録する" class="btn-default btn-blu btn-post">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
