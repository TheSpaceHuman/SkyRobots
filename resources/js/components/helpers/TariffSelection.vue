<template>
  <div class="tariff-selection">
    <div class="tariff-selection__items row justify-content-around">
      <div class="col-12 col-md-6" v-if="type === 'continue'">
        <div class="tariff-selection__item card">
          <h4 class="tariff-selection__item__title text-center h3">{{ currentPackage.title }}</h4>
          <div class="tariff-selection__item__price text-center py-4">
            <span v-if="parseFloat(currentPackage.price_month) > 0">{{ currentPackage.price_month }} / месяц</span>
            <br>
            <span v-if="parseFloat(currentPackage.price_year) > 0">{{ currentPackage.price_year }} / год</span>
          </div>
          <div class="tariff-selection__item__actions">
            <button
              v-if="parseFloat(currentPackage.price_month) > 0"
              @click="updateTariff(currentPackage.id, 30)"
              type="button"
              class="btn btn-success m-2">Продлить на месяц</button>
            <button
              v-if="parseFloat(currentPackage.price_year) > 0"
              @click="updateTariff(currentPackage.id, 365)"
              type="button"
              class="btn btn-danger m-2">Продлить на год</button>
          </div>
        </div>
      </div>
      <div v-else-if="type === 'change'"
        class="col-12 col-md-6"
      >
        <div
          v-if="nextPackage"
          class="tariff-selection__item card">
          <h4 class="tariff-selection__item__title text-center h3">{{ nextPackage.title }}</h4>
          <div class="tariff-selection__item__price text-center py-4">
            <span v-if="parseFloat(nextPackage.price_month) > 0">{{ nextPackage.price_month }} / месяц</span>
            <br>
            <span v-if="parseFloat(nextPackage.price_year) > 0">{{ nextPackage.price_year }} / год</span>
          </div>
          <div class="tariff-selection__item__actions">
            <button
              v-if="parseFloat(nextPackage.price_month) > 0"
              @click="updateTariff(nextPackage.id, 30)"
              type="button"
              class="btn btn-success m-2">Купить на месяц</button>
            <button
              v-if="parseFloat(nextPackage.price_year) > 0"
              @click="updateTariff(nextPackage.id, 365)"
              type="button"
              class="btn btn-danger m-2">Купить на год</button>
          </div>
        </div>
        <div v-else class="tariff-selection__item card">
          <h4 class="tariff-selection__item__title text-center h3">У вас активна максимальная лицензия</h4>
        </div>
      </div>
      <div v-else-if="type === 'new'"
           v-for="pack in packagesParse"
           :key="pack.id"
           class="col-12 col-md-4 col-lg-3"
      >
        <div
          class="tariff-selection__item card">
          <h4 class="tariff-selection__item__title text-center h3">{{ pack.title }}</h4>
          <div class="tariff-selection__item__price text-center py-4">
            <span v-if="parseFloat(pack.price_month) > 0">{{ pack.price_month }} / месяц</span>
            <br>
            <span v-if="parseFloat(pack.price_year) > 0">{{ pack.price_year }} / год</span>
          </div>
          <div class="tariff-selection__item__actions">
            <button
              v-if="parseFloat(pack.price_month) > 0"
              @click="updateTariff(pack.id, 30)"
              type="button"
              class="btn btn-success m-2">Купить на месяц</button>
            <button
              v-if="parseFloat(pack.price_year) > 0"
              @click="updateTariff(pack.id, 365)"
              type="button"
              class="btn btn-danger m-2">Купить на год</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import toastr from 'toastr'
  import axios from  'axios'
  import $ from 'jquery'
  export default {
    name: 'TariffSelection',
    props: {
      packages: {
        // JSON
        type: String,
        required: true,
      },
      action: {
        required: true
      },
      type: {
        // continue | change | new
        type: String,
        default: 'new'
      },
      user: {
        // JSON
        type: String,
        required: true,
      }

    },
    data() {
      return {}
    },
    methods: {
      hideModal() {
        $('.modal').modal('hide')
      },
      async updateTariff(id, days) {
        try {
          const res = await axios({
            method: 'post',
            url: this.action,
            data: {
              days: days,
              userId: this.userParse.id,
              packageId: id
            }
          });
          if(res.data.message.type === 'success') {
            toastr.success(res.data.message.body);
            setTimeout(() => document.location.reload(), 1500)
          } else if(res.data.message.type === 'warning') {
            toastr.warning(res.data.message.body);
          } else if(res.data.message.type === 'error') {
            toastr.error(res.data.message.body);
          } else {
            toastr.error('На сервере что-то пошло не так!');
          }
          setTimeout(this.hideModal, 500)
        } catch (e) {
          console.log(e)
        }
      }
    },
    computed: {
      packagesParse() {
        return JSON.parse(this.packages)
      },
      userParse() {
        return JSON.parse(this.user)
      },
      currentPackage() {
        const index = this.packagesParse.findIndex((el) => el.id == this.userParse.package_id)
        if(index !== -1) {
          return this.packagesParse[index]
        }
        return false
      },
      nextPackage() {
        let expensiveRates = this.packagesParse.filter((el) => parseFloat(el.price_month ) > parseFloat(this.currentPackage.price_month))
        if(expensiveRates.length > 0) {
          return expensiveRates[0]
        }
        return false
      }

    }
  }
</script>

<style lang="scss">
  @import "../../../sass/variables";

  .tariff-selection {

    &__item {
      padding: 12px;
      &__actions {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;

        button, a {
          white-space: nowrap;
          font-size: 11px;
        }
      }
    }
    &__item.active {
      border-color: $green;
    }
  }
</style>