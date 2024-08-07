<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css','resources/js/app.js'])

</head>
<body class="bg-slate-100">




    <x-navbar></x-navbar>

    <x-sidebar></x-sidebar>

      <div class="p-4 sm:ml-64 ">

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
         {{-- <x-footer></x-footer> --}}
      </div>

</body>
</html>
