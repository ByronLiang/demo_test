<template>
    <draggable v-model="listSample" @update="datadragEnd">
        <!-- <transition-group> -->
            <div v-for="element in listSample" style="cursor:pointer; height:80px;">
                <span>{{ element.number }}</span> <span style="margin-left: 20px;">{{element.name}}</span>
            </div>
<!--         </transition-group> -->
        <el-button type="primary" @click="add" style="center">Add</el-button>
        <el-button type="primary" @click="showIndex" style="center">Submit</el-button>
    </draggable>
</template>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.6.1/Sortable.min.js"></script>
<script>
    import {Collapse, Button} from 'element-ui';
    import draggable from 'vuedraggable';
    export default {
        components: {
            ElCollapse: Collapse,
            ElButton: Button,
            draggable
        },
        props: ['dataList', 'updateUrl'],
        data() {
            return {
                listSample: this.dataList
            }
        },
        methods:{
            showIndex() {
                API.post(this.updateUrl, this.listSample).then((r) => {
                    console.log('aa');
                    this.$emit('click');
                });
                console.log(this.listSample);
            },
            add () {
                // 对父组件进行触发点击事件，使其执行相应的函数
                this.$emit('click');
            },
            datadragEnd (evt) {
                this.listSample.map((item, index) => {
                    item.number = index + 1;
                });
            }
        }
    };
</script>
