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

        <div class="card border-success mb-3" v-if="list && result_calculation">
            <div class="card-header text-success">期間：{{ list.first_day }} 〜 {{ list.last_day }}</div>
            <div class="card-body text-success">
                <p class="card-text">目標体重：{{ list.goal_weight }}kg</p>
                <p class="card-text">1日あたりの消費カロリー：{{ list.lost_calorie }}kcal</p>
                <p class="card-text">1日あたりの摂取カロリー：{{ list.intake_calorie }}kcal</p>
                <p class="card-text">日数：{{ list.diet_term }}日</p>
                <p class="card-text">運動量：{{ list.exercise }}</p>
                <p class="card-text">1日の食事回数：{{ list.meals_number }}回</p>
                <p class="card-text">1日に必要なタンパク質：{{ list.need_protein }}g</p>
                <p class="card-text">1日に必要な脂質：{{ list.need_fat }}g</p>
                <p class="card-text">1日に必要な炭水化物：{{ list.need_carbohydrate }}g</p>
                <p class="card-text">身長：{{ list.height }}cm</p>
                <p class="card-text">体重：{{ list.weight }}kg</p>
                <p class="card-text">年齢：{{ list.age }}歳</p>
                <p class="card-text">1食に必要なタンパク質：{{ result_calculation.protein_1meal }}g</p>
                <p class="card-text">1食に必要な脂質：{{ result_calculation.fat_1meal }}g</p>
                <p class="card-text">1食に必要な炭水化物：{{ result_calculation.carbohydrate_1meal }}g</p>
                <p class="card-text">ささみの場合：{{ result_calculation.chicken_tender }}g</p>
                <p class="card-text">鶏むね肉の場合：{{ result_calculation.chicken_breast }}g</p>
                <p class="card-text">白米の場合：{{ result_calculation.white_rice }}g</p>
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
        result_calculation: null,
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
        },
        detailCalculation(num, protein, fat, carbohydrate) {
            let n = 2;
            let result = [];
            // 一食分おPFCを計算
            let protein_1meal = protein / num;
            let fat_1meal = fat / num;
            let carbohydrate_1meal = carbohydrate / num;
            // 鶏ムネ肉、ささみ、白米の比率を計算
            let chicken_tender_ratio = 100 / 25;
            let chicken_breast_ratio = 100 / 20;
            let white_rice_ratio = 100 / 36.8;
            // 鶏ムネ肉、ささみ、白米に換算してそれぞれ一食あたりの食べる量を計算
            let chicken_tender = protein_1meal * chicken_tender_ratio;
            let chicken_breast = protein_1meal * chicken_breast_ratio;
            let white_rice = carbohydrate_1meal * white_rice_ratio;

            result['protein_1meal'] = Math.round( protein_1meal * Math.pow( 10, n ) ) / Math.pow( 10, n );;
            result['fat_1meal'] = Math.round( fat_1meal * Math.pow( 10, n ) ) / Math.pow( 10, n );;
            result['carbohydrate_1meal'] = Math.round( carbohydrate_1meal * Math.pow( 10, n ) ) / Math.pow( 10, n );;
            result['chicken_tender'] = Math.round( chicken_tender * Math.pow( 10, n ) ) / Math.pow( 10, n );;
            result['chicken_breast'] = Math.round( chicken_breast * Math.pow( 10, n ) ) / Math.pow( 10, n );;
            result['white_rice'] = Math.round( white_rice * Math.pow( 10, n ) ) / Math.pow( 10, n );;

            this.result_calculation = result;
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
            this.detailCalculation(this.list['meals_number'], this.list['need_protein'], this.list['need_fat'], this.list['need_carbohydrate']);
            if(this.list['exercise'] == 1.2) {
                this.list['exercise'] = 'ほぼ運動しない。通勤、デスクワーク程度';
            }else if(this.list['exercise'] == 1.375) {
                this.list['exercise'] = '軽い運動。週に1回～2回程度の運動';
            }else if(this.list['exercise'] == 1.55) {
                this.list['exercise'] = '中程度の運動。週に3回～5回程度の運動';
            }else if(this.list['exercise'] == 1.725) {
                this.list['exercise'] = '激しい運動。週に6回～7回程度の運動';
            }else if(this.list['exercise'] == 1.9) {
                this.list['exercise'] = '非常に激しい運動。一日に2回程度の運動';
            }
        })
    }
}
</script>
