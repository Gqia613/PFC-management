<template>
    <div class="container">
        <div class="mt-3 mb-3">
            <router-link :to="{ name: 'List'}" class="text-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                </svg>
                戻る
            </router-link>
        </div>

        <div class="card border-success mb-3" v-if="list">
            <div class="card-header text-success">期間：{{ list.first_day }} 〜 {{ list.last_day }}</div>
            <div class="card-body text-success">
                <p class="card-text">目標体重：{{ list.goal_weight }}kg</p>
                <p class="card-text">1日あたりの消費カロリー：{{ list.lost_calorie }}kcal</p>
                <p class="card-text">1日あたりの摂取カロリー：{{ list.intake_calorie }}kcal</p>
                <p class="card-text">日数：{{ list.diet_term }}日</p>
                <p class="card-text">運動量：{{ list.exercise }}</p>
                <p class="card-text">1日の食事回数：{{ list.meals_number }}回</p>
                <p class="card-text">1日の必要なタンパク質：{{ list.need_protein }}g</p>
                <p class="card-text">1日の必要な脂質：{{ list.need_fat }}g</p>
                <p class="card-text">1日の必要な炭水化物：{{ list.need_carbohydrate }}g</p>
                <p class="card-text">身長：{{ list.height }}cm</p>
                <p class="card-text">体重：{{ list.weight }}kg</p>
                <p class="card-text">年齢：{{ list.age }}歳</p>
            </div>
        </div>

        <div class="row" v-if="list">
          <button type="button" class="btn btn-danger col-8 mx-auto" @click="deleteList">
            削除する
          </button>
        </div>

        <div class="alert alert-warning" role="alert" v-if="!list">
          ※データが正しく読み込めませんでした。再度結果一覧からお願いいたします。
        </div>
    </div>
</template>

<script>
export default {
    name: 'ListDetail',
    data: () => ({
        user_id: "",
        physique_id: "",
        list: null,
    }),
    methods: {
        deleteList() {
            axios.post('/api/deletelist', {
                user_id: this.user_id,
                physique_id: this.physique_id
            })
            .then((res) => {
                this.$router.push({ name: 'List' });
            })
        }
    },
    mounted() {
        this.user_id = this.$route.params.user_id;
        this.physique_id = this.$route.params.physique_id;
        axios.get('/api/getlist-detail', {
            params: {
                user_id: this.user_id,
                physique_id: this.physique_id
            }
        })
        .then((res) => {
            this.list = res.data;
        })
    }
}
</script>
