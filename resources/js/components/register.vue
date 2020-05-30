<template>
    <section>
        <div class="container mt-5">
            <div class="text-center">
                <h1>Register</h1>
            </div>
            <div class="border col-5 p-5 m-auto">
                <div class="mb-4">
                    <input class="form-control" placeholder="Name" v-model="name">
                </div>
                <div class="mb-4">
                    <input class="form-control" placeholder="Email" v-model="email">
                </div>
                <div class="mb-4">
                    <input class="form-control" placeholder="Password" v-model="password">
                </div>
                <div class="text-right">
                    <button class="btn btn-primary" @click="save()">Save</button>
                </div>
                <div>
                    <small>Already have an account ? <b style="cursor:pointer;" @click="getLogin()">Login</b></small>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    export default {
        data() {
            return {
                name: '',
                email: '',
                password: ''

            }
        },
        methods: {
            save() {
                let url = `http://localhost:8000/api/customer/create`;

                if( this.name && this.email && this.password ) {
                    let formData = {
                        'name' : this.name,
                        'email' : this.email,
                        'password' : this.password
                    }
                    this.axios.post(url, formData).then(res => {
                        this.$router.push('product')
                    })
                }
            },

            getLogin() {
                this.$router.push('login')
            }
        }
    }
</script>