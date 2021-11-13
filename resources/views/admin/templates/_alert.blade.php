@if(session('alerts'))
    <div class="alert alert-{{ session('alerts')['type'] }}" >
        {{ session('alerts')['message'] }}
    </div>
@endif