<!DOCTYPE html>
<html>
<head>
    <title>Create a link</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        input:focus {
            outline: none;
        }
    </style>
</head>
<body class="font-sans">
    <div id="root" class="container w-1/2 mx-auto my-10">
        <div class="mb-10">
            <h2>Use one of these factory links</h2>
            <ul class="list-reset">
                @foreach ($factoryLinks as $link)
                    <li>{{ $link->first_name }} {{ $link->last_name }} - $ {{ $link->approved }} - <a href="{{ '/?utm_source=epixian&utm_term=' . base64_encode(json_encode($link)) }}">link</a></li>
                @endforeach
            </ul>
        </div>

        <div>
            <h2>or create your own!</h2>
            <span class="block border inset p-2 mb-4 rounded"><input id="first_name" @keyup="generateLink" v-model="first_name" placeholder="First name"></span>
            <span class="block border inset p-2 mb-4 rounded"><input id="last_name" @keyup="generateLink" v-model="last_name" placeholder="Last name"></span>
            <span class="block border inset p-2 mb-4 rounded">$<input class="ml-2" id="approved" @keyup="generateLink" v-model="approved" placeholder="Approved amount"></span>

            <p><a :href="url"><span v-text="url"></span></a></p>
        </div>

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