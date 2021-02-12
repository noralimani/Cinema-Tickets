@extends('layouts.app')

@section('content')

    <script src="https://www.paypal.com/sdk/js?client-id=sb" data-sdk-integration-source="button-factory">
    </script>

    <div class="container">
        <div class="row">
            <div class="col-md-8 mb-3">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('uploads/' . $movie->image) }}">
                    <div class="card-header">
                        <b>{{ $movie->title }} | {{ $movie->price }} MKD</b>
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-body">

                        <div id="smart-button-container">
                            <div style="text-align: center; margin-top: 0.625rem;" id="paypal-button-container"></div>
                        </div>

                        <script>
                            function initPayPalButton() {

                                var amount = {{ $movie->price }};

                                paypal.Buttons({
                                    style: {
                                        color: 'gold',
                                        shape: 'rect',
                                        label: 'paypal',
                                        layout: 'vertical',

                                    },

                                    createOrder: function(data, actions) {
                                        return actions.order.create({
                                            purchase_units: [{
                                                amount: {
                                                    value: amount
                                                }
                                            }]
                                        });
                                    },

                                    onApprove: function(data, actions) {
                                        let token = document.querySelector('meta[name="csrf-token"]')
                                            .getAttribute('content');
                                        return actions.order.capture().then(function(details) {
                                            if (details.status == "COMPLETED") {
                                                return fetch("/tickets", {
                                                        method: "post",
                                                        headers: {
                                                            "content-type": "application/json",
                                                            Accept: "application/json, text-plain, */*",
                                                            "X-Requested-With": "XMLHttpRequest",
                                                            "X-CSRF-TOKEN": token,
                                                        },
                                                        body: JSON.stringify({
                                                            user_id: {{ auth()->user()->id }},
                                                            movie_id: {{ $movie->id }},
                                                            total: {{ $movie->price }},
                                                        }),
                                                    })
                                                    .then(function(response) {
                                                        return response.json();
                                                    })
                                                    .then(function(data) {
                                                        const {
                                                            id
                                                        } = data

                                                        window.location.href = `/tickets/${id}`;
                                                    })
                                                    .catch(function(error) {
                                                        // redirect to failed page if internal error occurs
                                                        alert("Payment failed");
                                                    });
                                            }
                                        });
                                    },

                                    onError: function(err) {
                                        console.log(err);
                                    }
                                }).render('#paypal-button-container');
                            }
                            initPayPalButton();

                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
