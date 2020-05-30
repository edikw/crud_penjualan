<template>
    <section>
        <Navbar></Navbar>
        <div class="container mt-5">
            <div class="text-center">
                <h1>
                    Transaction
                </h1>
            </div>
            <div class="border p-4">
                <h5>Name : {{ name }}</h5>
                <h5>Product : </h5>
                <div class="row m-1 justify-content-center my-5">
                    <div class="border col-4 p-3 m-1" v-for="(product , index) in products" :key="index">
                        <h6 class="text-center font-weight-bold">{{ product.name }}</h6>
                        <h6>Rp {{ formatCurrency(product.price) }}</h6>
                        <h6>{{ product.stock }} (stock)</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    import Navbar from './navbar.vue';

    export default {
        components: {
            Navbar
        },
        data() {
            return {
                products: [],
                name: ''
            }
        },

        mounted() {
            this.name = localStorage.getItem('name_user');
            this.getTransaction(localStorage.getItem('id_user'));
        },

        methods: {
            getTransaction(id) {
                let url = `http://localhost:8000/api/transaction/${id}`
                this.axios.get(url).then(res=> {
                    this.products = res.data.product
                });
            },

            formatCurrency(num) {
                return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
            },
        }
    }
</script>