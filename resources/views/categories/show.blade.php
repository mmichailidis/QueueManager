@foreach($companies as $company)
    {{$company->Name}}
    {{--{{$company->CategoryId}} useless --}}
    {{$company->AutoProceedActivated}}
    {{$company->AutoProceedTime}}
    {{$company->VerificationRequired}}
    <br>
@endforeach
<!-- na parw fwto -->