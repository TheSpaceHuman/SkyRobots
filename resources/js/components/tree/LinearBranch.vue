<template>
  <div class="container">
    <el-tree
      :props="props"
      :load="loadNode"
      lazy
    >
      <div class="custom-node" slot-scope="{ node, data }">
        <div class="custom-node__id"># {{ data.id }}</div>
        <span
          :class="{'current': data.id == user.id}"
          class="custom-node__name"
        >{{ data.name }}</span>
        <div
          :class="data['activated_to'] ? 'active' : 'not-active'"
          class="custom-node__avatar">
          <img :src="'storage/' + data.avatar" :alt="data.name">
        </div>
      </div>
    </el-tree>
  </div>
</template>

<script>
  import axios from 'axios'
  export default {
    name: 'LinearBranch',
    props: {
      user: {
        required: true
      },
      parent: {
        required: true
      }
    },
    data() {
      return {
        data: [{

        }],
        props: {
          label: 'name',
          children: 'children',
          isLeaf: 'leaf'
        }
      }
    },
    methods: {
      async loadNode(node, resolve) {
        if (node.level === 0) {
          if(this.parent) {
            // let copyObj = Object.assign({}, this.user)
            // copyObj.children = [this.parent]
            // copyObj.leaf = true
            // console.log(copyObj)
            // return resolve([copyObj]);
            return resolve([this.parent]);
          } else {
            return resolve([this.user]);
          }
        }
        const res = await axios({
          method: 'get',
          url: `api/referrals/linear/${node.data.id}`
        })
        let loadData = []
        for(let item of res.data.children) {
          loadData.push(item)
        }
        resolve(loadData);
      }
    }
  }
</script>

<style lang="scss">
  @import '../../../sass/variables';

  .custom-node {
    display: flex;
    align-items: center;
    justify-content: flex-start;

    &__name.current {
      color: $red;
    }
    &__name {
      font-size: 15px;
      font-weight: 700;
      color: $blue;
      margin-left: 8px;
      margin-right: 8px;
    }
    &__avatar.active {
      img {
        border: 1px solid $green;
      }

    }
    &__avatar.not-active {
      img {
        border: 1px solid $red;
      }
    }
    &__avatar {
      height: 25px;
      width: 25px;
      margin-left: 8px;
      margin-right: 8px;
      img {
        border-radius: 50%;
        height: 100%;
      }
    }
    &__id {
      font-weight: 300;
      font-size: 14px;
      color: $red;
      margin-left: 8px;
      margin-right: 8px;
    }

  }
</style>