<template>
  <el-table :data="tableData" style="width: 100%">
    <el-table-column label="ID">
      <template slot-scope="scope">
        <span style="margin-left: 10px">{{ scope.row.tag_id }}</span>
      </template>
    </el-table-column>
    <el-table-column label="名称">
      <template slot-scope="scope">
        <span style="margin-left: 10px">{{ scope.row.name }}</span>
      </template>
    </el-table-column>
    <el-table-column label="图标">
      <template slot-scope="scope">
        <img :src="scope.row.img" class="image" width="100">
      </template>
    </el-table-column>
    <el-table-column label="阶段">
      <template slot-scope="scope">
        <span style="margin-left: 10px">{{ scope.row.period }}</span>
      </template>
    </el-table-column>
    <el-table-column label="排序">
      <template slot-scope="scope">
        <span style="margin-left: 10px">{{ scope.row.sort }}</span>
      </template>
    </el-table-column>
    <el-table-column label="操作">
      <template slot-scope="scope">
        <el-button size="mini" @click="handleEdit(scope.$index, scope.row)">编辑</el-button>
        <el-button size="mini" type="danger" @click="handleDelete(scope.$index, scope.row)">删除</el-button>
      </template>
    </el-table-column>
  </el-table>
</template>

<script>
  import axios from '../../../lib/axios';
  export default {
    data() {
      return {
        tableData: []
      }
    },
    mounted() {
      this.getTableData()
    },
    methods: {
      getTableData(id) {
        var _this = this;
        axios.get('/example/getList')
        .then(function (response) {
          _this.tableData = response.data.list;
        })
        .catch(function (error) {
          console.log(error);
        })
      },
      handleEdit(index, row) {
        console.log(index, row);
      },
      handleDelete(index, row) {
        console.log(index, row);
      }
    }
  }
</script>