<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const content = ref("");
const form = useForm({
    content: "",
});

const submit = async () => {
    form.content = content.value;
    try {
        await form.post("/create-post", {
            onSuccess: () => {
                // form.reset();
                // form.$inertia.visit(route("posts.index"));
                console.log("success");
            },
        });
    } catch (error) {
        console.error(error);
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
