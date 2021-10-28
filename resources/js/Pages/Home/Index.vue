<template>
    <div class="top-visual top-visual-home">
        <div class="container top-visual-inner">
            <div class="top-visual__1">
                <img
                    src="/images/robot.png"
                    id="top-visual-home__img"
                    alt="断捨離できるくん"
                />
            </div>
            <div class="top-visual__2 top-visual-home__2">
                <p>ボクに任せて !</p>
                <p>質問に答えるだけで<br />カンタンに断捨離できるよ</p>
                <inertia-link
                    href="#jump-question"
                    class="btn btn-primary start-btn"
                >
                    さっそく始める
                </inertia-link>
            </div>
        </div>
    </div>
    <hr />
    <div class="container question">
        <h2><a id="jump-question">断捨離したいものは？</a></h2>
        <div class="question__items">
            <div
                class="question__item btn-blu"
                v-for="(item, index) in items"
                :key="item.id"
            >
                <p>
                    <inertia-link
                        :href="route('question')"
                        :data="{ id: index, question_number: 0 }"
                    >
                        {{ item }}
                    </inertia-link>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import Layout from "@/Pages/Layout";
export default {
    layout: Layout,
    props: ["items"],
};
</script>
