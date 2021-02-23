@extends('shared.layout-admin')
@section('title', 'Customer Payment List')

@section('content')

    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item active">payment</li>
                        </ol>
                        <a href="{{ route('payment_receives.create') }}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Customer Payment</h4>
                            <h6 class="card-subtitle">All Payments</h6>
                            <h5 class="required">** AFTER PUSH EDIT IS NOT ALLOWED SO VERIFY ENTRY BEFORE PUSH **</h5>
                            <div class="table-responsive m-t-40">
                                <table id="customer_payments_table" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>SR#</th>
                                        <th>Customer</th>
                                        <th>Transaction Date</th>
                                        <th>Amount</th>
                                        <th>REF#</th>
                                        <th width="100">Push Payment</th>
                                        <th width="100">Action</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#customer_payments_table').dataTable({
                processing: true,
                ServerSide: true,
                ajax:{
                    url: "{{ route('payment_receives.index') }}",
                },
                columns:[
                    {
                        data: 'id',
                        name: 'id',
                        visible: false
                    },
                    {
                        data: 'customer',
                        name: 'customer'
                    },
                    {
                        data: 'transferDate',
                        name: 'transferDate'
                    },
                    {
                        data: 'paidAmount',
                        name: 'paidAmount'
                    },
                    {
                        data: 'referenceNumber',
                        name: 'referenceNumber'
                    },
                    {
                        data: 'push',
                        name: 'push',
                        orderable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                ],
                order: [[ 0, "desc" ]]
            });
        });
    </script>
@endsection
