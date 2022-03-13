<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadscrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0"><?= $title ?></h2>
                        <!-- <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Olah Data</li>
                                <li class="breadcrumb-item active"><?= $title ?></li>
                            </ol>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="content-body">
            <div class="steps clear-fix"></div>
            <div class="content clear-fix">
                <fieldset id="steps-uid-0-p-0" class="checkout-step-1 px-0 body current" role="tabpanel" aria-labelledby="steps-uid-0-h-0" aria-hidden="false">
                    <section id="place-order" class="list-view product-checkout">
                        <div class="checkout-items"></div>
                        <div class="checkout-options">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="option-title">Hasil Perhitungan</h4>
                                        <hr>
                                        <div class="price-details">Rincian Biaya</div>
                                        <div class="detail">
                                            <div class="detail-title">Handling</div>
                                            <div class="detail-amt">{harga}</div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail-title">Bus</div>
                                            <div class="detail-amt">{harga}</div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail-title">Visa</div>
                                            <div class="detail-amt">{harga}</div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail-title">PCR</div>
                                            <div class="detail-amt">{harga}</div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail-title">Profit & Operasional</div>
                                            <div class="detail-amt">{harga}</div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </fieldset>
            </div>
        </div> -->
        <div class="content-body">
            <secton id="content-types">
                <div class="row">
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="card-title">Masukkan Data</div>
                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                            <fieldset class="form-group">
                                                <label for="selectHotel">Pilih Hotel</label>
                                                <select id="selectHotel" name="selectHotel" class="select2 form-control" multiple="multiple">
                                                    <optgroup label="Figures">
                                                        <option value="romboid">Romboid</option>
                                                        <option value="trapeze">Trapeze</option>
                                                        <option value="triangle">Triangle</option>
                                                        <option value="polygon">Polygon</option>
                                                    </optgroup>
                                                    <optgroup label="Colors">
                                                        <option value="red">Red</option>
                                                        <option value="green">Green</option>
                                                        <option value="blue">Blue</option>
                                                        <option value="purple">Purple</option>
                                                    </optgroup>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <fieldset class="form-counter">
                                                <label for="qty">Kuantitas</label>
                                                <input type="text" id="qty" class="form-control">
                                            </fieldset>
                                        </div>
                                        <div class="col">
                                            <fieldset class="form-counter">
                                                <label for="night">Malam</label>
                                                <input type="text" id="night" class="form-control">
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <span class="float-right">
                                    <button id="hitungBiaya" class="btn btn-primary">Hitung</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="card-title">Hasil Perhitungan</div>
                                    <hr>
                                    <h6 class="text-bold pl-1">Rincian Harga</h6>
                                    <style>
                                        .list-group-item {
                                            border: 0px !important;
                                            padding-top: 1px;
                                        }
                                    </style>
                                    <hr>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <span class="badge badge-pill bg-primary float-right">{harga}</span>
                                            Hotel A
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-pill bg-primary float-right">{harga}</span>
                                            Hotel B
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-pill bg-primary float-right">{harga}</span>
                                            Handling
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-pill bg-primary float-right">{harga}</span>
                                            Bus
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-pill bg-primary float-right">{harga}</span>
                                            Visa
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-pill bg-primary float-right">{harga}</span>
                                            PCR
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge badge-pill bg-primary float-right">{harga}</span>
                                            Profit & Operasional
                                        </li>
                                    </ul>
                                    <hr>
                                    <h4 class="text-bold pl-1 pr-1">
                                        <span class="badge badge-pill bg-primary float-right">{harga}</span>
                                        Total Harga
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </secton>
        </div>
        <!-- <div class="content-body">

            <div class="checkout-options">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <p class="options-title">Options</p>
                            <div class="coupons">
                                <div class="coupons-title">
                                    <p>Coupons</p>
                                </div>
                                <div class="apply-coupon">
                                    <p>Apply</p>
                                </div>
                            </div>
                            <hr>
                            <div class="price-details">
                                <p>Price Details</p>
                            </div>
                            <div class="detail">
                                <div class="detail-title">
                                    Total MRP
                                </div>
                                <div class="detail-amt">
                                    $598
                                </div>
                            </div>
                            <div class="detail">
                                <div class="detail-title">
                                    Bag Discount
                                </div>
                                <div class="detail-amt discount-amt">
                                    -25$
                                </div>
                            </div>
                            <div class="detail">
                                <div class="detail-title">
                                    Estimated Tax
                                </div>
                                <div class="detail-amt">
                                    $1.3
                                </div>
                            </div>
                            <div class="detail">
                                <div class="detail-title">
                                    EMI Eligibility
                                </div>
                                <div class="detail-amt emi-details">
                                    Details
                                </div>
                            </div>
                            <div class="detail">
                                <div class="detail-title">
                                    Delivery Charges
                                </div>
                                <div class="detail-amt discount-amt">
                                    Free
                                </div>
                            </div>
                            <hr>
                            <div class="detail">
                                <div class="detail-title detail-total">Total</div>
                                <div class="detail-amt total-amt">$574</div>
                            </div>
                            <div class="btn btn-primary btn-block place-order">PLACE ORDER</div>
                        </div>
                    </div>
                </div>
            </div>

        </div> -->
    </div>
</div>