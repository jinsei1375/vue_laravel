<script>
import { usePage } from "@inertiajs/vue3";
import { onMounted, ref } from "vue";

const message = ref("");
const type = ref("success");
const visible = ref(false);

export function showFlashMessage(newMessage, newType = "success") {
    visible.value = false; // まずvisibleをfalseにリセット
    setTimeout(() => {
        message.value = newMessage;
        type.value = newType;
        visible.value = true;
        setTimeout(() => {
            visible.value = false;
        }, 3000);
    }, 0); // 少しの遅延を入れてからvisibleをtrueに設定
}

export default {
    setup() {
        const page = usePage();

        onMounted(() => {
            if (page.props.flash.message) {
                showFlashMessage(page.props.flash.message, "success");
            }
        });

        return {
            message,
            type,
            visible,
        };
    },
};
</script>

<template>
    <div v-if="visible" :class="['flash-message', type, 'fadeOut']">
        {{ message }}
    </div>
</template>

<style>
.flash-message {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 10px;
    margin: 0;
    color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-size: 16px;
    text-align: center;
    transition: all 0.5s;
    z-index: 100;
}

.flash-message.success {
    background-color: #4caf50; /* 緑色の背景 */
}

.flash-message.error {
    background-color: #f44336; /* 赤色の背景 */
}

.flash-message.fadeOut {
    animation: fadeOut 5s forwards;
}

@keyframes fadeOut {
    from {
        opacity: 1;
    }
    to {
        opacity: 0;
        display: none;
    }
}
</style>
