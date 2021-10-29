<template>
    <div class="container">
        <div class="registration-container profile-container">
            <div class="user_profile_image">
                <inertia-link :href="route('profile.show')"
                    ><img
                        src="/images/default-profile-image.png"
                        class="profile-image"
                /></inertia-link>
            </div>

            <!-- ユーザー名の表示 -->
            <h2 class="registration-head profile-name">
                {{ $page.props.user.name }}
            </h2>

            <div class="registration-form">
                <div class="single-content">
                    <p class="mypage-item mypage-item-number">断捨離数：点</p>
                    <inertia-link class="mypage-item btn-default btn-blu"
                        >断捨離を記録する</inertia-link
                    >
                    <inertia-link class="mypage-item btn-default btn-blu"
                        >断捨離を振り返る</inertia-link
                    >
                    <inertia-link
                        href="/home"
                        class="mypage-item btn-default btn-blu"
                        >断捨離できるくんに相談</inertia-link
                    >
                    <inertia-link
                        :href="route('profile.show')"
                        class="btn-default btn-gray"
                        >アカウント情報の編集</inertia-link
                    >
                </div>
            </div>
        </div>
    </div>

    <!-- <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div>
                <jet-application-logo class="block h-12 w-auto" />
            </div>
        </div>
    </div> -->
</template>

<script>
import { defineComponent } from "vue";
import JetApplicationLogo from "@/Jetstream/ApplicationLogo.vue";

export default defineComponent({
    components: {
        JetApplicationLogo,
    },
});
</script>
