@extends('layouts.app')

@section('content')
<div id="app">

    @if (session('success'))
    <div class="alert-success" id="type-success">
        <p>{{ session('success') }}</p>
    </div>
    @endif

    @if ($errors->any())
    <div class="alert-danger" id="type-error">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-form">Add Sub-Company</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>

            </div>
            <div class="card-content collapse show">
                <div class="card-body">

                    <form @submit.prevent="sendData">
                        <div class="form-body">
                            <div class="form-group">
                                <label for="companyName">Company</label>
                                <input type="text" id="companyName" class="form-control" placeholder="Company Name" v-model="company_name" name="company_name">
                            </div>
                            <div class="form-group">
                                <label for="companyName">Address</label>
                                <input type="text" id="companyName" class="form-control" placeholder="Address" name="address" v-model="address">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput1">Phone Number</label>
                                        <input type="text" id="projectinput1" class="form-control" placeholder="phone umber" name="phone_number" v-model="phone_number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput2">Fax Number</label>
                                        <input type="text" id="projectinput2" class="form-control" placeholder="fax number" name="fax_number" v-model="fax_number">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput3">E-mail</label>
                                        <input type="text" id="projectinput3" class="form-control" placeholder="E-mail" name="email" v-model="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput4">NPWP</label>
                                        <input type="text" id="projectinput4" class="form-control" placeholder="npwp" name="npwp" v-model="npwp">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput3">Akte Pendirian Terakhir</label>
                                        <input type="text" id="projectinput3" class="form-control" placeholder="akte pendirian terakhir" name="akte_pendirian_terakhir" v-model="akte_pendirian_terakhir">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput4">NIB</label>
                                        <input type="text" id="projectinput4" class="form-control" placeholder="nib" name="nib" v-model="nib">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput3">Jenis Usaha</label>
                                        <input type="text" id="projectinput3" class="form-control" placeholder="Jenis Usaha" name="jenis_usaha" v-model="jenis_usaha">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput4">No. KLU</label>
                                        <input type="text" id="projectinput4" class="form-control" placeholder="NO-KLU" name="no_klu" v-model="no_klu">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput3">Directur</label>
                                        <input type="text" id="projectinput3" class="form-control" placeholder="directur" name="directur" v-model="directur">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput4">NPWP Directur</label>
                                        <input type="text" id="projectinput4" class="form-control" placeholder="npwp directur" name="npwp_directur" v-model="npwp_directur">
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="form-actions">
                            <a href="/subcompany"><button type="button" class="btn btn-warning mr-1">
                                    <i class="ft-x"></i> Cancel
                                </button></a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-check-square-o"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('pagescript')


<script>
    const App = {
        data() {
            return {
                company_name: "",
                address: "",
                phone_number: "",
                fax_number: "",
                email: "",
                npwp: "",
                akte_pendirian_terakhir: "",
                nib: "",
                jenis_usaha: "",
                no_klu: "",
                directur: "",
                npwp_directur: ""

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
                axios.post('/subcompany', {
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
                    window.location.href="/subcompany"
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