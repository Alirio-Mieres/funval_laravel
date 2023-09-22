<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100">
    <main class="flex h-screen justify-center items-baseline mx-96 ">
        <div class="container mx-auto mt-8 bg-white shadow-md">
            <div class="flex items-center justify-between px-4 py-3">
                <h1 class="font-bold text-2xl">Agregar Usuarios</h1>
                <a class="bg-blue-500 hover:bg-blue-700 text-white p-2 rounded-md cursor-pointer ">Volver al Listado</a>
            </div>
            <form class="rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4 flex justify-between">
                    <div class="w-1/2 mr-2">
                        <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="w-1/2 ml-2">
                        <label for="apellido" class="block text-gray-700 text-sm font-bold mb-2">Apellido</label>
                        <input type="text" id="apellido" name="apellido" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">E-mail</label>
                    <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Contraseña</label>
                    <input type="password" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex items-center justify-center">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-10 rounded focus:outline-none focus:shadow-outline">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>