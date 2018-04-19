@extends ('layouts.master')
@section ('content')



    <div id="root">

        <ul>

            <li v-for="name in names">@{{name}}</li>

        </ul>

    </div>



    <script src="https://unpkg.com/vue@2.1.3/dist/vue.js"></script>

    <script>



        new Vue({

            el: '#root',

            data: {
                names: ['Danny', 'Chloe', 'Alexis']
            }

        })

    </script>



@endsection