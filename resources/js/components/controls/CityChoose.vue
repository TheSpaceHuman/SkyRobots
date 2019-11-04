<template>
  <div class="city-choose-wrapper form-group row mb-0">
    <label for="region" class="col-md-4 col-form-label text-md-right">Регион</label>
    <div class="col-md-6">
      <div class="city-choose">
        <el-select
          filterable
          remote
          reserve-keyword
          placeholder="Выберите регион"
          :remote-method="remoteMethod"
          :loading="loading"
          name="region"
          v-model="inputValue"
          id="region"
          :class="valid"
          @focus="test"
          @blur="$emit('blur')"
          @input="$emit('value', inputValue)"
        >
          <el-option
            v-for="item in options"
            :key="item.value"
            :label="item.label"
            :value="item.label"
          ></el-option>
        </el-select>
      </div>
    </div>
  </div>
</template>

<script>
  import axios from 'axios'
  export default {
    name: 'CityChoose',
    props: ['valid'],
    data: () => ({
      cities: [],
      inputValue: '',
      loading: false
    }),
    methods: {
      test(event) {
        event.target.focus()
        event.target.removeAttribute('readonly')
        // console.log('Focus ', event)
      },
      remoteMethod(query) {
        console.log(query)
        if (query !== '') {
          this.loadingCity(query)
        } else {
          this.cities = []
        }
      },
      async loadingCity(query) {
        try {
          this.loading = true;
          const res = await axios.get(`https://cors-anywhere.herokuapp.com/http://kladr-api.ru/api.php`, {
            params: {
              query: query,
              contentType: 'region',
              // typeCode: '1|2|4',
              limit: 11,
              // withParent: 1
            }
          })
          this.cities = res.data.result
          this.cities.shift()
        } catch (e) {
          console.log(e)
        }
        this.loading = false;
      }
    },
    computed: {
      options() {
        let result = []
        this.cities.forEach((element) => {
          result.push({
            label: `${element.typeShort}. ${element.name}`,
            value: element.name
          })
        })
        return result
      }
    },
    mounted() {
      const input = document.querySelector('.el-input__inner')
      input.removeAttribute('readonly')
      // console.log('Input: ', input)
    }
  }
</script>

<style lang="scss">
.city-choose {

  .el-select {
    width: 100%;
  }
}
</style>