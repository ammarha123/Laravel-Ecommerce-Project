<div>
    <div class="py-3 py-md-4 checkout">
        <div class="container">
            <h4>Checkout</h4>
            <hr>
            @if ($this->totalProductAmount != '0')
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="shadow bg-white p-3">
                            <h4 class="text-primary">
                                Item Total Amount :
                                <span class="float-end">Rp {{ $this->totalProductAmount }}</span>
                            </h4>
                            <hr>
                            <small>* Items will be delivered in 3 - 5 days.</small>
                            <br />
                            <small>* Tax and other charges are included ?</small>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="shadow bg-white p-3">
                            <h4 class="text-primary">
                                Basic Information
                            </h4>
                            <hr>

                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Full Name</label>
                                        <input type="text" wire:model.defer="fullname" class="form-control"
                                            placeholder="Enter Full Name" />
                                        @error('fullname')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Phone Number</label>
                                        <input type="number" wire:model.defer="phone" class="form-control"
                                            placeholder="Enter Phone Number" />
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Email Address</label>
                                        <input type="email" wire:model.defer="email" class="form-control"
                                            placeholder="Enter Email Address" />
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Pin-code (Zip-code)</label>
                                        <input type="number" wire:model.defer="pincode" class="form-control"
                                            placeholder="Enter Pin-code" />
                                        @error('pincode')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Full Address</label>
                                        <textarea wire:model.defer="address" class="form-control" rows="2"></textarea>
                                        @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Select Payment Mode: </label>
                                        <div class="d-md-flex align-items-start">
                                            <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab"
                                                role="tablist" aria-orientation="vertical">
                                                <button class="nav-link active fw-bold" id="cashOnDeliveryTab-tab"
                                                    data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab"
                                                    type="button" role="tab" aria-controls="cashOnDeliveryTab"
                                                    aria-selected="true">Cash on Delivery</button>
                                                <button class="nav-link fw-bold" id="shopeePayment-tab"
                                                    data-bs-toggle="pill" data-bs-target="#shopeePayment" type="button"
                                                    role="tab" aria-controls="shopeePayment"
                                                    aria-selected="false">Shopee</button>
                                                <button class="nav-link fw-bold" id="Tokopedia-tab"
                                                    data-bs-toggle="pill" data-bs-target="#tokopediaPayment" type="button"
                                                    role="tab" aria-controls="tokopediaPayment"
                                                    aria-selected="false">Tokopedia</button>
                                            </div>
                                            <div class="tab-content col-md-9" id="v-pills-tabContent">
                                                <div class="tab-pane active show fade" id="cashOnDeliveryTab"
                                                    role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab"
                                                    wire:click="codOrder" tabindex="0">
                                                    <h6>Cash on Delivery Mode</h6>
                                                    <hr />
                                                    <button type="button" class="btn btn-primary">Place Order (Cash on
                                                        Delivery)</button>

                                                </div>
                                                <div class="tab-pane fade" id="shopeePayment" role="tabpanel" 
                                                aria-labelledby="shoppePayment-tab"
                                                wire:click="shopeeOrder" tabindex="0">
                                                    <h6>Shopee Payment Mode</h6>
                                                    <hr/>
                                                    <button type="button" class="btn btn-warning">Place Order (Shopee)</button>
                                                </div>
                                                <div class="tab-pane fade" id="tokopediaPayment" role="tabpanel" 
                                                aria-labelledby="tokopediaPayment-tab"
                                                wire:click="tokopediaOrder" tabindex="0">
                                                    <h6>Tokopedia Payment Mode</h6>
                                                    <hr/>
                                                    <button type="button" class="btn btn-warning">Place Order (Tokopedia)</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            @else
                <div class="card shadow p-3">
                    <div class="card-body text-center">
                        <h4>No items in cart to checkout</h4>
                        <a class="btn btn-warning" href="{{ url('collections') }}">Shop Now</a>
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>
