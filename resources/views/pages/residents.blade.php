<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- <script src="https://unpkg.com/tailwindcss-jit-cdn"></script> -->
    <script src="https://cdn.tailwindcss.com"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>

    <!-- 地圖 -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
          integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
          crossorigin=""/>
    <style>
        #map {
            width: 100%;
            height: 100%;
        }
    </style>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#txt_DATE").datepicker({dateFormat: 'yy/mm/dd'}).val();
        });
    </script>
    <link rel="stylesheet" href="./style.css"/>
    <title>堀頭里長青照護</title>

</head>

<body class="bg-orange-200">
<div class="w-full h-full">
    <!-- 功能列 -->
    <div id="top_function" class="flex justify-between pb-1">
        <!-- 搜尋 -->
        <div class="flex pl-10 pt-5 pr-3">
            <div class="flex justify-center">
                <div class="">
                    <div class="input-group relative flex flex-wrap items-stretch w-44">
                        <input id="search_input" type="search" class="h-12 form-control relative flex-auto block w-full px-3 py-1.5 font-bold text-xl text-gray-700 bg-white bg-clip-padding border border-gray-700 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-100 focus:outline-none" placeholder="搜尋" aria-label="Search" aria-describedby="button-addon2">
                        <button onclick="search_btn()" class="btn inline-block border border-gray-700 px-6 py-2.5 bg-blue-200 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center" type="button" id="button-addon2">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path class="text-gray-700" fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /搜尋 -->


        <!-- 增加 -->
        <div class="flex pr-10 pt-5">
            <button id="open_box" onclick="open_add_box()" class="
            w-fit
            px-2
            py-1
            text-3xl
            font-bold
            text-gray-700
            bg-blue-100
            border border-gray-700
            rounded">
                增加
            </button>
        </div>
        <!-- /增加 -->
    </div>
    <!-- /功能列 -->

    <!-- 新增居民功能列 -->
    <div id="add_box" class="border border-gray-500 hidden">
        <div id="alert_title" class="pl-10 pt-5">
            <div class="font-bold text-2xl text-gray-500">新增一位居民</div>
        </div>
        <div id="alert_fail" class="hidden pl-10 pt-5">
            <div class=" font-bold text-2xl text-red-500">新增失敗 請檢查</div>
        </div>
        <!-- 姓名 -->
        <div class="pl-10 pt-2 pr-3">
            <div class="font-bold text-xl text-gray-800">姓名</div>
        </div>
        <div class="flex pl-10 pr-3">
            <div class="flex justify-center">
                <div class="">
                    <div class="input-group relative flex flex-wrap items-stretch w-44">
                        <input id="add_name"
                               class="input_cell h-12 form-control relative flex-auto block w-full px-3 py-1.5 font-bold text-xl text-gray-700 bg-white bg-clip-padding border border-gray-700 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-100 focus:outline-none"
                               placeholder="姓名" aria-label="Search" aria-describedby="button-addon3">
                    </div>
                </div>
            </div>
        </div>
        <!-- /姓名 -->
        <!-- 身分證字號 -->
        <div class="pl-10 pt-5 pr-3">
            <div class="font-bold text-xl text-gray-800">身分證字號</div>
        </div>
        <div class="flex pl-10 pr-3">
            <div class="flex justify-center">
                <div class="">
                    <div class="input-group relative flex flex-wrap items-stretch w-44">
                        <input id="add_id_num"
                               class="input_cell h-12 form-control relative flex-auto block w-full px-3 py-1.5 font-bold text-xl text-gray-700 bg-white bg-clip-padding border border-gray-700 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-100 focus:outline-none"
                               placeholder="身分證字號" aria-label="Search" aria-describedby="button-addon3">
                    </div>
                </div>
            </div>
        </div>
        <!-- /身分證字號 -->
        {{-- 增加 取消 功能列--}}
        <div class="flex pl-10 pt-5 pb-5">
            <!-- 增加 -->
            <div class="flex pt-5 pb-5">
                <button onclick="sure_add()" class="
            w-fit
            px-2
            py-1
            text-3xl
            font-bold
            text-gray-700
            bg-blue-100
            border border-gray-700
            rounded">
                    確定增加
                </button>
            </div>
            <!-- /增加 -->
            <!-- 取消 -->
            <div class="flex pl-10 pt-5 pb-5">
                <button id="cancel_add" onclick="cancel()" class="
            w-fit
            px-2
            py-1
            text-3xl
            font-bold
            text-gray-700
            bg-blue-100
            border border-gray-700
            rounded">
                    取消
                </button>
            </div>
            <!-- /取消 -->
        </div>


        {{-- /增加 取消 功能列--}}
    </div>

    <!-- /新增居民功能列 -->
    <!-- 檢視全部 -->
    <div class="flex px-10 pt-5">
        <button href="" onClick="see_all()" class="
            w-full
            px-1
            py-1
            text-lg
            font-bold
            text-gray-700
            bg-blue-100
            border border-gray-700
            rounded">
            檢視全部
        </button>
    </div>
    <!-- /檢視全部 -->
    <!-- 居民清單 -->
    <div class="w-full px-10 pt-1 pb-10">
        <!-- 單行 -->
        <div class="w-full table border border-gray-700 bg-white">
            @foreach($data as $key=>$row)
                {{--            <a>{{$row->name}}</a>--}}
                <div class="flex people_table space-x-2 justify-between p-2 border border-gray-700">
                    <a href="{{route("person_data")}}?user_id={{$row->user_id}}"
                       class="inline-block px-2 py-1 bg-gray-600 text-white text-2xl leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out">
                        {{$row->user_name}}
{{--                        {{substr($row->id_num, -4)}}--}}
                    </a>
                    <a href="{{route("delete_residents_data")}}?user_id={{$row->user_id}}"
                            class="w-fit inline-block px-2 py-1 bg-gray-600 text-white text-center grid content-center text-2xl text-lg leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out">
                        刪除
                    </a>
                </div>
                {{--                            <input value="{{$input_value}}"/>--}}
            @endforeach
        </div>
        <!-- /單行 -->
    </div>


    <!-- /居民清單 -->


    <!-- 功能列 -->
    <div class="flex justify-end ">


        <!-- 登出 -->
        <div class="flex px-10 pt-5">
            <a href="{{route("get_login_page")}}" class="
            w-fit
            px-3
            py-1.5
            text-3xl
            font-bold
            text-gray-700
            bg-blue-100
            border border-gray-700
            rounded">
                登出
            </a>
        </div>
    </div>
    <!-- /功能列 -->

</div>


</body>
<script>

    function open_add_box() {
        $('#add_box').removeClass('hidden');
        $('#top_function').addClass('hidden');

    }

    function sure_add() {
        let input_cell = $('.input_cell');
        $.each(input_cell, function (index, value) {
            if (input_cell.eq(index).val().trim().length === 0) {
                $('#alert_fail').removeClass('hidden');
                $('#alert_title').addClass('hidden');
            }
        })

        let add_id_num = $('#add_id_num').val();
        let add_name = $('#add_name').val();

        $.ajax({
            url: '{{route('insert_residents_data')}}',
            method: 'POST',
            data: {
                _token: '{{csrf_token()}}',
                add_id_num: add_id_num,
                add_name: add_name,
            },
            success: function (res) {
                //新增成功再關掉
                location.reload();
            },
            false: function (err) {

            }
        })


    }

    function cancel() {
        $('#alert_fail').addClass('hidden');
        $('#alert_title').removeClass('hidden');
        $('#add_box').addClass('hidden');
        $('#top_function').removeClass('hidden');

    }

    function see_all(){
        location.reload();
    }

    function search_btn(){
        let key_word=$('#search_input').val();
        $('.table .people_table').remove();

        $.ajax({
            url: '{{route('search_residents_data')}}',
            method: 'GET',
            data: {
                key_word:key_word,
            },
            success: function (res) {
                console.log(res);
                if (res.length>0){
                    res.forEach(function (row){
                        $('.table').append(`
                        <div class="flex people_table space-x-2 justify-between p-2 border border-gray-700">
                    <a href="{{route("person_data")}}?user_id=${row['user_id']}"
                       class="inline-block px-2 py-1 bg-gray-600 text-white text-2xl leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out">
                        ${row['user_name']} ${row['id_num'].substr(-4)}
                        </a>
                        <a href="{{route("delete_residents_data")}}?user_id=${row['user_id']}"
                            class="w-fit inline-block px-2 py-1 bg-gray-600 text-white text-center grid content-center text-2xl text-lg leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out">
                        刪除
                    </a>
                </div>
                        `);
                    })
                }

            },
            false: function (res) {
                //
            }
        })
    }

    // $.ajax({
    //     url: url,
    //     method: 'GET',
    //     data: '',
    //     success: function (res) {
    //         //
    //     },
    //     false: function (res) {
    //         //
    //     }
    // })
</script>
</html>
