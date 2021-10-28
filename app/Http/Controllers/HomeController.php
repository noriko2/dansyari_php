<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    public function index()
    {
        $items = ['服', '靴', 'バッグ', '本・雑誌', '食器', '化粧品', '家電', '思い出の品', '家具'];

        //return view('home.index', compact('items'));  // blade
        return Inertia::render('Home/Index', compact('items')); // vue
    }

    public function question()
    {
        $item_number = (int)request('id');
        $question_messages = array(
            'clothes' => ["毛玉、穴あき、シミがある？", "サイズが合わない?", "１年以上着ていない?"],
            'shoes' => ["ボロボロ？ 破れ、色あせ、靴底に穴あきがある？", "サイズが合わない？", "１年履いていない？"],
            'bags' => ["見た目がボロボロ？ ほつれ、シミ、破れや変色がある？", "１年以上使っていない？", "持つとテンションが下がる？"],
            'books' => [
                "１年間読んでいなくて、内容が思い出せない本？", "いつかやろうと思ったまま、途中になっている資格や語学の本？",
                "また読みたいと思わない本？ （ まだ読んでいない場合 ）これから読みたいと思わない本？"
            ],
            'dishes' => ["カケている？ ハゲている？", "１年間使っていない？", "使えるけど、気分が上がらない食器？"],
            'cosmetics' => ["クサい (油っぽい臭いがする）？", "1年間使っていない？", "テンションが上がらない？"],
            'electronics' => ["壊れている？(異臭がする・動かないなど)", "1年間使っていない？", "汚れがひどい？（友達に見せられないほど）"],
            'memories' => ["3年間振り返らなかった？", "あまり良い思い出ではない？", "似たようなモノ・写真が多い？"],
            'furniture' => ["その家具があることで、部屋が圧迫される？", "傷や汚れがひどい？", "テンションが上がらない？"]
        );
        // 「捨てる」が答えとなる場合に返すメッセージ
        $result_messages = array(
            'clothes' => [
                "清潔感がないように見えるよ。",
                "サイズが合わない服は着ないよ。",
                "1年着なかった服はこれからも着ないよ。"
            ],
            'shoes' => [
                "清潔感がないように見えるからね。外側が汚くなくても内側が汚いと、靴を脱いだ時にバレるから気をつけてね。",
                "サイズが合わなくて、いつも靴ずれしてしまう靴。見た目は好きだけど履くと不快に感じる靴は、結局手に取らないよ。",
                "履かなかった靴は、なんらかの履かない理由があるよ。
            スポーツ用に買ったけど、結局その機会がない。以前はよく履いていたけど、もう今の気分ではない靴など。思い切って手放そう。"
            ],
            'bags' => [
                "どんなに高かったバッグでも、清潔感がないように見えるよ。",
                "使っていないのには理由があるよ。年齢的に似合わなくなった。可愛いいけど、重くて使いにくい。小さすぎて使いづらい。色が合わせにくいなどね。",
                "可愛くても、重くて使いづらいバッグってあるよね。手放して、代わりに使いやすいバッグを手に入れよう。"
            ],
            'books' => [
                "内容が思い出せなければ、その本があなたに与えた印象が薄いということだよ。買い替えられる本は、手放そう。分厚い辞書なども断捨離しようね。検索するときは、ネットを使うよね？",
                "そのいつかは、こないよ。今の自分に必要な本があればいいんだよ。",
                "また読みたいと思わなかった本(これから読みたいと思わない本)は、もう読まないよ。手放して、今の自分に必要な本を読もう。"
            ],
            'dishes' => [
                "食器の替え時だよ。新しいものに代えよう。",
                "１年間使っていないものは、使用用途が限られている、使いにくい、お気に入りでないなど理由があるよ。
            場所をとるから、使えても手放そう。またお客様用の食器も使わなければ、日常用として使ってしまおう。",
                "毎日、お気に入りのものを使うと気分が上がるよ。気分が上がらないものは、手放そう。"
            ],
            'cosmetics' => [
                "リップなどは、開封してから２年ほどすると油っぽい臭いがしてくるよ。
            まだ残量があっても、使うたびに不快な気持ちになるから、お別れしよう。
            ちなみに化粧品の消費期限は、リップやリキッドファンデは１年、粉ものだと３年くらいと言われているよ。",
                "１年間手に取らなかったものは、手に取らない理由があるよ( 色が似合わなかった、肌に合わない、使いづらいなど )。
            いつか使おうは、今使わなければ この先も使わないよ。残しておいても劣化するから、思い切って手放そう。",
                "せっかくメイクをするのだから、自分のテンションを上げてくれるものを使おう。"
            ],
            'electronics' => [
                "不燃ゴミや粗大ゴミとして捨てられるよ。壊れたパソコンは、リサイクルショップで買い取ってくれる場合もあるよ。",
                "１年間使わなかったものは、今後も使わないよ。潔く手放そう！",
                "ずいぶん使い込んだみたいだね。「今までありがとう」とお礼を伝えて、買い替えよう！新しい製品は、消費電力や機能が良くなっていることが多いよ。"
            ],
            'memories' => [
                "３年間振り返らなかったら、もう振り返ることはないよ。どうしても心配な場合は、写真に納めて手放そう。",
                "手放そう！その方が幸せになれるよ。見返すことでパワーが湧いてくるものだけ残せばいいんだよ。",
                "似たようなものは、厳選して１つだけ残そう。そして他は手放そう。部屋がすっきりするよ。"
            ],
            'furniture' => [
                "部屋の大きさに合っていないみたいだね。なくても済むものは手放して、機能的に必要なものは、小さいものに買い替えよう。",
                "お礼を伝えて買い替えよう。綺麗にメンテナンスをして、使い続けてもいいよ。",
                "気分が上がるモノに買い換えよう！毎日幸せな気分になれるよ。"
            ]
        );

        $item = null;

        if ($item_number === 0) {
            $item = 'clothes';
        } elseif ($item_number === 1) {
            $item = 'shoes';
        } elseif ($item_number === 2) {
            $item = 'bags';
        } elseif ($item_number === 3) {
            $item = 'books';
        } elseif ($item_number === 4) {
            $item = 'dishes';
        } elseif ($item_number === 5) {
            $item = 'cosmetics';
        } elseif ($item_number === 6) {
            $item = 'electronics';
        } elseif ($item_number === 7) {
            $item = 'memories';
        } elseif ($item_number === 8) {
            $item = 'furniture';
        }

        $question_number = (int)request('question_number');

        // 質問数の最大値
        $max_question_number = 3;

        // $question_numberは、0からカウントしているため、1をひく
        if ($question_number <= $max_question_number - 1) {
            $question_message = $question_messages[$item][$question_number];
        }

        // $result_message_number: 捨てるという答えが決まった場合は 0以外の数値、決まっていない場合と捨てない場合は 0が入る。
        $result_message_number = (int)request('result_message_number');

        if ($result_message_number === 0) {
            if ($question_number < $max_question_number) {
                //return view('home.question', compact('question_number', 'question_message', 'item_number'));
                return Inertia::render('Home/Question', compact('question_number', 'question_message', 'item_number'));
            } elseif ($question_number === $max_question_number) {
                //return view('home.result_2'); // 残す
                return Inertia::render('Home/Result_2'); //残す
            }
        } elseif ($result_message_number !== 0) {
            $result_message = $result_messages[$item][$result_message_number - 1];
            //return view('home.result_1', compact('result_message')); //捨てる
            return Inertia::render('Home/Result_1', compact('result_message')); //捨てる
        } else {
            return redirect('/');
        }
    }
}
