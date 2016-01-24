@extends('layouts.principal')
    @section('content')
        @include('alerts.errors')
        @include('alerts.message')
        <div>
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Alertas</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-bag fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"">{{$productNumber}}</div>
                                    <div>Alerta de Stock</div>
                                </div>
                            </div>
                        </div>
                        <a style="cursor: pointer" data-toggle="modal" data-target="#alertStock">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="modal fade" id="alertStock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Stock de productos</h4>
                            </div>
                            <div class="modal-body text-justify">
                                @foreach($products as $product)
                                    <div><label>Nombre: </label> {{$product->name}}</div>
                                    <div><label>Cantidad: </label> {{$product->quantity}}</div>
                                    <hr>
                                @endforeach
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($alerts as $alert)
                    <?php
                        $now = new DateTime();
                        $alertsFound = \Veterinaria\Alert::where('alerts_type_id','=',$alert->id)->where('date','>',$now)->get();
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-{{$alert->color}}">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa {{\Veterinaria\FontAwesome::find($alert->font_awesome_id)->font}} fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge" id="number{{$alert->id}}">
                                            {{$alertsFound->count()}}
                                        </div>
                                        <div>{{$alert->title}}</div>
                                    </div>
                                </div>
                            </div>
                            <a style="cursor: pointer" data-toggle="modal" data-target="#alertType{{$alert->id}}">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver Detalles</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="modal fade" id="alertType{{$alert->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">{{$alert->title}}</h4>
                                </div>
                                <div class="modal-body text-justify" id="alertTypeBody{{$alert->id}}">
                                    @foreach($alertsFound as $alertFound)
                                        <?php
                                            $pet = \Veterinaria\Pet::find($alertFound->pets_id);
                                            $breed = \Veterinaria\Breed::find($pet->breed_id);
                                            $client = \Veterinaria\Client::find($pet->client_id);
                                            $specie = \Veterinaria\Species::find($breed->species_id);
                                            $age = \Veterinaria\Http\Controllers\UtilsController::calculateAge($pet->birth_date);
                                        ?>
                                        <div>
                                            <label>Nombre Cliente:</label>
                                            &nbsp;{{$client->name}}
                                            &nbsp;{{$client->lastname}}
                                        </div>
                                        <div>
                                            <label>Teléfono:</label>
                                            &nbsp;{{$client->phone}}
                                            &nbsp;&nbsp;{{$client->cellphone}}
                                        </div>
                                        <div><label>Email:</label>&nbsp;{{$client->email}}</div>
                                        <div><label>Nombre Paciente:</label>&nbsp;{{$pet->name}}</div>
                                        <div><label>Especie:</label>&nbsp;{{$specie->species}}</div>
                                        <div><label>Raza:</label>&nbsp;{{$breed->name}}</div>
                                        <div><label>Edad:</label>&nbsp;{{$age}}</div>
                                        <div><label>Alerta:</label>&nbsp;{{$alertFound->description}}</div>
                                        <div><label>Fecha Alerta:</label>&nbsp;{{$alertFound->date}}</div>
                                        <hr>
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection