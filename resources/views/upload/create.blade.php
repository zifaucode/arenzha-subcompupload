@extends('layouts.app')

@section('content')

<h3>Page Upload</h3>
<br>

<!-- Basic File Browser start -->
<div id="app">
    <form @submit.prevent="send" enctype="multipart/form-data">
        <section class="file-browser">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <label class="card-title">Upload file Account</label>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="col-lg-6 col-md-12">
                                    <fieldset class="form-group">
                                        <div class="custom-file">
                                            <input type="file" @change="handleUploadAccount()" ref="account" class="custom-file-input">
                                            <label class="custom-file-label" ref="accountInputLabel">Choose file Acount</label>
                                        </div>
                                    </fieldset>
                                    <!-- Button Download -->
                                    <!-- <button type="button" class="btn btn-float btn-float-md btn-outline-cyan"><i class="fa fa-cloud-download"></i>
                                        <span>Downloads</span>
                                    </button> -->
                                    <!-- Button Download end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic File Browser end -->
        <!-- Basic File Browser start -->
        <section class="file-browser">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <label class="card-title">Upload file Sales</label>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="col-lg-6 col-md-12">
                                    <fieldset class="form-group">
                                        <div class="custom-file">
                                            <input type="file" @change="handleUploadMiscsale()" ref="miscsale" class="custom-file-input">
                                            <label class="custom-file-label" ref="miscsaleInputLabel">Choose file Miscsales</label>
                                        </div>
                                    </fieldset>

                                    <!-- Button Download -->
                                    <!-- <button type="button" class="btn btn-float btn-float-md btn-outline-cyan"><i class="fa fa-cloud-download"></i>
                                        <span>Downloads</span>
                                    </button> -->
                                    <!-- Button Download end -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic File Browser end -->

        <!-- Basic File Browser start -->
        <section class="file-browser">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <label class="card-title">Upload file Journal</label>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="col-lg-6 col-md-12">
                                    <fieldset class="form-group">
                                        <div class="custom-file">
                                            <input type="file" @change="handleUploadJournal()" ref="journal" class="custom-file-input">
                                            <label class="custom-file-label" ref="journalInputLabel">Choose file Journal</label>
                                        </div>
                                    </fieldset>

                                    <!-- Button Download -->

                                    <!-- Button Download end -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-float btn-float-md btn-outline-cyan"><i class="fa fa-cloud-upload"></i>
                <span>Upload</span>
            </button>

        </section>
    </form>
</div>
<br>
<br>
<!-- Basic File Browser end -->

@endsection

@section('pagescript')
<script>
    const App = {
        data() {
            return {
                account: null,
                miscsale: null,
                journal: null,

            }
        },
        methods: {
            handleUploadAccount() {
                this.account = this.$refs.account.files[0];
                if (this.account !== undefined) {
                    this.$refs.accountInputLabel.innerHTML = this.account.name;
                } else {
                    this.$refs.accountInputLabel.innerHTML = 'Choose File Account';
                }
            },
            handleUploadMiscsale() {
                this.miscsale = this.$refs.miscsale.files[0];

                if (this.miscsale !== undefined) {
                    this.$refs.miscsaleInputLabel.innerHTML = this.miscsale.name;
                } else {
                    this.$refs.miscsaleInputLabel.innerHTML = "Choose File Miscsale";
                }
            },
            handleUploadJournal() {
                this.journal = this.$refs.journal.files[0];
                if (this.journal !== undefined) {
                    this.$refs.journalInputLabel.innerHTML = this.journal.name;
                } else {
                    this.$refs.journalInputLabel.innerHTML = "Choose File Journal";
                }
            },

            //
            send() {
                let self = this;
                let formData = new FormData();
                formData.append('account', self.account)
                formData.append('miscsale', self.miscsale)
                formData.append('journal', self.journal)
                //
                axios.post('/upload', formData).then((res) => {
                    Swal.fire({
                        title: 'Success',
                        text: 'Data Has Been Uploaded',
                        icon: 'success',
                    });
                    // dd($table);
                    // console.log(res);
                    window.location.href = ' /upload'
                }).catch(err => {
                    Swal.fire({
                        title: 'Error',
                        text: 'Data Not Upload',
                        icon: 'error',
                    })
                    console.log(err);
                })
            }
        }
    }

    Vue.createApp(App).mount('#app')
</script>

@endsection