@extends('layouts.app')

@section('content')

<!-- HTML (DOM) sourced data -->
<section id="html">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">SUB COMPANY</h3>
                    <a href="/subcompany/create" class="btn btn-social btn-min-width mr-1 mb-1 btn-vimeo pull-right" class="float-sm-left">
                        <span class="fa fa-plus"></span> Add Subcompany &nbsp; </a>

                </div>
                <div class="card-content collpase show">
                    <div class="card-body card-dashboard">

                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Company Name</th>
                                    <th>address</th>
                                    <th>Phone number</th>
                                    <th>Fax number</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subcompanies as $subcompany)
                                <tr>
                                    <td>{{ $subcompany->company_name }}</td>
                                    <td>{{ $subcompany->address }}</td>
                                    <td>{{ $subcompany->phone_number }}</td>
                                    <td>{{ $subcompany->fax_number }}</td>
                                    <td>-</td>
                                    <td>
                                        <a href="/subcompany/detail/{{ $subcompany->id }}"><button type="button" class="btn btn-primary" data-backdrop="false"><i class="fa fa-eye"></i></button></a>&nbsp;
                                        <br><br><a href="/subcompany/edit/{{ $subcompany->id }}"><button type="button" class="btn btn-danger"><i class="fa fa-pencil-square-o"></i></button></a>
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade text-left" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info white">
                    <h4 class="modal-title" id="myModalLabel11">Detail</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal"><i class="fa fa-eye-slash"></i></button>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

</section>

<!--/ HTML (DOM) sourced data -->

@endsection

@section('pagescript')



@endsection