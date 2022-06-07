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

<body class="bg-orange-200 w-full h-screen">
<div class="w-full h-full">
    <div class="pt-10">
        <!-- 個資 -->
        <div class="px-10">
            <div class="flex justify-top">
                <div class="grid font-bold content-center text-xl mr-2">
                    居民姓名:
                </div>
                <div class="grid content-center">
                    <a class="
                h-10
                w-48
                px-3
                py-1
                text-2xl
                font-bold
                text-gray-700
                bg-orange-200 bg-clip-padding
                border border-solid border-gray-700
                rounded
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                        {{$user_data->user_name}}
                    </a>
                </div>
            </div>
            <div class="flex justify-top mt-5">
                <div class="grid font-bold content-center text-xl mr-2">
                    身分證字號:
                </div>
                <div class="grid content-center">
                    <a class="
                h-10
                w-48
                px-3
                py-1
                text-2xl
                font-bold
                text-gray-700
                bg-orange-200 bg-clip-padding
                border border-solid border-gray-700
                rounded
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                        {{$user_data->id_num}}
                    </a>
                </div>
            </div>
        </div>
        <!-- /個資 -->

        <div class="flex justify-between ">
            <!-- 日期 -->
            <div class="flex ml-10 mt-10">
                <input id="txt_DATE" type="text" class="
        field
        w-36
        h-fit
        px-3
        py-1
        font-bold
        text-lg
        text-gray-700
        bg-blue-100
        bg-clip-padding
        border border-solid border-gray-700
        rounded
        transition
        ease-in-out
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="日期"/>
            </div>
            <!-- /日期 -->

            <!-- 修改 -->
            <div class="flex mt-10">
                <a href="" class="
            w-fit
            h-fit
            px-3
            py-1
            text-xl
            font-bold
            text-gray-700
            bg-blue-100
            border border-gray-700
            rounded">
                    修改
                </a>
            </div>
            <!-- /修改 -->

            <!-- 登出 -->
            <div class="flex mr-10 mt-10">
                <button href="" onClick="window.history.go(-1)" class="
            w-fit
            h-fit
            px-3
            py-1
            text-xl
            font-bold
            text-gray-700
            bg-blue-100
            border border-gray-700
            rounded">
                    回上頁
                </button>
            </div>
            <!-- /登出 -->
        </div>


        <!-- 表格-->
        <div class="w-full px-10 pt-5">
            <table class="w-full bg-white  border-collapse">
                <tbody id="tbody">
                <tr class="">
                    <td class="p-3 text-xl font-bold text-gray-900 w-1/2 border border-gray-700 ">
                        血壓
                        <br>
                        -收縮脈博
                    </td>
                    <td class="text-center font-bold text-3xl text-gray-900 border border-gray-700">
                        {{$detail_data->blood}}
                    </td>
                </tr>
                <tr class="">
                    <td class="p-3 text-xl font-bold text-gray-900 w-1/2 border border-gray-700 ">
                        手握力
                    </td>
                    <td class="text-center font-bold text-3xl text-gray-900 border border-gray-700">
                        {{$detail_data->hand}}
                    </td>
                </tr>
                <tr class="">
                    <td class="p-3 text-xl font-bold text-gray-900 w-1/2 border border-gray-700 ">
                        坐站能力
                    </td>
                    <td class="text-center font-bold  text-3xl text-gray-900  border border-gray-700">
                        {{$detail_data->sit}}
                    </td>
                </tr>
                <tr class="">
                    <td class="p-3 text-xl font-bold text-gray-900 w-1/2 border border-gray-700 ">
                        走路速度
                    </td>
                    <td class="text-center font-bold text-3xl text-gray-900  border border-gray-700">
                        {{$detail_data->walk}}
                    </td>
                </tr>
                <tr class="">
                    <td class="p-3 text-xl font-bold text-gray-900 w-1/2 border border-gray-700 ">
                        身高/體重
                    </td>
                    <td class="text-center font-bold text-3xl text-gray-900  border border-gray-700">
                        {{$detail_data->user_tall}}/
                        {{$detail_data->user_weight}}
                    </td>
                </tr>
                <tr class="">
                    <td class="p-3 text-xl font-bold text-gray-900 w-1/2 border border-gray-700 ">
                        體脂率
                    </td>
                    <td class="text-center font-bold text-3xl text-gray-900 border border-gray-700">
                        {{$detail_data->user_bfr}}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- /表格 -->
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
                    儲存
                </a>
            </div>
        </div>
        <!-- /功能列 -->
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
</div>
</body>
<script>
    $(document).ready(function () {
        $(".field").change(function () {
            // $(this).css("background-color","#FFFFCC");
            $.ajax({
                method: 'GET',
                data: '',
                success: function (res) {
                    window.alert('success')
                },
                error: function (err) {
                    console.log(err);
                }
            })
        });
    });


</script>
</html>
