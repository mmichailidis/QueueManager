@foreach($jobs as $job)
{{$job->Name}}
{{$job->IsByName}}
{{$job->LastNumber}}
{{$job->TypeOfJob}}
{{$job->AverageWaitingTime}}
<br>
@endforeach
