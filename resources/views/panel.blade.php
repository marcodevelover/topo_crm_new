@extends('layout.app')

@push('plugin-styles')
<!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
@endpush

@section('content')
<div class="row">
    <div class="col-sm-6 col-md-6 col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="{{ route('buscar') }}" class="col-md-12 col-lg-12" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <p>Buscar documento</p>
                        <div class="add-items d-flex">
                            <input type="text" class="form-control todo-list-input" name="folio" placeholder="Folio">
                            <button class="btn btn-primary font-weight-medium">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
            <div class="card-body">
                <div
                    class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
                    <div class="float-left">
                        <i class="mdi mdi-book-open-page-variant text-danger icon-lg"></i>

                    </div>
                    <div class="float-right">
                        <p class="mb-0 text-right">CERT</p>
                        <div class="fluid-container">
                            <h3 class="font-weight-medium text-right mb-0">{{$certificaciones}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
            <div class="card-body">
                <div
                    class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
                    <div class="float-left">
                        <i class="mdi mdi mdi-book-multiple text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                        <p class="mb-0 text-right">CERT. del Mes</p>
                        <div class="fluid-container">
                            <h3 class="font-weight-medium text-right mb-0">{{$mes}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Últimos registros</h4>
                <div class="table-responsive">
                    @include('certificaciones._table-docs')
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6 col-md-6 col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="my-0"><?=$user1->job?></h4>
                        <div class="wrapper mt-2">
                            <p class="my-2 font-weight-medium"><?=$user1->name?></p>
                            <input type="file" class="btn btn-file btn-fw" style="display:none;">
                            {{-- <button type="button" class="btn btn-info btn-fw"><i class="mdi mdi-upload"></i>Subir firma</button> --}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="{{ Storage::url($user1->signed) }}" class="img-fluid" style="width:100%;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="my-0"><?=$user2->job?></h4>
                        <div class="wrapper mt-2">
                            <p class="my-2 font-weight-medium"><?=$user2->name?></p>
                            <input type="file" class="btn btn-file btn-fw" style="display:none;">
                            {{-- <button type="button" class="btn btn-info btn-fw"><i class="mdi mdi-upload"></i>Subir firma</button> --}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="{{ Storage::url($user2->signed)}}" class="img-fluid" style="width:100%;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('plugin-scripts')
{!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
{!! Html::script('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}
@endpush

@push('custom-scripts')
{!! Html::script('/assets/js/dashboard.js') !!}
@endpush