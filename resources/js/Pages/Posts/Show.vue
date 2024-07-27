<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { defineProps } from "vue";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
    post: Object,
});

const handleDelete = (postId) => {
    if (confirm("削除しますか？")) {
        // routesのdelete.post.postにアクセス;
        // Inertia.post(route("delete.post.post", { post: postId }), {
        //     onSuccess: () => {
        //         // 削除成功時に/postsに遷移
        //         // Inertia.visit(route("posts.index"));
        //     },
        // });
        Inertia.post(route("delete.post.post", { post: postId }));
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
            <button @click="handleDelete(post.id)">削除</button>
        </div>
    </AuthenticatedLayout>
</template>
