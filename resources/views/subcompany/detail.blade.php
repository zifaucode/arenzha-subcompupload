@extends('layouts.app')

@section('content')

<!-- HTML (DOM) sourced data -->
<div id="app">
    <section id="html">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Detail SUB COMPANY</h3>


                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body card-dashboard">

                            <table class="table table-striped table-bordered" id="example">


                                <tbody>



                                    <tr>
                                        <th>Company Name</th>
                                        <td>{{$subcompany['company_name'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>address</th>
                                        <td>{{$subcompany['address'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone number</th>
                                        <td>{{$subcompany['phone_number']}}</td>
                                    </tr>
                                    <tr>
                                        <th>Fax number</th>
                                        <td>{{$subcompany['fax_number']}}</td>
                                    </tr>
                                    <tr>
                                        <th>email</th>
                                        <td>{{$subcompany['email']}}</td>
                                    </tr>
                                    <tr>
                                        <th>NPWP</th>
                                        <td>{{$subcompany['npwp']}}</td>
                                    </tr>
                                    <tr>
                                        <th>Akte Pendirian Terakhir</th>
                                        <td>{{$subcompany['akte_pendirian_terakhir']}}</td>
                                    </tr>
                                    <tr>
                                        <th>NIB</th>
                                        <td>{{$subcompany['nib']}}</td>
                                    </tr>
                                    <tr>
                                        <th>No KLU</th>
                                        <td>{{$subcompany['no_klu']}}</td>
                                    </tr>

                                    <tr>
                                        <th>Directur</th>
                                        <td>{{$subcompany['directur']}}</td>
                                    </tr>

                                    <tr>
                                        <th>NPWP Directur</th>
                                        <td>{{$subcompany['npwp_directur']}}</td>
                                    </tr>


                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>






</div>
</div>

</section>
</div>

<!--/ HTML (DOM) sourced data -->

@endsection

@section('pagescript')


<script>
    const App = {
        data() {
            return {

                subcompany: '{!! $subcompany !!}'
            }
        },
        methods: {
            sendData() {
                // console.log(this.company_name);
                // console.log(this.address);
                // console.log(this.phone_number);
                // console.log(this.fax_number);
                // console.log(this.email);
                // console.log(this.npwp);
                // console.log(this.akte_pendirian_terakhir);
                // console.log(this.nib);
                // console.log(this.jenis_usaha);
                // console.log(this.no_klu);
                // console.log(this.directur);
                // console.log(this.npwp_directur);


                let self = this;
                axios.post('/subcomp', {
                    company_name: self.company_name,
                    address: self.address,
                    phone_number: self.phone_number,
                    fax_number: self.fax_number,
                    email: self.email,
                    npwp: self.npwp,
                    akte_pendirian_terakhir: self.akte_pendirian_terakhir,
                    nib: self.nib,
                    jenis_usaha: self.jenis_usaha,
                    no_klu: self.no_klu,
                    directur: self.directur,
                    npwp_directur: self.npwp_directur,
                }).then((res) => {
                    Swal.fire({
                        title: 'Success',
                        text: 'Data Has Been Save',
                        icon: 'success',
                    })
                    window.location.href = "/subcomp"
                }).catch(err => {
                    Swal.fire({
                        title: 'Error',
                        text: 'Data Not Save',
                        icon: 'error',
                    })
                })
            }
        }
    }

    Vue.createApp(App).mount('#app')
</script>
</div>
@endsection