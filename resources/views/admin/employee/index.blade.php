{{--{{ dd($data, $jobs) }}--}}
{{--IsOnline, Se poio job einai (apo JobId), CurrentNumber, NumberStatus--}}

@foreach( $data as $single)
{{$single['Employee']->IsOnline}}
{{$jobs[$single['Employee']->JobId]->Name}}
{{$single['Employee']->CurrentNumber}}
{{$single['Employee']->NumberStatusg}}
@endforeach

