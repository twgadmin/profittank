@extends('frontend.layouts.website.master')
@section('page-title', 'Transactions')
@section('style')
      <link rel="stylesheet" href="{!! asset ('assets/frontend/DataTables/datatables.min.css') !!}">
@endsection
<!-- page content  -->
@section('content')
<section class="activateForm pad-50">
    <div class="container hding-3 ">
         <h3><span>Transactions</span></h3>
         <br>
        <table id="myTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="1%"></th>
                    <th>Stripe Charge ID</th>
                    <th>Charged Amount</th>
                    <th>Description</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $key => $record)
                    <tr class="odd gradeX">
                        <td width="1%" class="f-s-600 text-inverse">{!! $record->id !!}</td>
                        <td>{!! $record->stripe_charge_id !!}</td>
                        <td>{!! $record->charged_amount !!}</td>
                        <td>{!! $record->description !!}</td>
                        <td>{!! $record->created_at !!}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

@endsection <!-- // page content end here -->
@section('js') 
<script type="text/javascript" src="{!! asset('assets/frontend/DataTables/datatables.min.js') !!}"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    });
</script>
@endsection