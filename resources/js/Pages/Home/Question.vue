<template>
    <div class="top-visual">
        <div class="container top-visual-inner">
            <div id="question">
                <p>{{ question_message }}</p>

                <div id="question__btn">
                    <!--Yes-->
                    <div class="yes-btn btn-blu">
                        <!-- @if ( $question_number === 0 ) -->
                        <inertia-link
                            v-if="question_number === 0"
                            :href="route('question')"
                            :data="{
                                id: item_number,
                                result_message_number: 1,
                            }"
                            >Yes</inertia-link
                        >
                        <!-- @elseif ( $question_number === 1 ) -->
                        <inertia-link
                            v-else-if="question_number === 1"
                            :href="route('question')"
                            :data="{
                                id: item_number,
                                result_message_number: 2,
                            }"
                            >Yes</inertia-link
                        >
                        <!-- @else -->
                        <inertia-link
                            v-else
                            :href="route('question')"
                            :data="{
                                id: item_number,
                                result_message_number: 3,
                            }"
                            >Yes</inertia-link
                        >
                        <!-- @endif -->
                    </div>

                    <!--No-->
                    <div class="no-btn btn-blu">
                        <!-- @if ( $question_number === 0 ) -->
                        <inertia-link
                            v-if="question_number === 0"
                            :href="route('question')"
                            :data="{
                                id: item_number,
                                question_number: 1,
                            }"
                            >No</inertia-link
                        >
                        <!-- @elseif ( $question_number === 1 ) -->
                        <inertia-link
                            v-else-if="question_number === 1"
                            :href="route('question')"
                            :data="{
                                id: item_number,
                                question_number: 2,
                            }"
                            >No</inertia-link
                        >
                        <!-- @else -->
                        <inertia-link
                            v-else
                            :href="route('question')"
                            :data="{
                                id: item_number,
                                question_number: 3,
                            }"
                            >No</inertia-link
                        >
                        <!-- @endif -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Layout from "@/Pages/Layout";
export default {
    layout: Layout,
    props: ["question_message", "question_number", "item_number"],
};
</script>
