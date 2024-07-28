import { defineStore } from "pinia";
import axios from "axios";

export const useUserStore = defineStore("user", {
    state: () => ({
        user: null,
    }),
    actions: {
        async fetchUser() {
            try {
                const response = await axios.get("/api/auth/user");
                this.user = response.data;
            } catch (error) {
                console.error("ユーザー情報の取得に失敗しました:", error);
                this.user = null;
            }
        },
        setUser(user) {
            this.user = user;
        },
        clearUser() {
            this.user = null;
        },
    },
    getters: {
        isAuthenticated: (state) => !!state.user,
        getUser: (state) => state.user,
    },
});
