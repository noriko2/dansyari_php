<template>
    <Head title="Forgot Password" />

    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo />
        </template>

        <h2 class="registration-head">パスワードをお忘れの場合</h2>
        <div class="mb-4 text-sm text-gray-600">
            パスワードをお忘れの場合は、ご登録のメールアドレスを入力し送信ボタンを押してください。<br />
            パスワード再発行リンクを送信します。
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <jet-label for="email" value="メールアドレス" />
                <jet-input
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autofocus
                />
            </div>

            <div class="flex items-center justify-end mt-4">
                <jet-button
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    パスワード再発行リンクを送信する
                </jet-button>
            </div>
        </form>
    </jet-authentication-card>
</template>

<script>
import { defineComponent } from "vue";
import { Head } from "@inertiajs/inertia-vue3";
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard.vue";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo.vue";
import JetButton from "@/Jetstream/Button.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetValidationErrors from "@/Jetstream/ValidationErrors.vue";

export default defineComponent({
    components: {
        Head,
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        JetButton,
        JetInput,
        JetLabel,
        JetValidationErrors,
    },

    props: {
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                email: "",
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route("password.email"));
        },
    },
});
</script>
