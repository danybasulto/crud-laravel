<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert -->
</head>

<body class="bg-gray-50 h-screen flex items-center justify-center">

    <div class="absolute top-6 right-6 px-4 py-2">
        <a href="{{ route('productos.index') }}"
            class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-200">
            <i class="fas fa-arrow-left"></i> Regresar
        </a>
    </div>

    <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">Editar Producto</h2>

        <!-- Verifica si hay un mensaje de éxito desde el controlador -->
        @if(session('success'))
            <script>
                Swal.fire({
                    title: '¡Éxito!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                });
            </script>
        @endif

        <!-- Formulario de Producto -->
        <form action="{{ route('productos.update', $producto->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nombre del Producto -->
            <div class="mb-5">
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Nombre del
                    Producto</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre del producto"
                    class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    value="{{ old('nombre', $producto->nombre) }}" />
                @error('nombre')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Precio -->
            <div class="mb-5">
                <label for="precio"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Precio</label>
                <input type="number" step="0.01" id="precio" name="precio" placeholder="10.00"
                    class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    value="{{ old('precio', $producto->precio) }}" />
                @error('precio')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Categoría -->
            <div class="mb-5">
                <label for="id_categoria"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Categoría</label>
                <select id="id_categoria" name="id_categoria"
                    class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $producto->id_categoria == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('id_categoria')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botón de Actualización -->
            <button type="submit"
                class="w-full bg-blue-600 text-white font-semibold py-3 px-5 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 transition duration-200">
                Actualizar Producto
            </button>
        </form>
    </div>

    <!-- Script para Mostrar Mensaje de Error con SweetAlert si hay errores en el formulario -->
    @if ($errors->any())
        <script>
            Swal.fire({
                title: '¡Algo salió mal!',
                text: 'Por favor, revisa los campos del formulario.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif

</body>

</html>