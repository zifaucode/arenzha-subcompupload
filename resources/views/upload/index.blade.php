@extends('layouts.app')



@section('content')

<div class="page-content" id="app">
    <!-- button -->
    @if(session('account'))




    <button class="btn btn-lg btn-success mb-1" @click="onClickSaleButton">
        <span v-if="isLoading" class="fa fa-futbol-o spinner" role="status" aria-hidden="true"></span>
        Tampilkan data miscsales
    </button>

    <!-- <button class="btn btn-lg btn-block font-medium-1 btn-outline-danger mb-1 block-msg-animation" >
            
            </button> -->
    <div class="card">
        <div class="card-content">
            <div class="card-body text-center">
                <h3>Total data : @{{ (miscsales.length) }}</h3>
                <h3>Total amount : @{{ toCurrency(total) }}</h3>
            </div>
        </div>
    </div>
    <div style="max-height: 540px;overflow: scroll;">
        <table class="table">
            <tbody>
                <tr v-for=" (row, index) in filteredMiscsales">
                    <td><input type="checkbox" :value="i" v-model="checkedMiscsales"></td>
                    <td v-for="data in row">@{{ data }}</td>

                </tr>
            </tbody>
        </table>
    </div>



    <!-- <h1>{{ count($subcompanies) }}</h1> -->


    <div v-for="(subcompany, index) in subcompanies" class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">

                <!--end card-header-->

                <div class="card-body">

                    <!-- Nav tabs -->
                    <h4 class="card-title">@{{ subcompany.company_name }}</h4>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" :href="'#account' + subcompany.id " role="tab" aria-selected="true">Akun</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" :href="'#miscsale' + subcompany.id " role="tab" aria-selected="false">Sales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" :href="'#journal' + subcompany.id " role="tab" aria-selected="false">Jurnal</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane p-3" id="'account' + subcompany.id " role="tabpanel">
                        </div>
                        <h3>Total data : @{{ (subcompany.sales.length) }}</h3>
                        <h3>Total amount : @{{ toCurrency(subcompanyTotal(subcompany.sales)) }}</h3>
                        <!-- <h3>Total amount : @{{ (total) }}</h3> -->
                        <div class="tab-pane p-3 active" id="miscsale + subcompany.id " role="tabpanel">
                            <select class="form-control multiple-select" :data-index="index" multiple>
                                <option v-for="(i, index) in options" :value="'o' + i" :disabled="isSelected('o' + i)">@{{ i }}</option>
                            </select>
                            <div style="max-height: 600px; overflow-y: scroll;">
                                <table class="table">
                                    <tr v-for="subcompanySale in subcompany.sales">
                                        <td v-for="data in subcompanySale">@{{ data }}</td>
                                    </tr>
                                </table>
                            </div>
                            <pre>@{{ subcompany.model }}</pre>
                        </div>

                        <div class="tab-pane p-3" id="'journal' + $subcompany.id " role="tabpanel">

                        </div>
                    </div>
                </div>

            </div>
            <!--end card-body-->

        </div>
    </div>







    @endif

</div>
@endsection

@section('pagescript')
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script>
    const app = new Vue({
        el: '#app',
        data: {
            checkedMiscsales: [],
            name: '',
            miscsales: [],
            names: [],
            amount: [],
            subcompanies: JSON.parse(`{!! json_encode($subcompanies) !!}`),
            isLoading: false,
        },
        methods: {
            fetchSales() {
                let self = this;
                self.isLoading = true;
                axios.get('/upload/api/miscsales')
                    .then((response) => {
                        console.log(response);
                        let data = response.data.data;
                        if (!Array.isArray(data)) {
                            data = [];
                        }
                        self.isLoading = false;
                        self.miscsales = data
                    }).catch(error => {
                        self.isLoading = false;
                        console.log(error.response.data)
                    })
            },
            onClickSaleButton() {
                let self = this;
                self.fetchSales();
            },
            getDataByNames(names) {
                // console.log(names.length);
                if (names.length) {
                    // names = names.map(name => name.substring(1));
                    // return this.miscsales.filter(sale => names.indexOf(sale[0]) > -1);
                    return this.miscsales;

                    // return names;
                }
                return [];
            },

            subcompanyTotal: function(data) {
                // let total = [];
                const miscsales = data.map(sale => {
                    const newNumber = sale[11].split('.')[0];
                    return Number(newNumber.replace(/[^\d-]/g, ''));
                });

                return miscsales.reduce(function(total, num) {
                    return total + num
                }, 0);
            },

            isSelected: function(value) {
                let self = this;
                let selectedOptions = this.subcompanies.map(subcompany => {
                    return subcompany.model
                });

                // let flattedSelectedOptions = selectedOptions.flat();
                // let flattedSelectedOptions = Array.prototype.concat.apply([], selectedOptions);
                let flattedSelectedOptions = selectedOptions.reduce((acc, el) => acc.concat(el), []);
                console.log(flattedSelectedOptions)

                // let cleanSelectedOptions = [...new Set(flattedSelectedOptions)];
                if (flattedSelectedOptions.indexOf(value) < 0) {

                    // if (flattedSelectedOptions.indexOf(value) < 0) { ----- INI YANG DEFAULT
                    return false;
                }
                return true;
            },
            toCurrency: function(number) {
                return new Intl.NumberFormat('De-de').format(number);
            }
        },
        computed: {
            total: function() {
                // let total = [];
                const miscsales = this.miscsales.map(sale => {
                    const newNumber = sale[11].split('.')[0];
                    return Number(newNumber.replace(/[^\d-]/g, ''));
                });
                return miscsales.reduce(function(total, num) {
                    return total + num
                }, 0);
            },
            selectedOptions: function() {
                let selectedOptions = this.subcompanies.map(subcompany => {
                    return subcompany.model
                });
                // return [...new Set(selectedOptions)];
                return selectedOptions;
            },
            options() {
                // return this.miscsales.map(sale => sale[0])
                //     .filter((sale, index, self) => {
                //         return self.indexOf(sale) === index;
                //     })
                const names = this.miscsales.map(sale => sale[0]);
                const options = [...new Set(names)];
                return options;
            },
            filteredMiscsales() {
                let self = this;
                // let names = self.selectedOptions;
                // console.log(names);
                // if (names.length) {
                //     return self.miscsales.filter(sale => names.indexOf('o' + sale[0]) < 0);

                // }
                return self.miscsales;

            },

            // checked() {
            //     const names = this.miscsales.map(sale => sale[0]);
            //     const options = [...new Set(names)];
            //     return options;
            // },
        },

    })
</script>
<script>
    $(function() {
        $('.multiple-select').select2({
            width: "100%",

        });

        // $('.multiple-select').each(function(index, el) {
        //     $(el).on('change', function(e) {
        //         const index = $(this).attr('data-index');
        //         console.log(index);
        //         const names = $(this).val();
        //         console.log(names);
        //         // app.$data.subcompanies[index].model = names;
        //         const filteredSales = app.$data.miscsales.filter(sale => names.indexOf('o' + sale[0]) > -1);
        //         // const names = app.$data.miscsales.filter(sale => names.indexOf(names) > -1);
        //         // console.log(filteredSales)
        //         // console.log(filteredSales);
        //         //    console.log('index', index)
        //         // app.$data.subcompanies. [index].model = names;
        //         app.$data.subcompanies[index].model = names;
        //         app.$data.subcompanies[index].sales = filteredSales;
        //         // app.$data.subcompanies[index].sales = app.$data.miscsales.filter(sale => names.indexOf(sale[0]) > -1);
        //         // app.$data.subcompanies[index].sales = [['asdasd', 'werwer']];
        //         // console.log(app.$data);

        //     })
        // })

        $('.multiple-select').on('change', function(e) {
            const index = $(this).attr('data-index');
            console.log(index);
            const names = $(this).val();
            console.log(names);
            const filteredSales = app.$data.miscsales.filter(sale => names.indexOf('o' + sale[0]) > -1);
            // console.log(filteredSales);
            app.$data.subcompanies[index].model = names;
            app.$data.subcompanies[index].sales = filteredSales;
            // app.$data.subcompanies[index].sales = app.$data.miscsales.filter(sale => names.indexOf(sale[0]) > -1);
            // app.$data.subcompanies[index].sales = [['asdasd', 'werwer']];
            // console.log(app.$data);

        })


    })
</script>

@endsection