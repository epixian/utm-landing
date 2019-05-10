<!DOCTYPE html>
<html>
<head>
    <title>Create a link</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="font-sans">
    <div id="root" class="container mx-auto my-10">
        <input class="block border p-2 mb-4 rounded" id="first_name" @keyup="generateLink" v-model="first_name" placeholder="First name">
        <input class="block border p-2 mb-4 rounded" id="last_name" @keyup="generateLink" v-model="last_name" placeholder="Last name">
        <input class="block border p-2 mb-4 rounded" id="approved" @keyup="generateLink" v-model="approved" placeholder="Approved amount">

        <p><a :href="url"><span v-text="url"></span></a></p>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue"></script>

    <script>
        Vue.config.devtools = true;

        var app = new Vue({
            el: '#root',
            data: {
                first_name: '',
                last_name: '',
                approved: '',
                url_base: '/?utm_source=epixian&utm_term=',
                url: '',
                encoded: '',
            },

            methods: {
                generateLink() {
                    let json = JSON.stringify({
                        first_name: this.first_name,
                        last_name: this.last_name,
                        approved: this.approved
                    });
                    this.encoded = btoa(json);
                    this.url = this.url_base + this.encoded;
                    this.decoded = JSON.parse(atob(this.encoded));
                }
            },

            mounted() {
                this.url = this.url_base;
            }
        });
    </script>
</body>
</html>