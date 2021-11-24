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
                <h4 class="card-title" id="basic-layout-form">Edit Sub-Company</h4>
                <a href="/subcomp/create" class="btn btn-social btn-min-width mr-1 mb-1 btn-vimeo pull-right" data-toggle="modal" data-target="#success" class="float-sm-left">
                    <span class="fa fa-check"></span> Edit Status &nbsp; </a>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>

            </div>
            <div class="card-content collapse show">
                <div class="card-body">

                    <form @submit.prevent="updateData">
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
                                        <label for="projectinput3">Last Deed of Establishment</label>
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
                                        <label for="projectinput3">Type of business</label>
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
                            <div class="row">
                                <div class="form-group col-md-3 mb-2">
                                    <label for="projectinput6">Edit Status</label>
                                    <select id="projectinput6" name="interested" class="form-control">
                                        <option value="" selected="" disabled="">-- SELECT STATUS --</option>
                                        <option value="">AKTIF</option>
                                        <option value="development">NO-AKTIF</option>
                                    </select>
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



</div>
</div>

@endsection
@section('pagescript')

<script>
    const App = {
        data() {
            return {
                company_name: "{{$subcompany->company_name}}",
                address: "{{$subcompany->address}}",
                phone_number: "{{$subcompany->phone_number}}",
                fax_number: "{{$subcompany->fax_number}}",
                email: "{{$subcompany->email}}",
                npwp: "{{$subcompany->npwp}}",
                akte_pendirian_terakhir: "akte_pendirian_terakhir",
                nib: "{{$subcompany->nib}}",
                jenis_usaha: "{{$subcompany->jenis_usaha}}",
                no_klu: "{{$subcompany->no_klu}}",
                directur: "{{$subcompany->directur}}",
                npwp_directur: "{{$subcompany->npwp_directur}}",
            }
        },
        methods: {
            sendData() {
                let self = this;
                axios.post('/subcompany', {
                    name: self.name,
                    company: self.company,
                }).then((res) => {
                    console.log(res);
                    Swal.fire({
                        title: 'Success',
                        text: 'Data Has Been Save',
                        icon: 'success',
                    })
                    window.location.href = "/subcompany"
                }).catch(err => {
                    Swal.fire({
                        title: 'Error',
                        text: 'Data Not Save',
                        icon: 'error',
                    })
                })
            },
            updateData() {
                let self = this;
                axios.patch(`/subcompany/{{ $subcompany->id }}`, {
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
                        title: 'Updated',
                        text: 'Data Has Been Updated',
                        icon: 'updated',
                    })
                    window.location.href = "/subcompany"
                }).catch(err => {
                    Swal.fire({
                        title: 'Error',
                        text: 'Data Not Updated',
                        icon: 'error',
                    })
                })
            },
        }
    }

    Vue.createApp(App).mount('#app')
</script>
</div>
@endsection