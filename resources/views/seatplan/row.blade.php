<tr style="background-color: {{$color}};">
    @if($align === 'L')
        <td class="seatTable"></td>
    @endif
    @foreach ($seatrow as $seat)
        @if(($seat->seatNumber > 0 ))
            @if(!($seat->seatReservation->isEmpty() ))
                <td class="seatTable" colspan="2" align="center">
                    <button type="button"
                            class="seatButton btn btn-block btn-xs btn-danger" {{ $editable === "true" ? '' : 'disabled="true"' }}>{{$seat->seatNumber }}</button>
                </td>
            @else
                <td class="seatTable" colspan="2" align="center">
                    <button type="button"
                            class="seatButton btn btn-block btn-xs btn-success">{{$seat->seatNumber }}</button>
                </td>
            @endif
            @else
                <td class="seatTable" colspan="2" align="center">
                </td>
        @endif

    @endforeach
    @if($align === 'R')
        <td class="seatTable"></td>
    @endif
</tr>