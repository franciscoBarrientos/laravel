@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        <div class="container-width">
            <div id="ajaxRequest" style="display: none">
                <div class="container-fluid">
                    <div class="alert alert-danger alert-dismissable" role="alert">
                        <button type="button" class="close" aria-label="Close" id="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul>
                            <li class="text-left" id="ajaxRequestResponse"></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <h4>Buscar Productos</h4>
            </div>

            <div class="form-group">
                <table class="container-width">
                    <tr>
                        <td class="searchField">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token"/>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Producto"/>
                        </td>
                        <td class="searchButton">
                            <input type="button" class="btn btn-primary" value="Buscar" id="search-btn"/>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="form-group">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token2"/>
                <table class="container-width">
                    <thead id="head"></thead>
                    <tbody id="data"></tbody>
                </table>
            </div>

            <div class="form-group" id="detail" style="display: none">
                {!!Form::open(['route'=>'ticket.store', 'method'=>'POST'])!!}
                    <h4>Detalle de Boleta</h4>
                    <h5>Número de próxima Boleta: {{\Veterinaria\Ticket::all()->last()->number + 1}}</h5>
                    <table class="container-width">
                        <thead id="headDetail">
                            <tr>
                                <th style='width: 20%'>Nombre</th>
                                <th style='width: 20%'>Cantidad</th>
                                <th style='width: 20%'>Precio Unitario</th>
                                <th style='width: 20%'>Precio SubTotal</th>
                                <th style='width: 20%'>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody id="dataDetail"></tbody>
                        <tr>
                            <td colspan="2"><input type="hidden" id="detailNumber" name="detailNumber" value="0"/></td>
                            <td><label>Total:</label>&nbsp;</td>
                            <td><input type="hidden" id="total" value="0"/><div id="totalPrice"></div></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="5">{!!Form::submit('Crear', ['class'=>"btn btn-primary icon-save"])!!}</td>
                        </tr>
                    </table>
                {!!Form::close()!!}
            </div>
        </div>
    @endsection

    @section('scripts')
        <!-- AJAX -->
        {!!Html::script('js/ajax.js')!!}
    @endsection