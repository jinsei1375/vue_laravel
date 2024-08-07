<template>
    <div v-if="flashMessageStore.visible" class="flash-message" :class="type">
        {{ message }}
    </div>
</template>
<script setup>
import { useFlashMessageStore } from "@/Stores/flashMessage";
const flashMessageStore = useFlashMessageStore();
const props = defineProps({
    message: String,
    type: {
        type: String,
        default: "success", // 'success', 'error', 'info' など
    },
    duration: {
        type: Number,
        default: 3000, // デフォルトの表示時間（ミリ秒）
    },
});
</script>
<style scoped>
.flash-message {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    color: white;
    z-index: 1000;
}
.flash-message.success {
    background-color: green;
}
.flash-message.error {
    background-color: red;
}
.flash-message.info {
    background-color: blue;
}
</style>
