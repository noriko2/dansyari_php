<template>
    <Head title="Email Verification" />

    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo />
        </template>

        <div class="mb-4 text-sm text-gray-600">
            ご登録していただきありがとうございます！始める前に、
            登録のメールアドレスに先ほどお送りしたリンクをクリックしてメールアドレスの認証を完了させてください。メールが届かない場合は、別のメールをお送りします。
        </div>

        <div
            class="mb-4 font-medium text-sm text-green-600"
            v-if="verificationLinkSent"
        >
            登録時に指定したメールアドレスに認証リンクが送信されました。
        </div>

        <form @submit.prevent="submit">
            <div class="mt-4 flex items-center justify-between">
                <jet-button
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    認証メールを再送する
                </jet-button>

                <Link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="underline text-sm text-gray-600 hover:text-gray-900"
                    >ログアウト</Link
                >
            </div>
        </form>
    </jet-authentication-card>
</template>

<script>
import { defineComponent } from "vue";
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard.vue";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo.vue";
import JetButton from "@/Jetstream/Button.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
    components: {
        Head,
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        JetButton,
        Link,
    },

    props: {
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form(),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route("verification.send"));
        },
    },

    computed: {
        verificationLinkSent() {
            return this.status === "verification-link-sent";
        },
    },
});
</script>
