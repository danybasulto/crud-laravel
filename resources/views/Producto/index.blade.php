<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{session('success')}}
        </div>
    @endif

    <div class="flex justify-between justify-items mb-4">
        <h1 class="text-black">Productos</h1>
        <a href="{{ route('productos.create') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Agregar Producto</a>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre Producto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Categoría
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Editar</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$producto->nombre}}
                        </th>
                        <td class="px-6 py-4">
                            {{$producto->categoria->nombre}}
                        </td>
                        <td class="px-6 py-4">
                            {{$producto->precio}}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('productos.edit', $producto->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="font-medium text-blue-600 dark:text-red-500 hover:underline">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>