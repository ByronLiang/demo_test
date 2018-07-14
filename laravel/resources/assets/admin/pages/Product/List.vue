<template>
    <el-card>
        <el-form :inline="true" :model="form.search" @submit.prevent="resetPage">
            <div class="flex items-center justify-between">
                <el-form-item label="是否推荐">
                    <el-select v-model="form.isRecommend" placeholder="请选择">
                        <el-option
                          v-for="item in options"
                          :key="item.value"
                          :label="item.label"
                          :value="item.value">
                        </el-option>
                    </el-select>
                </el-form-item>
                <el-form-item label="类型">
                    <el-select v-model="form.catagory" placeholder="请选择">
                        <el-option
                          v-for="item in catagoryOptions"
                          :key="item.value"
                          :label="item.label"
                          :value="item.value">
                        </el-option>
                    </el-select>
                </el-form-item>
                <el-form-item label="时间段">
                    <el-date-picker v-model="form.date" type="date"
                        placeholder="选择日期">
                    </el-date-picker>
                </el-form-item>
                <el-form-item>
                    <el-button size="mini" @click="clearSearch">清空筛选</el-button>
                </el-form-item>
            </div>
        </el-form>
        <el-table :data="products" border element-loading-text="拼命加载中" stripe v-loading="loading"
        style="width: 100%">
            <el-table-column prop="id" label="编号" width="50"></el-table-column>
            <el-table-column prop="name" label="名称"></el-table-column>
            <el-table-column prop="author.name" label="作者"></el-table-column>
            <el-table-column prop="price" label="价格"></el-table-column>
            <el-table-column label="类型">
                <template slot-scope="{$index, row}">
                    <span v-for="catagory in row.catagories">{{ catagory.name }} </span>
                </template>
            </el-table-column>
            <el-table-column label="是否推荐">
                <template slot-scope="{$index, row}">
                    {{ row.recommend | recommend }}
                </template>
            </el-table-column>
            <el-table-column label="操作">
                <template slot-scope="{$index, row}">
                    <router-link :to="`show/${row.id}`" append>
                        <el-button size="mini">详情</el-button></router-link>
                    <router-link :to="{name: 'Product.edit', params: { id: row.id }}">
                    <el-button size="mini">编辑</el-button>
                    </router-link>
                    <!-- <el-button size="mini" @click="handleEdit(scope.$index, scope.row)">编辑</el-button> -->
                    <el-button size="mini" type="danger" @click="handleDelete($index, row)">删除</el-button>
                </template>
            </el-table-column>
        </el-table>
        <div class="text-center pt-2" v-show="!loading && pagination.total > 0">
            <el-pagination  layout="total, prev, pager, next"
               @current-change="fetchData"
               :page-size="pagination.page_size"
               :current-page="form.page"
               :total="pagination.total">
            </el-pagination>
        </div>
    </el-card>
</template>

<script>
import {Table, TableColumn, Card, Pagination, Form, FormItem, Select, Option, DatePicker} from 'element-ui';
export default {
    data() {
        return {
            loading: false,
            products: [],
            form: {
                date: '',
                page: 1,
                isRecommend: '',
                catagory: ''
            },
            pagination: {
                total: 0,
                page_size: 0,
            },
            catagoryOptions: [],
            options: [{
              value: 1,
              label: '推荐'
            }, {
              value: 0,
              label: '不推荐'
            }],
        }
    },
    components: {
        ElTable: Table,
        ElTableColumn: TableColumn,
        ElPagination: Pagination,
        ElCard: Card,
        ElSelect: Select,
        ElOption: Option,
        ElForm: Form,
        ElFormItem: FormItem,
        ElDatePicker: DatePicker,
    },
    watch: {
        'form.isRecommend'(val, oldVal) {
            console.log(val);
            console.log(oldVal);
            this.fetchData(1);
        },
        'form.catagory'(val, oldVal) {
            this.fetchData(1);
        }
    },
    created() {
        this.form.page = +this.form.page;
        this.fetchData();
    },
    methods: {
        fetchData(page = null) {
            if (page) {
                this.form.page = page;
            }
            this.loading = true;
            API.get('product/list', {params: this.form}).then((res) => {
                this.products = res.data.data;
                this.pagination.total = parseInt(res.data.total);
                this.pagination.page_size = res.data.per_page;
                this.catagoryOptions = res.catagories;
            }).finally(() => this.loading = false);
        },
        clearSearch() {
            this.form.isRecommend = '';
            this.form.catagory = '';
            this.fetchData(1);
        }
    }
}
</script>
