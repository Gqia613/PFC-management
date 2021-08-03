<template>
    <div class="container">
        <div class="card text-white bg-success mb-3 mt-3" v-for="(list, key) in lists" :key="key">
            <div class="card-body">
                <h5 class="card-title">期間：{{ list.first_day }} 〜 {{ list.last_day }}</h5>
                <h5 class="card-title">目標体重：{{ list.goal_weight }}kg</h5>
                <p class="card-text">1日あたりの消費カロリー：{{ list.lost_calorie }}kcal</p>
                <p class="card-text">1日あたりの摂取カロリー：{{ list.intake_calorie }}kcal</p>
                <div class="row">
                    <div class="col-8 mx-auto">
                        <router-link :to="{ name: 'ListDetail', params: { user_id: user.id, physique_id: list.id }}">
                            <button type="button" class="btn btn-light text-success col-12 mx-auto">詳細</button>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>

        <div class="alert alert-warning mt-3" role="alert" v-if="!lists">
            *データがありません。ホームから計算結果を保存してみましょう。
        </div>
    </div>
</template>

<script>
export default {
    name: 'List',
    data: () => ({
        user: null,
        lists: null,
    }),
    methods: {
        getList() {
            axios.get('/api/getlist', {
                params: {
                    user_id: this.user['id']
                }
            })
            .then((res) => {
                if(res.data[0]) {
                    this.lists = res.data;
                }
            })
        }
    },
    mounted() {
        axios.get('/api/user')
        .then((res) => {
            this.user = res.data;
            this.getList();
        })
    }
}
</script>
