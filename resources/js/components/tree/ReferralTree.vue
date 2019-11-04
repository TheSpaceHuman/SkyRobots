<template>
  <section class="referral-tree">
    <el-tabs type="border-card">
      <el-tab-pane
        label="Линейные рефералы"
        >
        <LinearBranch
          :user="userToObj"
          :parent="linearParentToObj"
        ></LinearBranch>
      </el-tab-pane>
      <el-tab-pane
        label="Бинарные рефералы"
        v-loading="loadingBinary">
<!--        <BinaryBranch
          :user="userToObj"
          :parent="binaryParentToObj"
        ></BinaryBranch>-->
        <BinaryBranchAll
          :users="binaryUsers"
          :user-id="userToObj.id"
          :parent-id="binaryParentToObj.id"
        ></BinaryBranchAll>
      </el-tab-pane>
    </el-tabs>
  </section>
</template>

<script>
  import axios from 'axios'
  import LinearBranch from "./LinearBranch";
  import BinaryBranch from "./BinaryBranch";
  import BinaryBranchAll from "./BinaryBranchAll";
  export default {
    name: 'ReferralTree',
    components: {
      LinearBranch, BinaryBranch, BinaryBranchAll
    },
    props: {
      user: {
        required: true
      },
      binaryParent: {
        required: true
      },
      linearParent: {
        required: true
      }
    },
    data() {
      return {
        loadingBinary: false,
        binaryUsers: [],
      }
    },
    computed: {
      userToObj() {
        return JSON.parse(this.user)
      },
      binaryParentToObj() {
        if(this.binaryParent) {
          return JSON.parse(this.binaryParent)
        }
        return false

      },
      linearParentToObj() {
        if(this.linearParent) {
          return JSON.parse(this.linearParent)
        }
        return false
      }
    },
    methods: {
      async loadingBinaryTree() {
        this.loadingBinary = true
        try {
          const res = await axios.get(`api/referrals/binary/${this.userToObj.id}/all`)
          console.log(res)
          this.binaryUsers = res.data.users
        } catch (e) {
          console.error(e)
        }
        this.loadingBinary = false
      }
    },
    mounted() {
      this.loadingBinaryTree()
    }
  }
</script>

<style lang="scss">
  @import "../../../sass/variables";
  .referral-tree {
    .row {
      display: flex;
      justify-content: space-around;
      flex-wrap: nowrap;
    }
    .row > div {
      flex: 0 0 auto;
    }
    &__card.parent {
      border-color: $blue;
    }
    &__card.current {
      border-color: $red;
    }
    &__card {
      border-color: $green;
      text-align: center;
      max-width: 185px;

      &__title {
        font-size: 21px;
        padding: 12px 12px 0;
        margin: 0;
      }
      &__body {
        padding: 12px;
        &__id {
          font-size: 21px;
          font-weight: 700;
          color: $blue;
        }
        &__status.active {
          color: $green;
        }
        &__status.not-active {
          color: $red;
        }
      }
    }
  }
</style>