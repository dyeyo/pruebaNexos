@extends('layouts.app')

@section('content')
    @if ($registro==0)
        <registro_completo></registro_completo>
    @else
        <usuarios></usuarios>
    @endif
@endsection
<script>
    $(document).ready(function(){
        $('#DataTables_Table_0').DataTable({
            pageLength: 25,
            responsive: true,
        });
    });
</script>
