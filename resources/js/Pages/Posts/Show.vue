<script setup>
import { ref } from "vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/inertia";
import axios from "axios";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { showFlashMessage } from "@/Components/FlashMessage/FlashMessage.vue";

const props = defineProps({ post: Object, errors: Object });
const form = useForm({
    content: props.post.content,
});

const submit = async () => {
    form.content = content.value;
    try {
        form.post(route("update.post.post", { post: props.post.id }), {
            onSuccess: () => {
                content.value = form.content;
                showFlashMessage("投稿が更新されました", "success");
            },
        });
    } catch (error) {
        console.error(error);
        showFlashMessage("更新に失敗しました", "error");
    }
};

const handleDelete = async () => {
    if (confirm("削除しますか？")) {
        try {
            const response = await axios.post(`/delete-post/${props.post.id}`);
            console.log(response);
            if (response.status === 200) {
                Inertia.visit("/posts");
            }
        } catch (error) {
            console.error(error);
            showFlashMessage("削除に失敗しました", "error");
        }
    }
};
</script>

<template>
    <Head title="Posts" />
    <AuthenticatedLayout>
        <div>
            <p>投稿者: {{ post.user.name }}</p>
            <form @submit.prevent="submit">
                <div>
                    <label for="content">投稿内容</label>
                    <textarea id="content" v-model="form.content"></textarea>
                    <div v-if="errors.content">
                        <p>{{ errors.content }}</p>
                    </div>
                </div>
                <div>
                    <button type="submit">更新</button>
                </div>
            </form>
            <button @click="handleDelete">削除</button>
            <Link :href="route('posts.index')">戻る</Link><br />
        </div>
    </AuthenticatedLayout>
</template>
