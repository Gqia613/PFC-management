<template>
  <div class="container">
    <ul class="list-group list-group-flush mt-3">
        <li class="list-group-item" style="background-color: #f8fafc;">
            <div class="row">
                <router-link :to="{ name: 'MyPhysique'}">
                    <button type="button" class="btn btn-success col-12 mx-auto">
                        プロフィール編集
                    </button>
                </router-link>
            </div>
        </li>
        <li class="list-group-item" style="background-color: #f8fafc;">
            <div class="row">
                <button type="button" class="btn btn-warning col-6 mx-auto" @click="logout">
                ログアウト
                </button>
            </div>
        </li>
    </ul>
  </div>
</template>

<script>
export default {
    name: 'Setting',
    methods: {
        logout() {
            axios.post('/api/logout')
                .then(() => {
                    this.$router.push({ name: "Login" });
                })
        }
    }
}
</script>

<style scoped>
</style>
