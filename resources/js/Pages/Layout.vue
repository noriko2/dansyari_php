<!--inertiaの共通レイアウト-->
<!--この中の物が、<body>タグの中に入るイメージ-->
<!--resources/views/app.blade.php ▶︎ resources/js/Pages/Layout.vue の順で実行-->

<template>
    <header>
        <div class="container">
            <div class="header-items">
                <div class="site-logo">
                    <inertia-link href="/">
                        <img
                            src="/images/logo.png"
                            id="logo-img"
                            alt="断捨離できるくん"
                        />
                    </inertia-link>
                </div>
            </div>
        </div>
    </header>

    <hr />

    <!-- @yield('flash') -->

    <!-- <main>@yield('content')</main> -->
    <!--<slot />タグ...このレイアウトコンポーネントを呼び出されたときに、指定されたコンテンツに置き換わる。-->
    <main>
        <slot />
    </main>

    <hr class="hr-footer" />

    <footer>
        <div class="container">
            <p>&copy; 断捨離できるくん</p>
        </div>
    </footer>
</template>

<script>
import { defineComponent } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
    components: {
        Head,
        Link,
    },
    props: {
        title: String,
        canLogin: Boolean,
        canRegister: Boolean,
    },
    watch: {
        title: {
            immediate: true,
            handler(title) {
                document.title = title;
            },
        },
    },
});
</script>
