<template>
    <section>
        <div class="bg-light p-3 text-right">
            <div class="dropdown">
                <button class="btn btn-lg btn-secondary button__log" id="dropdownMenuButton" data-toggle="dropdown" >{{ name }}</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" @click="logout()">Logout</a>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    export default {
        data() {
            return {
                name: ''
            }
        },

        mounted() {
            this.name = localStorage.getItem('name_user')
        },

        methods: {
            logout() {
                localStorage.removeItem('id_user');
                localStorage.removeItem('name_user');
                this.$router.push('/');
            }
        }
    }
</script>
<style scoped>
    .button__log {
        width: 150px;
        cursor: pointer;
    }
</style>