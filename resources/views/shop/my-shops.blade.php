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
                                    <a class="waves-effect waves-light btn" href="#">Voir</a>
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
        <a class="waves-effect waves-light btn" href="#">Ajouter</a>
    </p>

@endsection