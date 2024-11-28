<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100">

    @if(session('success'))
        <div id="success-message" class="bg-green-500 text-white p-4 rounded-lg mb-4 shadow-lg max-w-4xl mx-auto">
            {{ session('success') }}
        </div>
    @endif

    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 py-6 bg-white shadow-md rounded-lg mb-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-semibold text-gray-800">Productos</h1>
            <a href="{{ route('productos.create') }}"
                class="bg-blue-600 text-white font-bold py-2 px-6 rounded-lg shadow-lg hover:bg-blue-700 transition duration-200">
                <i class="fas fa-plus"></i> Agregar Producto
            </a>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Nombre Producto</th>
                        <th scope="col" class="px-6 py-3">Categoría</th>
                        <th scope="col" class="px-6 py-3">Precio</th>
                        <th scope="col" class="px-6 py-3 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-all duration-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $producto->nombre }}
                            </th>
                            <td class="px-6 py-4">{{ $producto->categoria->nombre }}</td>
                            <td class="px-6 py-4">${{ number_format($producto->precio, 2) }}</td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('productos.edit', $producto->id) }}"
                                    class="text-blue-600 hover:text-blue-100 transition duration-200">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST"
                                    class="delete-form inline-block ml-4">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-100 transition duration-200">
                                        <i class="fas fa-trash-alt"></i> Borrar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Mostrar el mensaje de éxito solo por unos segundos
        const successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(() => {
                successMessage.classList.add('opacity-0'); // Desvanecer el mensaje
                setTimeout(() => {
                    successMessage.style.display = 'none'; // Eliminar el mensaje completamente después de 1 segundo
                }, 500);
            }, 3000); // El mensaje se ocultará después de 3 segundos
        }

        // Capturamos todos los formularios de eliminación
        const deleteForms = document.querySelectorAll('.delete-form');

        deleteForms.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();  // Prevenir el envío inmediato del formulario

                // Mostrar la alerta de confirmación
                Swal.fire({
                    title: '¿Estás seguro que deseas eliminarlo?',
                    text: "¡No podrás deshacer esta acción!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, borrar producto',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();  // Enviar el formulario si se confirma
                    }
                });
            });
        });
    </script>

    <!-- Include FontAwesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>