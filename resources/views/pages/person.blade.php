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
                    <input value="{{$user_data->user_name}}" disabled="disabled" required="required" class="
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
                focus:text-gray-700 focus:border-blue-600 focus:outline-none">

                </div>
            </div>
            <div class="flex justify-top mt-5">
                <div class="grid font-bold content-center text-xl mr-2">
                    身分證字號:
                </div>
                <div class="grid content-center">
                    <input value="{{$user_data->id_num}}" disabled="disabled" required="required" class="
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
                focus:text-gray-700 focus:border-blue-600 focus:outline-none">


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
                <button onclick="edit()" id="edit" class="
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
                </button>
            </div>
            <!-- /修改 -->

            <!-- 新增 -->
            <div class="flex mt-10">
                <button id="add_data" onclick="add_data()" class="
            hidden
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
                    新增
                </button>
            </div>
            <!-- /新增 -->

            <!-- 回上頁 -->
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
            <!-- /回上頁 -->
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
                        <input type="text" id="blood" disabled="disabled" required="required" class="
        input_cell
        w-full
        h-full
        px-3
        py-1
        font-bold
        text-3xl
        text-center
        text-gray-700
        bg-white
        bg-clip-padding
        border border-solid border-white
        rounded
        transition
        ease-in-out
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"/>
                    </td>
                </tr>
                <tr class="">
                    <td class="p-3 text-xl font-bold text-gray-900 w-1/2 border border-gray-700 ">
                        手握力
                    </td>
                    <td class="text-center font-bold text-3xl text-gray-900 border border-gray-700">
                        <input type="text" id="hand" disabled="disabled" required="required" class="
                        input_cell
        w-full
        h-full
        px-3
        py-1
        font-bold
        text-3xl
        text-center
        text-gray-700
        bg-white
        bg-clip-padding
        border border-solid border-white
        rounded
        transition
        ease-in-out
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"/>
                    </td>
                </tr>
                <tr class="">
                    <td class="p-3 text-xl font-bold text-gray-900 w-1/2 border border-gray-700 ">
                        坐站能力
                    </td>
                    <td class="text-center font-bold  text-3xl text-gray-900  border border-gray-700">
                        <input type="text" id="sit" disabled="disabled" required="required" class="
       input_cell
        w-full
        h-full
        px-3
        py-1
        font-bold
        text-3xl
        text-center
        text-gray-700
        bg-white
        bg-clip-padding
        border border-solid border-white
        rounded
        transition
        ease-in-out
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"/>
                    </td>
                </tr>
                <tr class="">
                    <td class="p-3 text-xl font-bold text-gray-900 w-1/2 border border-gray-700 ">
                        走路速度
                    </td>
                    <td class="text-center font-bold text-3xl text-gray-900  border border-gray-700">
                        <input type="text" id="walk" disabled="disabled" required="required" class="
        input_cell
        w-full
        h-full
        px-3
        py-1
        font-bold
        text-3xl
        text-center
        text-gray-700
        bg-white
        bg-clip-padding
        border border-solid border-white
        rounded
        transition
        ease-in-out
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"/>
                    </td>
                </tr>
                <tr class="">
                    <td class="p-3 text-xl font-bold text-gray-900 w-1/2 border border-gray-700 ">
                        身高/體重
                    </td>
                    <td class="text-center font-bold text-3xl text-gray-900  border border-gray-700">
                        <div class="flex">
                            <input type="text" id="tall" disabled="disabled" required="required" class="
        input_cell
        w-full
        h-full
        px-1
        py-1
        font-bold
        text-3xl
        text-center
        text-gray-700
        bg-white
        bg-clip-padding
        border border-solid border-white
        rounded
        transition
        ease-in-out
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"/>
                            <div class="grid content-center">/</div>
                            <input type="text" id="weight" disabled="disabled" required="required" class="
        input_cell
        w-full
        h-full
        px-1
        py-1
        font-bold
        text-3xl
        text-center
        text-gray-700
        bg-white
        bg-clip-padding
        border border-solid border-white
        rounded
        transition
        ease-in-out
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"/>

                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="p-3 text-xl font-bold text-gray-900 w-1/2 border border-gray-700 ">
                        體脂率
                    </td>
                    <td class="text-center font-bold text-3xl text-gray-900 border border-gray-700">
                        <input type="text" id="user_bfr" disabled="disabled" required="required" class="
        input_cell
        w-full
        h-full
        px-3
        py-1
        font-bold
        text-3xl
        text-center
        text-gray-700
        bg-white
        bg-clip-padding
        border border-solid border-white
        rounded
        transition
        ease-in-out
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"/>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- /表格 -->

        <!-- 功能列 -->
        <div class="flex justify-end ">
            <!-- 新增儲存 -->
            <div class="flex pr-5 pt-5">
                <button href="" id="store_add" onclick="store_add()" class="
            hidden
            w-fit
            px-3
            py-1.5
            text-3xl
            font-bold
            text-white
            bg-green-600
            border border-white
            rounded">
                    新增儲存
                </button>
            </div>
            <!-- /新增儲存 -->

            <!-- 儲存 -->
            <div class="flex pr-5 pt-5">
                <button href="" id="store" onclick="store()" class="
            hidden
            w-fit
            px-3
            py-1.5
            text-3xl
            font-bold
            text-white
            bg-green-600
            border border-white
            rounded">
                    儲存
                </button>
            </div>
            <!-- /儲存 -->

            <!-- 取消 -->
            <div class="flex pr-10 pt-5">
                <button href="" id="cancel" onclick="cancel()" class="
            hidden
            w-fit
            px-3
            py-1.5
            text-3xl
            font-bold
            text-white
            bg-blue-600
            border border-white
            rounded">
                    取消
                </button>
            </div>
            <!-- /取消 -->

        </div>
        <!-- /功能列 -->

        <!-- 功能列 -->
        <div class="flex justify-end ">
            <!-- 登出 -->
            <div class="flex px-10 pt-10">
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
            change();
        });
    });

    function change() {
        let user_id = '{{$user_data->user_id}}';
        let date = $('#txt_DATE').val();
        date = date.replaceAll("/", "-")
        // $(this).css("background-color","#FFFFCC");
        $.ajax({
            url: '{{route('get_date_data')}}',
            method: 'GET',
            data: {
                user_id: user_id,
                date: date,
            },
            success: function (res) {
                console.log(res)
                if (res !== 'none') {
                    $('#blood').val(res['blood']);
                    $('#hand').val(res['hand']);
                    $('#sit').val(res['sit']);
                    $('#walk').val(res['walk']);
                    $('#tall').val(res['user_tall']);
                    $('#weight').val(res['user_weight']);
                    $('#user_bfr').val(res['user_bfr']);
                    $('#add_data').addClass('hidden');
                    $('#edit').removeClass('hidden');
                }
                if (res === 'none') {
                    $('#blood').val('無');
                    $('#hand').val('無');
                    $('#sit').val('無');
                    $('#walk').val('無');
                    $('#tall').val('無');
                    $('#weight').val('無');
                    $('#user_bfr').val('無');
                    $('#add_data').removeClass('hidden');
                    $('#edit').addClass('hidden');
                }

            },
            error: function (err) {
                console.log(err);
            }
        })
    }

    function edit_data() {

        let input_cell = $('.input_cell');
        $.each(input_cell, function (index, value) {
            if (input_cell.eq(index).val().trim().length===0){
                input_cell.eq(index).val('0');
            }
        })

        let user_id = '{{$user_data->user_id}}';
        let date = $('#txt_DATE').val();
        date = date.replaceAll("/", "-")
        let blood = $('#blood').val();
        let hand = $('#hand').val();
        let sit = $('#sit').val();
        let walk = $('#walk').val();
        let tall = $('#tall').val();
        let weight = $('#weight').val();
        let user_bfr = $('#user_bfr').val();

        $.ajax({
            url: '{{route('edit_person_data')}}',
            method: 'POST',
            data: {
                _token: '{{csrf_token()}}',
                user_id: user_id,
                date: date,
                blood: blood,
                hand: hand,
                sit: sit,
                walk: walk,
                tall: tall,
                weight: weight,
                user_bfr: user_bfr,
            },
            success: function (res) {
                console.log(res)
                change();
            },
            error: function (err) {
                console.log(err);
            }
        })

    }

    function edit() {
        if ($('#txt_DATE').val() != '') {

            $('#txt_DATE').attr('disabled', 'disabled');

            // 儲存 變紅色
            $('#store').removeClass('hidden');

            $('#store_add').addClass('hidden');


            // 取消 變藍色
            $('#cancel').removeClass('hidden');


            // 修改 隱藏
            $('#edit').addClass('hidden');

            // 可編輯
            $('#blood').removeAttr("disabled");
            $('#hand').removeAttr("disabled");
            $('#sit').removeAttr("disabled");
            $('#walk').removeAttr("disabled");
            $('#tall').removeAttr("disabled");
            $('#weight').removeAttr("disabled");
            $('#user_bfr').removeAttr("disabled");
        }

    }

    //儲存 修改
    function store() {
        edit_data();

        // 儲存 取消
        $('#store_add').addClass('hidden');
        $('#store').addClass('hidden');
        $('#edit').removeClass('hidden');
        $('#cancel').addClass('hidden');

        // 不可編輯
        $('#blood').attr('disabled', 'disabled');
        $('#hand').attr('disabled', 'disabled');
        $('#sit').attr('disabled', 'disabled');
        $('#walk').attr('disabled', 'disabled');
        $('#tall').attr('disabled', 'disabled');
        $('#weight').attr('disabled', 'disabled');
        $('#user_bfr').attr('disabled', 'disabled');

        $('#txt_DATE').removeAttr('disabled', 'disabled');


    }

    //儲存 新增
    function store_add() {
        insert_data();

        // 儲存 取消
        $('#store_add').addClass('hidden');
        $('#store').addClass('hidden');
        $('#edit').removeClass('hidden');
        $('#cancel').addClass('hidden');

        // 不可編輯
        $('#blood').attr('disabled', 'disabled');
        $('#hand').attr('disabled', 'disabled');
        $('#sit').attr('disabled', 'disabled');
        $('#walk').attr('disabled', 'disabled');
        $('#tall').attr('disabled', 'disabled');
        $('#weight').attr('disabled', 'disabled');
        $('#user_bfr').attr('disabled', 'disabled');

        $('#txt_DATE').removeAttr('disabled', 'disabled');


    }

    function add_data() {

        // 儲存 取消
        $('#store_add').removeClass('hidden');
        $('#edit').addClass('hidden');
        $('#add_data').addClass('hidden');
        $('#cancel').removeClass('hidden');

        // 不可編輯
        $('#blood').removeAttr('disabled', 'disabled');
        $('#hand').removeAttr('disabled', 'disabled');
        $('#sit').removeAttr('disabled', 'disabled');
        $('#walk').removeAttr('disabled', 'disabled');
        $('#tall').removeAttr('disabled', 'disabled');
        $('#weight').removeAttr('disabled', 'disabled');
        $('#user_bfr').removeAttr('disabled', 'disabled');

        //清空
        $('#blood').val('0');
        $('#hand').val('0');
        $('#sit').val('0');
        $('#walk').val('0');
        $('#tall').val('0');
        $('#weight').val('0');
        $('#user_bfr').val('0');

        $('#txt_DATE').attr('disabled', 'disabled');
    }

    function insert_data() {

        let user_id = '{{$user_data->user_id}}';
        let date = $('#txt_DATE').val();
        date = date.replaceAll("/", "-")
        let blood = $('#blood').val();
        let hand = $('#hand').val();
        let sit = $('#sit').val();
        let walk = $('#walk').val();
        let tall = $('#tall').val();
        let weight = $('#weight').val();
        let user_bfr = $('#user_bfr').val();

        $.ajax({
            url: '{{route('insert_person_data')}}',
            method: 'POST',
            data: {
                _token: '{{csrf_token()}}',
                user_id: user_id,
                date: date,
                blood: blood,
                hand: hand,
                sit: sit,
                walk: walk,
                tall: tall,
                weight: weight,
                user_bfr: user_bfr,
            },
            success: function (res) {
                console.log(res);
            },
            error: function (err) {
                console.log(err);
            }
        })

    }



    function cancel() {
        change();
        $('#txt_DATE').removeAttr('disabled', 'disabled');

        $('#store_add').addClass('hidden');
        $('#store').addClass('hidden');
        $('#cancel').addClass('hidden');
        $('#edit').removeClass('hidden');

    }


</script>
</html>
