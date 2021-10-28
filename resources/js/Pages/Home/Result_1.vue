<template>
    <div class="top-visual">
        <div class="container top-visual-inner result">
            <div class="top-visual__1 result-1">
                <img
                    src="/images/robot.png"
                    id="robot-img"
                    alt="断捨離できるくん"
                />
                <img src="/images/gomibako.png" id="gomi-img" alt="ゴミ" />
            </div>
            <div class="top-visual__2 result-2">
                <h1>診断結果</h1>
                <p>今すぐ手放そう</p>
                <p>{{ result_message }}</p>
            </div>
        </div>
    </div>
</template>

<script>
import Layout from "@/Pages/Layout";
export default {
    layout: Layout,
    props: ["result_message"],
};
</script>
