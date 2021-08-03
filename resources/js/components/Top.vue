<template>
  <div class="container">
    <ValidationObserver v-slot="{ invalid }">
      <form>
        <div class="mb-3 mt-3">
          <label for="firstday" class="form-label">開始日</label>
          <ValidationProvider rules="required" name="開始日" v-slot="{ errors }">
            <input
              v-model="firstday"
              type="date"
              class="form-control form-control-sm"
              id="firstday"
              aria-describedby="dateHelp"
            />
            <span>{{ errors[0] }}</span>
          </ValidationProvider>
        </div>

        <div class="mb-3">
          <label for="lastday" class="form-label">終了日</label>
          <ValidationProvider rules="required" name="終了日" v-slot="{ errors }">
            <input
              v-model="lastday"
              type="date"
              class="form-control form-control-sm"
              id="lastday"
              aria-describedby="dateHelp"
            />
            <span>{{ errors[0] }}</span>
          </ValidationProvider>
        </div>

        <div class="mb-3">
          <label for="exampleInputGoalWeight1" class="form-label">目標体重</label>
          <ValidationProvider rules="required|min_value:1" name="目標体重" v-slot="{ errors }">
            <input
              v-model="goalweight"
              type="number"
              class="form-control form-control-sm"
              aria-describedby="dateHelp"
              @keydown.69.prevent
              pattern="\d+\.?\d*"
            />
            <span>{{ errors[0] }}</span>
          </ValidationProvider>
          <div id="dateHelp" class="form-text"></div>
        </div>

        <div class="mb-3">
          <label for="exampleInputGoalWeight1" class="form-label">運動量</label>
          <ValidationProvider rules="required|selectCheck" name="運動量" v-slot="{ errors }">
            <select
              v-model="exercise"
              class="form-select form-select-sm"
              aria-label=".form-select-sm example"
            >
              <option value="0" selected>ご自身の運動量を選択してください</option>
              <option value="1.2">ほぼ運動しない。通勤、デスクワーク程度</option>
              <option value="1.375">軽い運動。週に1回～2回程度の運動</option>
              <option value="1.55">中程度の運動。週に3回～5回程度の運動</option>
              <option value="1.725">激しい運動。週に6回～7回程度の運動</option>
              <option value="1.9">非常に激しい運動。一日に2回程度の運動</option>
            </select>
            <span>{{ errors[0] }}</span>
          </ValidationProvider>
        </div>

        <div class="mb-3">
          <label for="exampleInputGoalWeight1" class="form-label">性別</label>
          <ValidationProvider rules="required|selectCheck" name="性別" v-slot="{ errors }">
            <select
              v-model="gender"
              class="form-select form-select-sm"
              aria-label=".form-select-sm example"
            >
              <option value="0" selected>性別を選択してください</option>
              <option value="man">男性</option>
              <option value="woman">女性</option>
            </select>
            <span>{{ errors[0] }}</span>
          </ValidationProvider>
        </div>

        <div class="mb-3">
          <label for="exampleInputGoalWeight1" class="form-label">年齢</label>
          <ValidationProvider rules="required|numeric|min_value:1" name="年齢" v-slot="{ errors }">
            <input
              v-model="age"
              type="number"
              class="form-control form-control-sm"
              aria-describedby="dateHelp"
              @keydown.69.prevent
              pattern="\d+\.?\d*"
            />
            <span>{{ errors[0] }}</span>
          </ValidationProvider>
          <div id="dateHelp" class="form-text"></div>
        </div>

        <div class="mb-3">
          <label for="exampleInputGoalWeight1" class="form-label">身長</label>
          <ValidationProvider rules="required|min_value:1" name="身長" v-slot="{ errors }">
            <input
              v-model="height"
              type="number"
              class="form-control form-control-sm"
              aria-describedby="dateHelp"
              @keydown.69.prevent
              pattern="\d+\.?\d*"
            />
            <span>{{ errors[0] }}</span>
          </ValidationProvider>
          <div id="dateHelp" class="form-text"></div>
        </div>

        <div class="mb-3">
          <label for="exampleInputGoalWeight1" class="form-label">体重</label>
          <ValidationProvider rules="required|min_value:1" name="体重" v-slot="{ errors }">
            <input
              v-model="weight"
              type="number"
              class="form-control form-control-sm"
              aria-describedby="dateHelp"
              @keydown.69.prevent
              pattern="\d+\.?\d*"
            />
            <span>{{ errors[0] }}</span>
          </ValidationProvider>
          <div id="dateHelp" class="form-text"></div>
        </div>
        <div class="row">
          <button id="resultBtn" type="button" :disabled="invalid" class="btn btn-success col-6 mx-auto" @click="getProduct" data-bs-toggle="modal" data-bs-target="#resultModal">
            結果を見る
          </button>
        </div>
      </form>
    </ValidationObserver>

    <!-- Modal -->
    <div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="resultModalLabel">計算結果</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <label for="meals_of_day" class="form-label">1日の食事回数</label>
            <select v-model="meals_number" @change="changeMealsNumber" class="form-select form-select-sm" aria-label=".form-select-sm meals_of_day">
              <option value="1">1食</option>
              <option value="2">2食</option>
              <option selected value="3">3食</option>
              <option value="4">4食</option>
              <option value="5">5食</option>
              <option value="6">6食</option>
              <option value="7">7食</option>
              <option value="8">8食</option>
              <option value="9">9食</option>
              <option value="10">10食</option>
            </select>

            <p class="fw-bold mt-3">1日に摂取できるPFC</p>
            <table class="table">
              <tbody>
                <tr>
                  <th scope="row">たんぱく質：</th>
                  <td>{{ (result['protein_of_1day']) }}g</td>
                </tr>
                <tr>
                  <th scope="row">脂質：</th>
                  <td>{{ (result['fat_of_1day']) }}g</td>
                </tr>
                <tr>
                  <th scope="row">炭水化物：</th>
                  <td>{{ (result['carbohydrate_of_1day']) }}g</td>
                </tr>
              </tbody>
            </table>

            <p class="fw-bold mt-3">1食に摂取できるPFC</p>
            <table class="table">
              <tbody>
                <tr>
                  <th scope="row">たんぱく質：</th>
                  <td>{{protein_of_1meal}}g</td>
                </tr>
                <tr>
                  <th scope="row">脂質：</th>
                  <td>{{fat_of_1meal}}g</td>
                </tr>
                <tr>
                  <th scope="row">炭水化物：</th>
                  <td>{{carbohydrate_of_1meal}}g</td>
                </tr>
              </tbody>
            </table>

            <div class="alert alert-warning" role="alert">
              ※ログインすると計算結果を保存して、いつでも確認することができます。
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">閉じる</button>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
import Vue from 'vue';
import { required, numeric, min_value } from 'vee-validate/dist/rules';
import { ValidationObserver, ValidationProvider, extend, localize } from 'vee-validate';

// Add a rule.
extend('required', {
  ...required,
  message: '{_field_}は必須です'
});

extend('numeric', {
  ...numeric,
  message: '{_field_}は数値を入力してください'
});

extend('min_value', {
  ...min_value,
  message: '{_field_}は0以上の数値を入力してください'
});

extend('selectCheck', value => {
  if (value !== "0") {
    return true;
  }
  return '{_field_}を選択してください';
});

Vue.component('ValidationObserver', ValidationObserver);
Vue.component('ValidationProvider', ValidationProvider);
export default {
  name: "Top",
  data: () => ({
    firstday: "",
    lastday: "",
    goalweight: "",
    exercise: "0",
    gender: "0",
    age: "",
    height: "",
    weight: "",

    error_msg: [],

    result: [],
    meals_number: "3",
    protein_of_1meal: "",
    fat_of_1meal: "",
    carbohydrate_of_1meal: "",

    user: null,
  }),
  methods: {
    getProduct() {
      axios.get("/api/calculation", {
          params: {
            first_day: this.firstday,
            last_day: this.lastday,
            goal_weight: this.goalweight,
            exercise: this.exercise,
            gender: this.gender,
            age: this.age,
            height: this.height,
            weight: this.weight,
          },
        })
        .then((response) => {
          let n = 2;
          this.result = response.data;
          this.protein_of_1meal = Math.round( (response.data['protein_of_1day'] / this.meals_number) * Math.pow( 10, n ) ) / Math.pow( 10, n );
          this.fat_of_1meal = Math.round( (response.data['fat_of_1day'] / this.meals_number) * Math.pow( 10, n ) ) / Math.pow( 10, n );
          this.carbohydrate_of_1meal = Math.round( (response.data['carbohydrate_of_1day'] / this.meals_number) * Math.pow( 10, n ) ) / Math.pow( 10, n );
        });
    },
    changeMealsNumber() {
      let n = 2;
      this.protein_of_1meal =  Math.round( (this.result['protein_of_1day'] / this.meals_number) * Math.pow( 10, n ) ) / Math.pow( 10, n );
      this.fat_of_1meal =  Math.round( (this.result['fat_of_1day'] / this.meals_number) * Math.pow( 10, n ) ) / Math.pow( 10, n );
      this.carbohydrate_of_1meal =  Math.round( (this.result['carbohydrate_of_1day'] / this.meals_number) * Math.pow( 10, n ) ) / Math.pow( 10, n );
    }
    // dateCheck() {
    //   let firstday = new Date(this.firstday);
    //   let lastday  = new Date(this.lastday);
    //   console.log(firstday);
    //   console.log(lastday);
    //   console.log(lastday.getTime());
    //   console.log(firstday.getTime());
    //   if(lastday.getTime() < firstday.getTime()) {
    //     $('#resultBtn').removeAttr('disabled');
    //   }else {
    //     $('#resultBtn').attr('disabled');
    //   }
    // },
  },
};

</script>

<style scoped>
</style>
