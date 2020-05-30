<template>
    <section>
        <div class="container mt-5">
            <div class="text-center">
                <h1>Login</h1>
            </div>
            <div class="border col-5 p-5 m-auto">
                <div class="mb-4">
                    <input class="form-control" placeholder="Email" v-model="email">
                </div>
                <div class="mb-4">
                    <input class="form-control" placeholder="Password" v-model="password">
                </div>
                <div class="text-right">
                    <button class="btn btn-primary" @click="save()">Save</button>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    export default {
        data() {
            return {
                email: '',
                password: ''
            }
        },
        methods: {
            save() {
                let url = `http://localhost:8000/api/customer/login`;

                if( this.email && this.password ) {
                    let formData = {
                        'email' : this.email,
                        'password' : this.password
                    }

                    this.axios.post(url, formData).then(res => {
                        localStorage.setItem('id_user', res.data.data.id)
                        localStorage.setItem('name_user', res.data.data.name)
                        this.$router.push('product')
                    }).catch(e => {
                        console.error(e)
                    });
                }
            }
        }
    }
</script>