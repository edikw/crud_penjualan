<template>
    <section>
        <Navbar></Navbar>
        <div class="container mt-5">
            <div class="text-center">
                <h1>Product</h1>
            </div>
            <div class="d-flex mb-4">
                <div class="dropdown">
                    <button class="btn btn-outline-primary align-item-center dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" @click="getProduct()">All category</a>
                        <a class="dropdown-item" v-for="(category , index) in categories" :key="index" @click="catProduct(category.id, category.name)">{{ category.name }}</a>
                    </div>
                </div>
                <div class="align-self-center ml-4">{{ name_category }}</div>
            </div>
            <div class="border py-5 row m-1  justify-content-center">
                <div class="border p-3 col-5 m-1" v-for="(product, index) in products" :key="index">
                    <h4 class="text-center font-weight-bold mb-5">{{ product.name }}</h4>
                    <h5>Rp {{ formatCurrency(product.price) }}</h5>
                    <h6>{{ product.stock }} (stock)</h6>
                    <div class="text-right">
                        <button class="btn btn-sm btn-outline-primary" @click="buy(product.id)">Buy</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import Navbar from './navbar.vue';

    export default {
        components : {
            Navbar
        },

        data() {
            return {
                products: [],
                categories: [],
                name_category: 'All Category',
                id_user: null
            }
        },
        mounted() {
            this.id_user = localStorage.getItem('id_user')
            this.getProduct();
            this.getCategory();
        },
        methods: {
            getProduct() {
                this.name_category = 'All Category';
                let url_product = `http://localhost:8000/api/product`;
                this.axios.get(url_product).then(res => {
                    this.products = res.data.data
                });
            },

            getCategory() {
                let url_category = `http://localhost:8000/api/category`;
                this.axios.get(url_category).then(res => {
                    this.categories = res.data.data
                });
            },

            formatCurrency(num) {
                return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
            },
            
            catProduct(id, name) {
                this.name_category = name;
                let url_cat_product = `http://localhost:8000/api/category/${id}`;
                this.axios.get(url_cat_product).then(res => {
                    this.products = res.data.product
                });
            },

            buy(id) {
                let url_trans = `http://localhost:8000/api/transaction/create`;
                let formData = {
                    'customer' : this.id_user,
                    'product': id
                }

                this.axios.post(url_trans, formData).then(res => {
                    this.$router.push('transaction')
                });
            }
        }
    }

</script>

<style scoped>
    .dropdown-item {
        cursor: pointer;
    }
</style>