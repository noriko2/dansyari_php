<template>
    <Link :href="'/'">
        <img
            src="/images/logo.png"
            id="logo-img"
            alt="断捨離できるくん"
            class="w-30 h-16"
            viewBox="0 0 48 48"
            fill="none"
            style="background-color: #0490b8"
        />
    </Link>
</template>

<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
    components: {
        Link,
    },
});
</script>
