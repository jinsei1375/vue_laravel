<script setup>
import { showFlashMessage } from "@/Components/FlashMessage/FlashMessage.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Inertia } from "@inertiajs/inertia";
import { Head, useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const content = ref("");
const form = useForm({
    content: "",
});

const submit = async () => {
    form.content = content.value;
    try {
        const response = await axios.post(route("create.post.post"), {
            content: form.content,
        });

        if (response.status === 200) {
            form.reset("content");
            Inertia.visit(route("post.show.get", { post: response.data.id }));
        } else {
            showFlashMessage("投稿の追加に失敗しました", "error");
        }
    } catch (error) {
        console.error(error);
        showFlashMessage("追加に失敗しました", "error");
    }
};
</script>

<template>
    <Head title="Posts" />
    <AuthenticatedLayout>
        <div>
            <h1>投稿追加</h1>
        </div>
        <button @click="$inertia.visit(route('posts.index'))">
            自分の投稿を表示
        </button>
        <!-- 投稿追加するためのフォーム作成 -->
        <form @submit.prevent="submit">
            <div>
                <label for="content">投稿内容</label>
                <textarea id="content" v-model="content"></textarea>
            </div>
            <div>
                <button type="submit">投稿</button>
            </div>
        </form>
    </AuthenticatedLayout>
</template>

<style>
h1 {
    margin-bottom: 20px;
    text-align: center;
}
li {
    border-bottom: 1px solid #ccc;
    margin-bottom: 10px;
    padding-bottom: 10px;
}
button {
    margin: 10px;
    border: 1px solid #ccc;
}
</style>
