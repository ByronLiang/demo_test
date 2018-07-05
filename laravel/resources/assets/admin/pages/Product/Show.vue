<template>
    <el-card>
        <el-form :inline="true" :model="form.search" @submit.prevent="resetPage"
            border element-loading-text="拼命加载中" stripe v-loading="loading">
            <div class="form-item-box">
                <h3>基本信息</h3>
                <div class="form-box mt-4">
                    <el-form-item label="名称:">
                        <span>{{ form.name }}</span>
                    </el-form-item>
                    <el-form-item label="作者:">
                        <span>{{ author['name'] }}</span>
                    </el-form-item>
                    <el-form-item label="类型:">
                        <span v-for="catagory in catagories">{{ catagory.name }} </span>
                    </el-form-item>
                </div>
                <div class="form-box mt-4">
                    <el-form-item label="价格">
                        <span v-text="form.price"></span>
                    </el-form-item>
                    <el-form-item label="是否推荐" prop="recommend">
                        {{  form.recommend | isRecommend }}
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
                <div>
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
            form: [],
            author: '',
            catagories: [],
            options: [{
              value: '1',
              label: '销量'
            }, {
              value: '0',
              label: '创建时间'
            }],
            options4: [],
            options5: [],
            author_options: [],
            video_poster: []
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
    filters: {
        isRecommend: function(value) {
            if (! value) {
                return '';
            } else {
                let status = ['不推荐', '推荐'];
                return status[value];
            }
        }
    },
    methods: {
        show() {
            this.fetchData();
            // console.log(this.form.sort);
        },
        fetchTypeData(query) {
            if(query != '') {
                API.get('product/search', {params: {keyword: query, type: 'catagory'}}).then((data) => {
                    this.options4 = data;
                });
            } else {
                API.get('product/catagory').then((data) => {
                    this.options4 = data;
                });
            }
        },
        fetchAuthorData(query) {
            if(query != '') {
                API.get('product/search', {params: {keyword: query, type: 'author'}}).then((data) => {
                    this.author_options = data;
                });
            } else {
                API.get('product/author').then((data) => {
                    this.author_options = data;
                });
            }
        },
        // 七牛云存储的视频截图
        cutPic() {
            let video = this.$refs.video;
            if (video) {
                let second = parseInt(video.currentTime);
                if (second > 0) {
                    let img = this.form.video + '?vframe/jpg/offset/' + second + '/w/200/h/150';
                    this.form.video_poster.push(img);
                }
            }
        },
        // 只适用于本地视频文件的截图（不宜跨域）
        localFileCutPic() {
            var scale = 0.9;
            let output = document.getElementById("video_poster");
            let outValue = document.getElementsByName('video_poster')[0];
            let video = document.getElementById("video");
            //base64图像编码转换成Blob对象文件
            var dataURItoBlob = function (dataURI) {
                const binary = atob(dataURI.split(',')[1]);
                const array = [];
                for (let i = 0; i < binary.length; i += 1) {
                    array.push(binary.charCodeAt(i));
                }
                return new Blob([new Uint8Array(array)], { type: 'image/png' });
            }
            var canvas = document.createElement("canvas");
            canvas.width = video.videoWidth * scale;
            canvas.height = video.videoHeight * scale;
            canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
            //异步上传截图图片
            let filename = `${+new Date()}.png`;
            let formData = new FormData();
            formData.append('file', dataURItoBlob(canvas.toDataURL('image/png')), filename);
            formData.append('key', filename);
            API.post('supplier/normal', formData).then(response => {
                console.log(response);
                // this.form.video_poster = '/upload/' + filename;
                this.form.video_poster.push({picture: '/upload/' + filename});
            });
        },
        removeImage(index) {
            this.form.video_poster.splice(index, 1);
        },
        submit() {
            if (!this.$route.params.id) {
                API.post('product/create', this.form).then((res) => {
                    Element.$confirm('添加成功', '提示', {
                        confirmButtonText: '继续发布',
                        cancelButtonText: '返回列表',
                        type: 'success'
                    }).then(() => {
                        history.go(0);
                    }).catch(() => {
                        this.$router.go(-1);
                    });
                })
            } else {
                this.form.product_id = this.$route.params.id;
                API.post('product/update', this.form).then((res) => {
                    this.$router.go(-1);
                })
            }
        },
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
                this.form = res;
                this.author = res.author;
                this.catagories = res.catagories;
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
