<div class="my-2">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="my-1">Datos del cliente</h5> 
                    <!--<h5 class="my-1">Cliente</h5> -->
                </div>
                <div class="card-body pt-2">
                    <div class="row">
                        <div class="col-sm-6 col-lg-6">

                            <label for="staticNombre" class="col-form-label">Nombre</label>
                            <input type="hidden" name="customer_id" value="{{ $service->customer->id }}">
                            <input id="staticNombre" type="text" class="form-control" placeholder="" name="customer[name]"
                                value="{{ old("customer.name", $service->customer->name ) }}" required
                            >
                        </div>
                        <div class="col-sm-6 col-lg-6">
                            <label for="staticAddress" class="col-form-label">Dirección</label>
                            <input id="staticAddress" type="text" class="form-control" placeholder="" name="customer[address]"
                                value="{{ old("customer.address", $service->customer->address ) }}" required
                            >
                        </div>
                        <div class="col-sm-6 col-lg-6">
                            <label for="staticEmail" class="col-form-label">Correo</label>
                            <input id="staticEmail" type="email" class="form-control" placeholder="" name="customer[email]"
                                value="{{ old("customer.email", $service->customer->email ) }}" required
                            >
                        </div>
                        <div class="col-sm-6 col-lg-6">
                            <label for="staticPhone" class="col-form-label">Teléfono</label>
                            <input id="staticPhone" type="text" class="form-control" placeholder="" name="customer[phone]" 
                                value="{{ old("customer.phone", $service->customer->phone ) }}" required
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>