<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // ログインユーザーの投稿一覧ページ
    public function index()
    {
        $current_user = Auth::user();
        $posts = POST::where('user_id', $current_user->id)->orderByDesc('created_at')->paginate(12);

        return view('vendor.jetstream.components.post-index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 新規投稿ページ
    public function create()
    {
        return view('vendor.jetstream.components.post-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーション
        $data = $request->validate([
            'caption' => ['nullable', 'string', 'max:300'],
            'post_image' => ['required', 'file', 'mimes:jpeg,png,jpg', 'max:2000'],
        ]);

        //ログインユーザーを取得
        $current_user = $request->user();

        # 画像ファイルのアップロード
        $image = $request->file('post_image');
        if (app()->isLocal() || app()->runningUnitTests()) {
            # 開発環境
            //storage/app/public/postsに画像ファイルを保存し、ファイルパスを変数に代入
            $path = $image->store('posts', 'public');
            $data['post_image']  = Storage::url($path);
        } else {
            # 本番環境
            // s3バケットへアップロード
            //putの第3引数にpublicを指定することで、ファイルをパブリックファイルとしてアップロードする。publicを指定せずにアップロードしても、アップロードはできても参照ができない。
            $path = Storage::disk('s3')->put('/uploads', $image, 'public');
            info($path);
            // アップロードした画像のフルパスを取得
            $data['post_image'] = Storage::disk('s3')->url($path);
        }

        $post = $current_user->posts()->create($data);

        if ($post) {
            return redirect('/dashboard')->with('flash_notice', '投稿が完了しました');
        } else {
            return redirect()->route('posts.create')->with('flash_alert', '投稿に失敗しました');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $current_user = Auth::user();

        if ($current_user->id == $post->user_id) {
            if ($post->delete()) {
                return redirect()->route('posts.index')->with('flash_notice', '投稿を削除しました');
            } else {
                return redirect()->route('posts.index')->with('flash_alert', '投稿の削除に失敗しました');
            }
        } else {
            return redirect('/');
        }
    }
}
