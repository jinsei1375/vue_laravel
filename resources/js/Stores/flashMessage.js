// stores/flashMessage.js
import { defineStore } from "pinia";
import { ref } from "vue";

export const useFlashMessageStore = defineStore("flashMessage", () => {
    const message = ref("");
    const type = ref("success");
    const visible = ref(false);

    function showFlashMessage(newMessage, newType = "success") {
        message.value = newMessage;
        type.value = newType;
        visible.value = true;
        console.log(visible.value);
        setTimeout(() => {
            visible.value = false;
        }, 3000);
    }

    return { message, type, visible, showFlashMessage };
});
