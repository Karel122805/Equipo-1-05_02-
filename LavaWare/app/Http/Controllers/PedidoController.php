@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>Registrar Nuevo Pedido</h2>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Errores de validación --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Se encontraron los siguientes errores:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('empleado.pedidos.store') }}" method="POST" id="pedido-form">
        @csrf

        <div>
            <label for="customer_name">Nombre del Cliente:</label>
            <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}" required>
        </div>

        <div>
            <label for="service_type">Tipo de Servicio:</label>
            <select name="service_type" id="service_type" required>
                <option value="auto_lavado" {{ old('service_type') == 'auto_lavado' ? 'selected' : '' }}>Autolavado</option>
                <option value="drop_off" {{ old('service_type') == 'drop_off' ? 'selected' : '' }}>Lavado con entrega</option>
            </select>
        </div>

        {{-- Autolavado --}}
        <div id="self_service_fields" style="display:none;">
            <h3>Servicios Autolavado</h3>

            <label for="washers">Selecciona cuántas Lavadoras:</label>
            <input type="number" name="washers_count" id="washers_count" value="0" min="0" max="{{ count($washers) }}" required>

            <label for="dryers">Selecciona cuántas Secadoras:</label>
            <input type="number" name="dryers_count" id="dryers_count" value="0" min="0" max="{{ count($dryers) }}" required>

            <label for="products">Selecciona cuántos Productos:</label>
            <input type="number" name="products_count" id="products_count" value="0" min="0" max="{{ count($products) }}" required>

            <div id="total">
                <strong>Total: $0.00</strong>
            </div>
        </div>

        {{-- Lavado con Entrega --}}
        <div id="drop_off_fields" style="display:none;">
            <h3>Servicios Lavado con Entrega</h3>
            <label for="quantity_kg">Cantidad de KG:</label>
            <input type="number" name="quantity_kg" id="quantity_kg" value="{{ old('quantity_kg') }}" required>
            <div id="total">
                <strong>Total: $0.00</strong>
            </div>
        </div>

        <div class="form-buttons">
            <button type="submit" class="btn btn-success">Registrar Pedido</button>
        </div>
    </form>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const serviceType = document.getElementById('service_type');
        const selfServiceFields = document.getElementById('self_service_fields');
        const dropOffFields = document.getElementById('drop_off_fields');
        const total = document.querySelector('#total strong');

        serviceType.addEventListener('change', function () {
            if (serviceType.value === 'auto_lavado') {
                selfServiceFields.style.display = 'block';
                dropOffFields.style.display = 'none';
                updateTotal();
            } else {
                selfServiceFields.style.display = 'none';
                dropOffFields.style.display = 'block';
                updateTotal();
            }
        });

        // Cálculo del total basado en las cantidades seleccionadas
        function updateTotal() {
            let totalAmount = 0;

            if (serviceType.value === 'auto_lavado') {
                // Sumar el precio de las lavadoras
                const washersCount = document.getElementById('washers_count').value;
                const dryersCount = document.getElementById('dryers_count').value;
                const productsCount = document.getElementById('products_count').value;

                // Calcular el total de lavadoras, secadoras y productos
                totalAmount += washersCount * 31; // Supuesto precio de cada lavadora
                totalAmount += dryersCount * 31;  // Supuesto precio de cada secadora
                totalAmount += productsCount * 28; // Supuesto precio de cada producto

            } else if (serviceType.value === 'drop_off') {
                // Si es lavado con entrega, calcular por kg
                const kg = document.getElementById('quantity_kg').value;
                totalAmount = kg * 22; // El precio por kg
            }

            total.textContent = `Total: $${totalAmount.toFixed(2)}`;
        }

        // Actualizar el total cuando haya cambios
        document.getElementById('washers_count').addEventListener('input', updateTotal);
        document.getElementById('dryers_count').addEventListener('input', updateTotal);
        document.getElementById('products_count').addEventListener('input', updateTotal);
        document.getElementById('quantity_kg').addEventListener('input', updateTotal);

        // Inicializa el formulario según el tipo de servicio seleccionado
        if (serviceType.value === 'auto_lavado') {
            selfServiceFields.style.display = 'block';
            dropOffFields.style.display = 'none';
        } else {
            selfServiceFields.style.display = 'none';
            dropOffFields.style.display = 'block';
        }
    });
</script>
@endsection

