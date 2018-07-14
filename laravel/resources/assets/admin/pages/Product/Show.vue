<template>
    <el-card>
        <el-form :inline="true" :model="form" @submit.prevent="resetPage"
            border element-loading-text="拼命加载中" stripe v-loading="loading">
            <div class="form-item-box">
                <h3>基本信息</h3>
                <div class="form-box mt-4">
                    <el-form-item label="名称:" prop="name">
                        <span>{{ form.name }}</span>
                    </el-form-item>
                    <el-form-item label="作者:">
                        <span>{{ form.author.name }}</span>
                    </el-form-item>
                    <el-form-item label="类型:">
                        <span v-for="catagory in form.catagories">{{ catagory.name }} </span>
                    </el-form-item>
                </div>
                <div class="form-box mt-4">
                    <el-form-item label="价格">
                        <span v-text="form.price"></span>
                    </el-form-item>
                    <el-form-item label="是否推荐" prop="recommend">
                        {{  form.recommend | recommend }}
                    </el-form-item>
                </div>
            </div>
            <!-- http://pa9jr09c8.bkt.clouddn.com/1529138220090.mp4 -->
            <div class="form-item-box">
                <h3 class="mb-4">商品详情</h3>
                <div>
                <el-form-item label="视频" prop="video" style="height: 280px;">
                    <video :src="form.video" controls="controls" id="video" ref="video"
                        style="width: 400px; height: 300px;"
                        @play="handlePlay" @seeked="handleSeeked"
                        v-if="form.video">No support</video>
                </el-form-item>
                </div>
                <div style="margin-top: 10px;">
                    <el-button type="normal" @click="handleHightLight(29)" v-if="form.video">精彩点一</el-button>
                    <el-button type="normal" @click="handleHightLight(39)" v-if="form.video">精彩点二</el-button>
                    <el-button type="normal" @click="handleHightLight(69)" v-if="form.video">精彩点三</el-button>
                </div>
                    <el-form-item label="视频截图">
                        <div class="view-image-box" v-if="form.video">
                            <div class="view-image" v-for="(i, index) in form.video_poster" :key="index">
                                <div class="image-box">
                                    <img :src="i" style="width: 200px; height: 150px;">
                                </div>
                            </div>
                        </div>
                    </el-form-item>
                </div>
            </div>
        </el-form>
    </el-card>
</template>
<script>
import {Table, TableColumn, Card, Pagination, Form, FormItem, Select, Option, DatePicker, Button, Input} from 'element-ui';
export default {
    data() {
        return {
            highTime: '',
            loading: false,
            products: [],
            form: {
                name: '',
                price: '',
                catagories: [],
                author: [],
                recommend: '1',
                video: '',
                video_poster: [],
                video_node: []
            }
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
        ElButton: Button,
        ElInput: Input,
    },
    mounted() {
    },
    watch: {
    },
    methods: {
        handlePlay() {
            let v = this.$refs.video;
            console.log(v.duration);
            console.log(v.currentTime);
        },
        handleHightLight(val) {
            let video = this.$refs.video;
            if (video) {
                video.currentTime = val;
            }
        },
        handleSeeked() {
            let video = this.$refs.video;
            console.log(video.currentTime);
        },
        fetchData() {
            this.loading = true;
            API.get('product/show/' + this.$route.params.id).then((res) => {
                for (const i of Object.keys(this.form)) {
                    // 可以维持原表单的数据结构，避免被获取的数据进行覆盖
                    if (res[i] || res[i] === 0) this.form[i] = res[i];
                }
            }).finally(() => this.loading = false);
        }
    },
    created() {
        this.fetchData();
    }
}
</script>

<style lang="scss" scrop>
    .form-box{
        .el-form-item{
            display: inline-block;
            margin-right: 20px;
            width: 30%;
            .el-select{
                width: 100%;
            }
        }
    }
    .view-image{
        display: inline-block;
        position: relative;
        margin-right: 10px;
        margin-bottom: 10px;

        img{
            height: 200px;
        }

        i{
            position: absolute;
            right: -10px;
            top: -10px;
            font-size: 28px;
            color: #409EFF;
            cursor: pointer;
        }
    }
    .img-upload-box, .view-image-box{
        display: inline-block;
        vertical-align: middle;
    }
    .image-box {
        border: 1px dashed #d9d9d9;
        border-radius: 6px;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        height: 100%;
        line-height: 150px;
        margin-top: 5px;
    }
</style>
