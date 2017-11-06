<!-- 分页列表 starts -->
<template>
  <!-- 两个el不能放在第一级元素里 -->
  <div>
    <div class="el-col el-col-24"> 
      <el-table :data="tableData" max-height="800" style="width: 100%" border :row-class-name="tableRowClassName" v-loading="loading">
        <el-table-column  label="ID">
          <template slot-scope="scope">
            <span>{{ scope.row.tag_id }}</span>
          </template>
        </el-table-column>
        <el-table-column label="名称">
          <template slot-scope="scope">
            <span>{{ scope.row.name }}</span>
          </template>
        </el-table-column>
        <el-table-column label="图标">
          <template slot-scope="scope">
            <img :src="scope.row.img" class="image" width="100">
          </template>
        </el-table-column>
        <el-table-column label="阶段">
          <template slot-scope="scope">
            <span>{{ scope.row.period }}</span>
          </template>
        </el-table-column>
        <el-table-column label="排序">
          <template slot-scope="scope">
            <span>{{ scope.row.sort }}</span>
          </template>
        </el-table-column>
        <el-table-column label="操作">
          <template slot-scope="scope">
            <el-button size="mini" @click="handleEdit(scope.$index, scope.row)">编辑</el-button>

            <el-popover
              ref="popover5"
              placement="top"
              width="160"
              v-model="visible2">
              <p>确定删除吗？</p>
              <div style="text-align: right; margin: 0">
                <el-button size="mini" type="text" @click="visible2 = false">取消</el-button>
                <el-button type="primary" size="mini" @click="handleDelete(scope.$index, scope.row)">确定</el-button>
              </div>
            </el-popover>
            <el-button size="mini" type="danger" v-popover:popover5>删除</el-button>
          </template>
        </el-table-column>
      </el-table>
    </div>
    
    <div class="el-col el-col-24"> 
      <el-pagination
        @size-change="handleSizeChange"
        @current-change="handleCurrentChange"
        :page-sizes="[10, 20, 50]"
        :page-size="10"
        layout="total, sizes, prev, pager, next, jumper"
        :total="total">
      </el-pagination>  
    </div>
  </div>
</template>
<!-- 分页列表 ends -->

<script>
  import axios from '../../../lib/axios';
  export default {
    data() {
      return {
        tableData: [], //记录数据列表
        total: 0, //记录总条数
        visible2: false,
        loading: true //是否加载中
      }
    },
    mounted() {
      this.getTableData()
    },
    methods: {
      //获取数据
      getTableData(id) {
        var _this = this;
        axios.get('/example/getList')
          .then(function (response) {
            //因为变量在模版中的路径不能超过2层，所以这里设置了两个变量
            _this.tableData = response.data.list;
            _this.total = response.data.paginate.total;
            _this.loading = false;
          })
          .catch(function (error) {
            console.log(error);
          });
      },
      //处理编辑
      handleEdit(index, row) {
        console.log(index, row);
      },
      //处理删除
      handleDelete(index, row) {
        console.log(index, row);
      },
      //改变大小
      handleSizeChange(val) {
        console.log(`每页 ${val} 条`);
      },
      //改变页码
      handleCurrentChange(val) {
        console.log(`当前页: ${val}`);
      },
      //隔行换色
      tableRowClassName({row, rowIndex}) {
        if (rowIndex % 2 === 1) {
          return 'even-row';
        } 
      }
    }
  }
</script>

<style>
  .el-table .even-row {
    background: #f0f9eb;
  }
</style>