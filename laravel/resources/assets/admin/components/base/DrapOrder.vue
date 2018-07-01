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
                listSample: this.dataList,
                activeNames: ['1'],
                sortOptions: {
                    group: 'sample',
                    animation: 150,
                },
                list3:[
                        {name:"John", id:1},
                        {name:"Joao", id:2},
                        {name:"Jean", id:3},
                        {name:"Gerard", id:4}
                    ],
                list2:[
                    {name:"Juan", id:5, num: 1},
                    {name:"Edgard", id:6, num: 2},
                    {name:"Johnson", id:7, num: 3}
                ],
                tags: [
                    { title: "Consistency", name: '1', description: "Consistent with real life: in line with the process and logic of real life, and comply with languages and habits that the users are used to" },
                    { title: "Feedback", name: '2', description: "Operation feedback: enable the users to clearly perceive their operations by style updates and interactive effects" },
                    { title: "Efficiency", name: '3', description: "Simplify the process: keep operating process simple and intuitive" },
                    { title: "Controllability", name: '4', description: "Decision making: giving advices about operations is acceptable, but do not make decisions for the users" },
                ]
            };
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
            handleSort(evt) {
                console.log('onSort.foo:', [evt.item, evt.from]);
                console.log(evt.item.getAttribute('drag-id') + ', ' + evt.oldIndex);
                console.log(evt.from.getAttribute('drap-id') + ', ' + evt.newIndex);
            },
            datadragEnd (evt) {
                this.listSample.map((item, index) => {
                    item.number = index + 1;
                });
            }
        }
    };
</script>
