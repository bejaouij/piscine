@extends('layouts.app')
@section('content')
    <div class="header">
        <h2>
            {{ $shop->shop_name }}
        </h2>
    </div>

    <hr>

    <div class="content">
        <div class="row">
            <form id="update-shop-form" method="POST" action="#">
                @csrf

                <div class="input-field col s6">
                    <label for="shop_siret">{{ __('Numéro de Siret') }}</label>

                    <input id="shop_siret" type="text" class="validate" name="shop_siret" value="{{ $shop->shop_siret }}" required disabled>

                    @if ($errors->has('shop_siret'))
                        <span role="alert">{{ $errors->first('shop_siret') }}</span>
                    @endif
                </div>

                <div class="input-field col s6">
                    <label for="shop_name">{{ __('Nom du magasin') }}</label>

                    <input id="shop_name" type="text" class="validate" name="shop_name" value="{{ $shop->shop_name }}" required disabled>

                    @if ($errors->has('shop_name'))
                        <span role="alert">{{ $errors->first('shop_name') }}</span>
                    @endif
                </div>

                <div class="input-field col s6">
                    <label for="shop_contact_mail">{{ __('Adresse email de contact') }}</label>

                    <input id="shop_contact_mail" type="email" class="validate" name="shop_contact_mail" value="{{ $shop->shop_contact_mail }}" required disabled>

                    @if ($errors->has('shop_contact_mail'))
                        <span role="alert">{{ $errors->first('shop_contact_mail') }}</span>
                    @endif
                </div>

                <div class="input-field col s6">
                    <label for="shop_phone">{{ __('Téléphone de contact') }}</label>

                    <input type="text" id="shop_phone" class="validate" name="shop_phone" value="{{ $shop->shop_phone }}" required disabled>

                    @if ($errors->has('shop_phone'))
                        <span role="alert">{{ $errors->first('shop_phone') }}</span>
                    @endif
                </div>

                <div class="col s2">
                    <label for="shop_is_delivery_possible">Livraison possible</label>

                    <select id="shop_is_delivery_possible" name="shop_is_delivery_possible" class="browser-default" disabled>
                        <option value="0" {{ ($shop->shop_is_delivery_possible === false) ? 'selected' : 'null' }}>Non</option>
                        <option value="1" {{ ($shop->shop_is_delivery_possible === true) ? 'selected' : 'null' }}>Oui</option>
                    </select>
                </div>

                <div class="input-field col s12">
                    <button class="btn btn-light" onclick="event.preventDefault(); enableForm();">
                        Modifier
                    </button>
                    <button type="submit" id="shop-edit-form-save" class="btn btn-primary" disabled>
                        {{ __('Enregistrer') }}
                    </button>
                </div>
            </form>
        </div>

        <hr>

        <div class="header">
            <h2>Produits</h2>
        </div>

        <hr>

        <div class="row">
            <form class="col s12">
                <div class="input-field col s6">
                    <label for="product_name">Reference du Produit</label>
                    <input id="product_name" name="product_name" type="text" class="validate">
                </div>

                <div class="input-field col s6">
                    <input id="nom" type="text" class="validate">
                    <label for="nom">Nom du Produit</label>
                </div>

                <div class="input-field col s6">
                    <input id="prix" type="number" class="validate">
                    <label for="prix">Prix du Produit</label>
                </div>

                <div class="row col s12">
                    <div class="col s3">
                        <label for="category_id">Browser Select</label>

                        <select id="category_id" name="category_id" class="browser-default" required>
                            <option value="" disabled selected>Choisissez votre categorie </option>

                            @foreach($categories as $category)
                                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col s3">

                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <input type="submit" class="validate btn" value="Ajouter">
                    </div>
                </div>
            </form>
        </div>

        <hr>

        <div class="products-container row">
            @forelse($shop->products as $product)
                <div class="product col s4">
                    <div class="card-panel grey lighten-5 z-depth-1">
                        <div class="row valign-wrapper">
                            <div class="col s2">
                                <img src={{ asset('media') . '/' . $product->photo_path->photo_relative_path }} alt="" class="responsive-img"> <!-- notice the "circle" class -->
                            </div>

                            <div class="col s8">
                                <div class="black-text">
                                    <P>{{ $product->product_name }}</P>

                                    @if(empty($product->product_discount_percentage))
                                        <p>{{ number_format($product->product_price, 2, ',', ' ') }} &euro; TTC</p>
                                    @else
                                        <p>
                                            <span class="initial-price">{{ number_format($product->product_price, 2, ',', ' ') }}</span> {{ number_format(((1 - $product->product_discount_percentage) * $product->product_price), 2, ',', ' ') }} &euro; TTC <span class="discount-percentage">{{ $product->product_discount_percentage * 100 }} %</span>
                                        </p>

                                    @endif

                                    <p><a class="waves-effect waves-light btn" href="{{ route('product', ['id' => $product->product_id ]) }}">Voir</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>
                    Ce commerce n'a pas de produit en vente.
                </p>
            @endforelse
        </div>

        <hr>

        <ul class="pagination">
            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="active"><a href="#!">1</a></li>
            <li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        </ul>
    </div>

    <script defer>
        function enableForm() {
            document.getElementById('shop_name').disabled = false;
            document.getElementById('shop_contact_mail').disabled = false;
            document.getElementById('shop_phone').disabled = false;
            document.getElementById('shop_is_delivery_possible').disabled = false;
            document.getElementById('shop-edit-form-save').disabled = false;
        }
    </script>
@endsection