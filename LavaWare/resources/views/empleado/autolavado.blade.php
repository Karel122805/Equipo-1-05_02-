@extends('layouts.app')

@section('content')
<div class="product-form-container" style="max-height: 5500px;">
    <div class="table-scroll-container" style="width: 450px; border-radius: 20px; overflow-y: auto; max-height: 530px">
        <h4 class="text-center mb-4">Registrar Pedido - Autolavado</h4>

        {{-- Mensaje de éxito --}}
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        {{-- Mensaje de error si total es 0 (oculto por defecto) --}}
        <div id="error-total" style="display: none;" class="alert alert-danger text-center">
            El total no puede ser $0.00. Selecciona al menos un elemento.
        </div>

        <form method="POST" action="{{ route('empleado.pedidos.autolavado.store') }}" onsubmit="return validarTotal();">
            @csrf

            <div class="form-group mb-3">
                <label><strong>Nombre del Cliente:</strong></label>
                <input type="text" name="customer_name" required class="form-control">
            </div>

            <div class="form-group mb-3">
                <label><strong>Fecha:</strong></label>
                <input type="date" name="date" required class="form-control">
            </div>

            <h5 class="text-center mt-4 mb-3">Selecciona los elementos usados:</h5>

            {{-- Lavadoras --}}
            <div class="form-group mb-3">
                <label><u>Lavadoras:</u></label>
                <div class="table-scroll-container" style="max-height: 100px; border: 1px solid #ccc; padding: 8px; border-radius: 10px;">
                    @foreach($washers as $w)
                        <div class="form-check">
                            <input type="checkbox" name="washers[]" class="form-check-input item-check" value="{{ $w->price }}" id="washer_{{ $w->id }}">
                            <label class="form-check-label" for="washer_{{ $w->id }}">Tipo {{ strtoupper($w->type) }} - ${{ number_format($w->price, 2) }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Secadoras --}}
            <div class="form-group mb-3">
                <label><u>Secadoras:</u></label>
                <div class="table-scroll-container" style="max-height: 100px; border: 1px solid #ccc; padding: 8px; border-radius: 10px;">
                    @foreach($dryers as $d)
                        <div class="form-check">
                            <input type="checkbox" name="dryers[]" class="form-check-input item-check" value="{{ $d->price }}" id="dryer_{{ $d->id }}">
                            <label class="form-check-label" for="dryer_{{ $d->id }}">Secadora ID #{{ $d->id }} - ${{ number_format($d->price, 2) }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Productos --}}
            <div class="form-group mb-3">
                <label><u>Productos:</u></label>
                <div class="table-scroll-container" style="max-height: 100px; border: 1px solid #ccc; padding: 8px; border-radius: 10px;">
                    @foreach($products as $p)
                        <div class="form-check">
                            <input type="checkbox" name="products[]" class="form-check-input item-check" value="{{ $p->price }}" id="product_{{ $p->id }}">
                            <label class="form-check-label" for="product_{{ $p->id }}">{{ $p->name }} - ${{ number_format($p->price, 2) }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Total --}}
            <div class="form-group mt-4 mb-3">
                <label><strong>Total a pagar:</strong></label>
                <input type="text" id="total" name="total" readonly class="form-control" value="0.00">
            </div>

            <input type="hidden" name="service_type" value="auto_lavado">
            <input type="hidden" name="status" value="completed">

            <div class="d-flex justify-content-between mt-4 flex-wrap gap-2">
                <button type="submit" class="btn btn-primary">Registrar</button>
                <a href="{{ route('empleado.dashboard') }}" class="btn-men">Volver al Menú Principal</a>
                <button onclick="window.history.back()" class="btn-reg">Regresar</button>
            </div>

        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('.item-check');
        const totalField = document.getElementById('total');
        const errorDiv = document.getElementById('error-total');

        function calculateTotal() {
            let total = 0;
            checkboxes.forEach(cb => {
                if (cb.checked) {
                    total += parseFloat(cb.value) || 0;
                }
            });
            totalField.value = total.toFixed(2);

            if (total > 0) {
                errorDiv.style.display = 'none';
            }
        }

        checkboxes.forEach(cb => {
            cb.addEventListener('change', calculateTotal);
        });

        calculateTotal();
    });

    function validarTotal() {
        const total = parseFloat(document.getElementById('total').value);
        const errorDiv = document.getElementById('error-total');

        if (total === 0) {
            errorDiv.style.display = 'block';
            return false;
        }

        return true;
    }
</script>
@endsection
