<!-- Modal -->
<?php
    $petBreed = \Veterinaria\Breed::find($pet->breed_id);
    $breedName = $petBreed->name;
    $specieId = $petBreed->species_id;
    $specieName = \Veterinaria\Species::find($specieId)->species;

    $date2 = date('Y-m-d');
    $diff = abs(strtotime($date2) - strtotime($pet->birth_date));
    $years = floor($diff / (365*60*60*24));
    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

    if($years == 1){$yearAge = 'año';}
    else{$yearAge = 'años';}

    if($months == 1){$monthsAge = 'mes';}
    else{$monthsAge = 'meses';}

    if($days == 1){$daysAge = 'día';}
    else{$daysAge = 'días';}

    $date = $years.' '.$yearAge.' '.$months.' '.$monthsAge.' '.$days.' '.$daysAge;
?>
<div class="modal fade" id="information{{$pet->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Información Mascota {{ucfirst ( strtolower ( $pet->name ))}}</h4>
            </div>
            <div class="modal-body text-justify">
                <div>{!!Form::label('Nombre:')!!}&nbsp;{{$pet->name}}</div>
                <div>
                    {!!Form::label('Sexo:')!!}&nbsp;
                    @if ($pet->sex == 1)
                        MACHO
                    @else
                        HEMBRA
                    @endif
                </div>
                <div>{!!Form::label('Fecha Nacimiento:')!!}&nbsp;{{$pet->birth_date}}</div>
                <div>{!!Form::label('Edad:')!!}&nbsp;{{$date}}</div>
                <div>{!!Form::label('Especie:')!!}&nbsp;{{$specieName}}</div>
                <div>{!!Form::label('Raza:')!!}&nbsp;{{$breedName}}</div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
            </div>
        </div>
    </div>
</div>