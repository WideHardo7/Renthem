
@extends('layouts.catalogoLayout')
@section('title', 'Alloggi')
@section('catalogo')

<!-- banner -->
<div class="inside-banner">
    <div class="container"> 
        <span class="pull-right"></span>
        <h2>Trova l'alloggio che fa per te!</h2>
    </div>
</div>
<!-- banner -->


<div class="container">
    <div class="properties-listing spacer">

        <div class="row">
            @can('isLocatario')  
            <div class="col-lg-3 col-sm-4 ">

                <div class="search-form"><h4><span class="glyphicon glyphicon-search"></span> Cerca per</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <select class="form-control">
                                <option>Posto Letto</option>
                                <option>Appartamento</option>

                            </select>
                        </div>
                    </div>  



                    <div class="row">
                        <div class="col-lg-5">
                            <select class="form-control">
                                <option>Buy</option>
                                <option>Rent</option>
                                <option>Sale</option>
                            </select>
                        </div>
                        <div class="col-lg-7">
                            <select class="form-control">
                                <option>Price</option>
                                <option>$150,000 - $200,000</option>
                                <option>$200,000 - $250,000</option>
                                <option>$250,000 - $300,000</option>
                                <option>$300,000 - above</option>
                            </select>
                        </div>
                    </div>  

                    <button class="btn btn-primary">Cerca</button> 

                </div>

            </div>
               
            <div class="col-lg-9 col-sm-8">
            @endcan
            @can('isAnybutlario') 
            <div class="col-lg-9 col-sm-8 col-lg-offset-2">
                @endcan 
                
            @guest 
            <div class="col-lg-9 col-sm-8 col-lg-offset-2">
            @endguest
            
                <div class="row">
                    @isset($ads)
                    @foreach ($ads as $ad)
                    <!-- properties -->
                    <div class="col-lg-4 col-sm-6">
                        <div class="properties">
                            <div class="image-holder"><img src="{{ asset('images/properties/' . $ad->immagine) }}" class="img-responsive" alt="properties">
                                @if($ad->assegnato)
                                <div class="status sold">Non Disponibile</div>
                                @endif

                            </div>
                            <h4><a>{{$ad->tipologia}}</a></h4>
                            <p class="price">{{$ad->importo}}€</p>
                            <a class="btn btn-primary bottoni_ancore" href="{{route('scheda',[$ad->AnnuncioId])}}">DETTAGLIO</a>

                        </div>
                    </div>
                    @endforeach
                    <!--Paginazione-->
                    <div class="center">
                        <div class="pagination">
                            @include('pagination.paginator', ['paginator' => $ads])
                        </div>
                    </div>
                    @endisset()
                    

                </div>
            </div>
        </div>
    </div>


    @endsection