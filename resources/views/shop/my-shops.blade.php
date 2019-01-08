@extends('layouts.app')
@section('content')
    <div class="header">
        <h2>Mes magasins</h2>
    </div>

    <hr>

    <div class="shops-container row">
        @forelse(Auth::user()->shops as $shop)
            <div class="shop col s3">
                <div class="card-panel grey lighten-5 z-depth-1">
                    <div class="row valign-wrapper">
                        <div class="col s12">
                            <div class="black-text">
                                <p>{{ $shop->shop_name }} | {{ $shop->shop_siret }}</p>

                                <p>
                                    <a class="waves-effect waves-light btn" href="{{ route('my-shop', ['id' => $shop->shop_siret]) }}">Voir</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            Vous n'avez pas encore enregistré de magasin.
        @endforelse
    </div>

    <hr>

    <p>
        <a class="waves-effect waves-light btn modal-trigger" href="#add-shop-form-container">Ajouter</a>
    </p>

    <div id="add-shop-form-container" class="modal">
        <div class="modal-content">
            <form id="update-shop-form" method="POST" action="{{ route('shop-create') }}">
                @csrf

                <div class="container">
                    <div class="input-field col s6">
                        <label for="shop_siret">{{ __('Numéro de Siret') }}</label>

                        <input id="shop_siret" type="text" class="validate" name="shop_siret" required>

                        @if ($errors->has('shop_siret'))
                            <span role="alert">{{ $errors->first('shop_siret') }}</span>
                        @endif
                    </div>

                    <div class="input-field col s6">
                        <label for="shop_name">{{ __('Nom du magasin') }}</label>

                        <input id="shop_name" type="text" class="validate" name="shop_name" required>

                        @if ($errors->has('shop_name'))
                            <span role="alert">{{ $errors->first('shop_name') }}</span>
                        @endif
                    </div>

                    <div class="input-field col s6">
                        <label for="shop_contact_mail">{{ __('Adresse email de contact') }}</label>

                        <input id="shop_contact_mail" type="email" class="validate" name="shop_contact_mail" required>

                        @if ($errors->has('shop_contact_mail'))
                            <span role="alert">{{ $errors->first('shop_contact_mail') }}</span>
                        @endif
                    </div>

                    <div class="input-field col s6">
                        <label for="shop_phone">{{ __('Téléphone de contact') }}</label>

                        <input type="text" id="shop_phone" class="validate" name="shop_phone" required>

                        @if ($errors->has('shop_phone'))
                            <span role="alert">{{ $errors->first('shop_phone') }}</span>
                        @endif
                    </div>

                    <div class="input-field col s6">
                        <label for="address_street_number">{{ __('Numéro de rue') }}</label>

                        <input id="address_street_number" type="text" class="validate" name="address_street_number" required>

                        @if ($errors->has('address_street_number'))
                            <span role="alert">{{ $errors->first('address_street_number') }}</span>
                        @endif
                    </div>

                    <div class="input-field col s6">
                        <label for="address_street">{{ __('Rue') }}</label>

                        <input id="address_street" type="text" class="validate" name="address_street" required>

                        @if ($errors->has('address_street'))
                            <span role="alert">{{ $errors->first('address_street') }}</span>
                        @endif
                    </div>

                    <div class="input-field col s6">
                        <label for="address_city">{{ __('Ville') }}</label>

                        <input id="address_city" type="text" class="validate" name="address_city" required>

                        @if ($errors->has('address_city'))
                            <span role="alert">{{ $errors->first('address_city') }}</span>
                        @endif
                    </div>

                    <div class="input-field col s6">
                        <label for="address_postal_code">{{ __('Code postal') }}</label>

                        <input type="text" id="address_postal_code" class="validate" name="address_postal_code" required>

                        @if ($errors->has('address_postal_code'))
                            <span role="alert">{{ $errors->first('address_postal_code') }}</span>
                        @endif
                    </div>

                    <div class="col s2">
                        <label for="shop_is_delivery_possible">Livraison possible</label>

                        <select id="shop_is_delivery_possible" name="shop_is_delivery_possible" class="browser-default">
                            <option value="0" selected>Non</option>
                            <option value="1">Oui</option>
                        </select>
                    </div>

                    <div class="input-field col s12">
                        <input type="submit" class="btn btn-light" value="Ajouter">
                    </div>
                </div>

            </form>
        </div>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal-trigger').leanModal();
        });
    </script>
@endsection