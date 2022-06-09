<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <script src="https://unpkg.com/tailwindcss-jit-cdn"></script> -->
    <script src="https://cdn.tailwindcss.com"></script>
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
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

    <style>
        #map {
            width: 100%;
            height: 100%;
        }
    </style>


    <title>堀頭里長青照護</title>
</head>

<body class="bg-orange-200">
<div class="w-full h-screen grid content-center">
    <!-- 標題 -->
    <div class="text-5xl font-bold text-center pb-10 font-bold text-orange-800">
        <p>堀頭里長青照護</p>
    </div>
    <!-- /標題 -->

    <!-- 登入表單 -->
    <div class="w-full ">
        <form action="{{route('post_login_page')}}" method="post">
            @csrf
            <div class="">
                <div class="flex justify-center">
                    <div class="grid content-center text-2xl font-bold mr-3">
                        帳號
                    </div>
                    <div class="grid content-center">
                        <input name="account" type="text" class="
                w-48
                px-3
                py-1.5
                text-2xl
                font-bold
                text-gray-700
                bg-white bg-clip-padding
                border border-solid border-gray-700
                rounded
                transition
                ease-in-out
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInputEmail1"
                               aria-describedby="emailHelp" placeholder="身分證字號">
                    </div>
                </div>
                <div class="flex justify-center mt-5">
                    <div class="grid content-center text-2xl font-bold mr-3">
                        密碼
                    </div>
                    <div class="grid content-center">
                        <input name="password" type="password" class="
                    w-48
                px-3
                py-1.5
                text-2xl
                font-bold
                text-gray-700
                bg-white bg-clip-padding
                border border-solid border-gray-700
                rounded
                transition
                ease-in-out
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInputEmail1"
                               aria-describedby="emailHelp" placeholder="後四碼+生日">
                    </div>
                </div>
                <div class="flex justify-end mr-20 mt-6">
                    <button id="btn_login" type="submit" class="
                w-fit
                px-3
                py-1.5
                text-3xl
                font-bold
                text-gray-700
                bg-blue-100
                border border-gray-700
                rounded">
                        登入
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- /登入表單 -->

    <div class="w-64 pt-10 pl-10">
        <img src="/logo.png" class="max-w-full h-auto" alt="..." />
    </div>
</div>

</body>


</html>
