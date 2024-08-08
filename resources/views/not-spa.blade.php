<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1 {
            color: blue;
        }
    </style>
</head>
<body>
    <div id="app">
        <example-component></example-component>
    </div>

    <!-- Vue.jsのCDN -->
    <script src="https://cdn.jsdelivr.net/npm/vue@3.2.31/dist/vue.global.js"></script>
    <script>
        // Vueコンポーネントの定義
        const ExampleComponent = {
            template: `
                <div><h1>@{{ message }}</h1></div>
                <p>Count: @{{ count }}</p>
                <button @click="increment">Increment</button>
                `,
            data() {
                return {
                    message: 'Vue!',
                    count: 0
                }
            },
            methods: {
                increment() {
                    this.count++;
                }
            }
        };

        // Vueアプリケーションの作成
        const app = Vue.createApp({});
        app.component('example-component', ExampleComponent);
        app.mount('#app');
    </script>
</body>
</html>