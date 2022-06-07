<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- <script src="https://unpkg.com/tailwindcss-jit-cdn"></script> -->
    <script src="https://cdn.tailwindcss.com"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
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
          crossorigin="" />
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
            $("#txt_DATE").datepicker({ dateFormat: 'yy/mm/dd' }).val();
        });
    </script>
    <link rel="stylesheet" href="./style.css" />
    <title>堀頭里長青照護</title>

</head>

<body class="bg-orange-200">
<div class="w-full h-full">
    <!-- 功能列 -->
    <div class="flex justify-between ">
        <!-- 搜尋 -->
        <div class="flex pl-10 pt-5 pr-3">
            <div class="flex justify-center">
                <div class="">
                    <div class="input-group relative flex flex-wrap items-stretch w-44">
                        <input type="search" class=" h-12 form-control relative flex-auto block w-full px-3 py-1.5 font-bold text-xl text-gray-700 bg-white bg-clip-padding border border-gray-700 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-100 focus:outline-none" placeholder="搜尋" aria-label="Search" aria-describedby="button-addon3">
                    </div>
                </div>
            </div>
        </div>
        <!-- /搜尋 -->

        <!-- 增加 -->
        <div class="flex pr-10 pt-5">
            <button type="submit" class="
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

    <!-- 居民清單 -->
    <div class="w-full px-10 pt-5">
        <!-- 單行 -->
        <div class="w-full border border-gray-700 bg-white">
        @foreach($data as $key=>$row)
{{--            <a>{{$row->name}}</a>--}}

                <div class="flex space-x-2 justify-between p-2 border border-gray-700">
                    <a href="{{route("person_data")}}?user_id={{$row->user_id}}"
                       class="inline-block px-2 py-1 bg-gray-600 text-white text-2xl leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out">
                        {{$row->user_name}}
                        {{substr($row->id_num, -4)}}
                    </a>
                    <button type="button"
                            class="w-fit inline-block px-2 py-1 bg-gray-600 text-white text-2xl text-lg leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out">
                        刪除
                    </button>
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
    $.ajax({
        url:url,
        method:'GET',
        data:'',
        success:function (res){
            //
        },
        false:function (res){
            //
        }
    })
</script>
</html>
