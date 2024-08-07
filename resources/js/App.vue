<template>
    <div id="app">
        <Header></Header>
        <FlashMessage
            v-if="flashMessageStore.visible"
            :message="flashMessageStore.message"
            :type="flashMessageStore.type"
        />
        <router-view></router-view>
    </div>
</template>
<script setup>
import Header from "../Components/Header.vue";
import FlashMessage from "../Components/FlashMessage.vue";
import { useFlashMessageStore } from "@/Stores/flashMessage";
const flashMessageStore = useFlashMessageStore();
</script>
