<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link, Head } from "@inertiajs/vue3";
import { defineProps } from "vue";
import { Inertia } from "@inertiajs/inertia";
import axios from "axios";

const props = defineProps({
    post: Object,
});

// Inertia.post(route("delete.post.post", { post: postId }));
const handleDelete = async () => {
    if (confirm("削除しますか？")) {
        const response = await axios.post(`/delete-post/${props.post.id}`);
        console.log(response);
        if (response.status === 200) {
            Inertia.visit("/posts");
        }
    }
};
</script>

<template>
    <Head title="Posts" />
    <AuthenticatedLayout>
        <div>
            <p>投稿者: {{ post.user.name }}</p>
            <p>{{ post.content }}</p>
            <Link :href="route('posts.index')">戻る</Link><br />
            <button @click="handleDelete">削除</button>
        </div>
    </AuthenticatedLayout>
</template>
