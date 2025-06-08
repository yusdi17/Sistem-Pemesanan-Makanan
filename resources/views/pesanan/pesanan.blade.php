@extends('profile.index')
@section('title', 'Pesanan Saya')

@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a style="text-decoration: none;" href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pesanan Saya</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="container">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col">
                            <div class="card card-stepper" style="border-radius: 10px;">
                                <div class="card-body p-4">

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex flex-column">
                                            <span class="lead fw-normal">Your order has been delivered</span>
                                            <span class="text-muted small">by DHFL on 21 Jan, 2020</span>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-outline-primary" data-mdb-toggle="modal"
                                                data-mdb-target="#exampleModal">
                                                Cek Pesanan
                                            </button>

                                        </div>
                                    </div>
                                    <hr class="my-4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn-close"
                            data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-start p-4">
                        <h5 class="modal-title text-uppercase mb-5" id="exampleModalLabel">Johnatan Miller</h5>
                        <h4 class="mb-5">Thanks for your order</h4>
                        <p class="mb-0">Payment summary</p>
                        <hr class="mt-2 mb-4"
                            style="height: 0; background-color: transparent; opacity: .75; border-top: 2px dashed #9e9e9e;">

                        <div class="d-flex justify-content-between">
                            <p class="fw-bold mb-0">Ether Chair(Qty:1)</p>
                            <p class="text-muted mb-0">$1750.00</p>
                        </div>

                        <div class="d-flex justify-content-between">
                            <p class="small mb-0">Shipping</p>
                            <p class="small mb-0">$175.00</p>
                        </div>

                        <div class="d-flex justify-content-between pb-1">
                            <p class="small">Tax</p>
                            <p class="small">$200.00</p>
                        </div>

                        <div class="d-flex justify-content-between">
                            <p class="fw-bold">Total</p>
                            <p class="fw-bold">$2125.00</p>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center border-top-0 py-4">
                        <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg mb-1"
                            style="background-color: #35558a;">
                            Track your order
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
