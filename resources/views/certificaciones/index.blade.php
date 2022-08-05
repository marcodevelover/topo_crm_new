@extends('layout.app')

@push('plugin-styles')
@endpush

@section('content')
    @include('components.messages')
    @include('components.filter', [ 'route'=>'buscar'] )
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Certificaciones</h4> 
            <div class="table-responsive">
                @include('certificaciones._table-docs')
                <div class="paginate d-flex justify-content-center my-2">
                    {{ $reports->links( "pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush