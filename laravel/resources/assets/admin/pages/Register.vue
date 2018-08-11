<template>
    <div class="login-page">
        <el-card>
            <div class="title">注册管理员</div>
            <el-form :model="form" :rules="rules" ref="form" label-position="top">
                <el-form-item prop="account">
                    <el-input :autofocus="true" placeholder="请输入账户" v-model="form.account"></el-input>
                </el-form-item>
                <el-form-item prop="password">
                    <el-input placeholder="请输入密码" type="password" v-model="form.password"></el-input>
                </el-form-item>
                <el-form-item prop="confirm_password">
                    <el-input placeholder="请再次输入密码" type="password" v-model="form.confirm_password"></el-input>
                </el-form-item>
                <el-form-item>
                    <div class="captcha">
                        <el-input placeholder="验证码" v-model="form.captcha"
                            @change="validCaptcha($event)"></el-input>
                        <el-button @click="getCaptcha" :disabled="disabled">{{ message }}</el-button>
                    </div>
                    <div v-show="show"><span style="color: red;">验证码输入错误</span></div>
                </el-form-item>
                <el-form-item class="center">
                    <el-button type="primary" @click="register" :loading="isBtnLoading">{{btnText}}</el-button>
                </el-form-item>
            </el-form>
        </el-card>
    </div>
</template>

<script>
    import {Input, Form, FormItem, Button} from 'element-ui';

    export default {
        components: {
            ElInput: Input,
            ElButton: Button,
            ElForm: Form,
            ElFormItem: FormItem,
        },
        props: [],
        data() {
            return {
                form: {
                    account: '',
                    password: '',
                    confirm_password: '',
                },
                rules: {
                    account: [
                        {required: true, message: '请输入账户', trigger: 'blur'},
                    ],
                    password: [
                        {validator: this.validateOriginPass, trigger: 'blur'}
                    ],
                    confirm_password: [
                        {validator: this.validatePass, trigger: 'blur'}
                    ],
                },
                isBtnLoading: false,
                isCaptcha: false,
                i: 60,
                time: '',
                disabled: false,
                message: '请获取验证码',
                captcha: '',
                show: false,
            };
        },
        computed: {
            btnText() {
                if (this.isBtnLoading) return '登录中...';
                return '登录';
            },
        },
        watch: {},
        methods: {
            register() {
                // this.$refs.form.validate((valid) => {
                //     console.log(valid);
                //     if (!valid) return;
                //     this.isBtnLoading = true;
                //     API.post('auth/login', this.form).then((res) => {
                //         this.$store.commit('setMy', res);
                //         this.$router.push('/');
                //     }).finally(() => this.isBtnLoading = false);
                // });
            },
            getCaptcha() {
                if (! this.form.account) {
                    Element.$alert('请填写邮箱账号来获取验证码', '验证码警告');
                } else {
                    this.isCaptcha = true;
                    API.get('auth/captcha', {
                        params: {
                            account: this.form.account
                        }
                    }).then((r) => {
                        this.captcha = r.captcha;
                    });
                    this.caculateTime();
                }
            },
            caculateTime() {
                this.time = setInterval(() => {
                    if (this.i > 0 && this.i <= 60) {
                        this.i--;
                        this.disabled = true;
                        this.message = this.i + '秒';
                    } else {
                        this.disabled = false;
                        this.message = '获取验证码';
                        this.isBtnLoading = false;
                        // this.timer = null;
                        clearInterval(this.timer);
                    }
                }, 1000);
            },
            validCaptcha(event) {
                if (this.form.captcha !== this.captcha) {
                    this.show = true
                } else {
                    this.show = false;
                }
                console.log(this.form.captcha);
            },
            validateOriginPass (rule, value, callback) {
                if (value === '') {
                  callback(new Error('请输入密码'));
                } else {
                  if (this.form.confirm_password !== '') {
                    this.$refs.form.validateField('confirm_password');
                  }
                  callback();
                }
            },
            validatePass (rule, value, callback) {
                if (value == '') {
                    callback(new Error('请再次输入密码'));
                } else if (value != this.form.password) {
                    callback(new Error('两次输入密码不一致!'));
                } else {
                    callback();
                }
            },
        },
        mounted() {
        }
    };
</script>

<style lang="scss">
    .login-page {
        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #e1e2e2;

        .el-card{
            width: 100%;
            max-width: 400px;
        }

        .title {
            color: #20a0ff;
            font-weight: bold;
            font-size: 30px;
            text-align: center;
            line-height: 2.2;
            font-family: sans-serif;
        }

        .el-button{
            width: 100%;
        }

        .captcha {
            width: 100%;
            .el-input{
                float: left;
                width: 60%;
            }

            .el-button{
                float: left;
                width: 38%;
                margin-left: 2%;
            }
        }
    }
</style>
